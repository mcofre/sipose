<?php

namespace App\Http\Controllers;

use App\Postulacion;
use App\Prospecto;
use App\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Storage;
use Carbon\Carbon;
use App\Configuracion;
use Illuminate\Support\Collection;

class PostulacionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $config = Configuracion::find(1);
        $rol = DB::table('role_user')
            ->where('user_id', $user->id)
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->get(['roles.name'])
            ->first();

        if ($rol->name === 'Admin' || $rol->name === 'Coordinador') {
            $postulaciones = Postulacion::paginate(15);
        } else {
            $postulaciones = Postulacion::where('postulacion_id', $user->id)->paginate();
        }


        //$postulaciones = Postulacion::paginate();
        //dd($postulaciones);
        return view('postulacion.index', compact('postulaciones'));
    }

    public function create()
    {
        $alumnos = Prospecto::where('apoderado_id', Auth::user()->id)
            ->pluck('nombre', 'rut_alumno');

        $cursos = Curso::all()->pluck('descripcion', 'curso');
        return view('postulacion.create', compact('alumnos', 'cursos'));
    }

    public function store(Request $request)
    {
        //dd($request);
        //$postulacion = Postulacion::create($request->all());
        $this->validate($request, [
            'rut_alumno' => 'required|exists:prospectos,rut_alumno|unique:postulacions,rut_alumno',
            'notapresentacion' => 'required|integer|max:70|min:1',
            'notaporcsocial' => 'required|integer|max:70|min:1',
            'curso' => 'required|exists:cursos,curso',
            'archinfoperso' => 'required|file',
            'archsocial' => 'required|file',
            'archnota' => 'required|file',
        ]);


        $postulacion = new Postulacion();
        $postulacion->rut_alumno = $request->rut_alumno;
        $postulacion->curso = $request->curso;
        $postulacion->postulacion_id = Auth::user()->id;

        $postulacion->notapresentacion = $request->notapresentacion;
        $postulacion->notaexamen = 0;
        $postulacion->notaporcsocial = $request->notaporcsocial;
        $postulacion->totalizado = round($request->notapresentacion * 100 / 70) + $request->notaporcsocial;

        $archivo1 = $request->file('archnota');
        $archivo1nombrereal = $archivo1->getClientOriginalName();
        $nombrearchivo1 = $archivo1->store('archivos_nota');
        $postulacion->archnota_ruta = $nombrearchivo1;
        $postulacion->archnota = $archivo1nombrereal;

        $archivo2 = $request->file('archsocial');
        $archivo2nombrereal = $archivo1->getClientOriginalName();
        $nombrearchivo2 = $archivo2->store('archivos_nota');
        $postulacion->archsocial_ruta = $nombrearchivo2;
        $postulacion->archsocial = $archivo2nombrereal;

        $archivo3 = $request->file('archinfoperso');
        $archivo3nombrereal = $archivo3->getClientOriginalName();
        $nombrearchivo3 = $archivo3->store('archivos_nota');
        $postulacion->archinfoperso_ruta = $nombrearchivo3;
        $postulacion->archinfoperso = $archivo3nombrereal;

        $postulacion->save();

        return redirect()->route('postulacion.index')
            ->with('info', 'Postulación guardada con éxito');
    }

    public function show(Postulacion $postulacion)
    {
        //dd($prospecto);
        return view('postulacion.show', compact('postulacion'));
    }

    public function edit(Postulacion $postulacion)
    {
        //dd($prospecto);
        $alumnos = Prospecto::where('rut_alumno', $postulacion->rut_alumno)
            ->get()
            ->pluck('nombre', 'rut_alumno');
        $cursos = Curso::all()->pluck('descripcion', 'curso');
        return view('postulacion.edit', compact('postulacion', 'alumnos', 'cursos'));
    }

    public function update(Request $request, Postulacion $postulacion)
    {
        $this->validate($request, [
            'notaexamen' => 'required|numeric|min:1|max:70'
        ]);

        $postulacion->notaexamen = $request->notaexamen;
        $postulacion->totalizado = round($postulacion->notapresentacion * 100 / 70) + round($request->notaexamen * 100 / 70) + $postulacion->notaporcsocial;
        $postulacion->save();
        return redirect()->route('postulacion.index')//, $postulacion->id)
        ->with('info', 'Postulación actulizada con éxito');
    }

    public function destroy(Postulacion $postulacion)
    {
        $postulacion->delete();
        return back()->with('info', 'Eliminado con éxito');
    }

    public function file(Request $request, $id, $file, $archivonombre)
    {

        $postulacion = Postulacion::findOrFail($id);
        $nombrecompleto = "archivos_nota/" . $archivonombre;
        if ($postulacion->archnota_ruta == $nombrecompleto || $postulacion->archsocial_ruta == $nombrecompleto || $postulacion->archinfoperso_ruta == $nombrecompleto) {

            if ($file == 1) {
                $nombrereal = $postulacion->archnota;
            } elseif ($file == 2) {
                $nombrereal = $postulacion->archsocial;
            } elseif ($file == 3) {
                $nombrereal = $postulacion->archinfoperso;
            }
            return Storage::download($nombrecompleto, $nombrereal);
        }
    }
}
