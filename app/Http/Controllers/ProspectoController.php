<?php

namespace App\Http\Controllers;

use App\Postulacion;
use App\Prospecto;
use App\Nacionalidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Caffeinated\Shinobi\Models\Role;
use Auth;

class ProspectoController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $rol = DB::table('role_user')
            ->where('user_id', $user->id)
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->get(['roles.name'])
            ->first();

        if ($rol->name === 'Admin' || $rol->name === 'Coordinador') {
            $prospectos = Prospecto::paginate(15);
        } else {
            $prospectos = Prospecto::where('apoderado_id', $user->id)->paginate();
        }

        return view('prospecto.index', compact('prospectos'));
    }

    public function create()
    {
        $nacionalidad_id = Nacionalidad::all()->sortBy('nacionalidad', SORT_NATURAL | SORT_FLAG_CASE)->pluck('nacionalidad', 'id');
        return view('prospecto.create', compact('nacionalidad_id'));
        //return view('prospecto.create');
    }

    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'nombre' => 'required|string|max:50',
            'apellidop' => 'required|string|max:50',
            'apellidom' => 'required|string|max:50',
            'rut_alumno' => 'required|integer|min:0|max:99999999|unique:prospectos,rut_alumno',
            'direccion' => 'required|string|max:120',
            'sexo' => 'in:H,M',
            'fechanac' => 'required|date',
            'nacionalidad_id' => 'required|exists:nacionalidads,id',
        ]);


        $data = $request->all();
        $data['apoderado_id'] = Auth::user()->id;
        $prospectos = Prospecto::create($data);
        return redirect()->route('prospecto.index')
            ->with('info', 'Prospecto guardado con éxito');
    }

    public function show(Prospecto $prospecto)
    {
        //dd($prospecto);
        return view('prospecto.show', compact('prospecto'));
    }

    public function edit(Prospecto $prospecto)
    {
        //dd($prospecto);
        $nacionalidad_id = Nacionalidad::all()->sortBy('nacionalidad', SORT_NATURAL | SORT_FLAG_CASE)->pluck('nacionalidad', 'id');
        return view('prospecto.edit', ['nacionalidad_id' => $nacionalidad_id, 'prospecto' => $prospecto]);
        //return view('prospecto.edit', compact('prospecto'));
    }

    public function update(Request $request, Prospecto $prospecto)
    {

        $this->validate($request, [
            'nombre' => 'required|string|max:50',
            'apellidop' => 'required|string|max:50',
            'apellidom' => 'required|string|max:50',
            'direccion' => 'required|string|max:120',
            'sexo' => 'in:H,M',
            'fechanac' => 'required|date',
            'nacionalidad_id' => 'required|exists:nacionalidads,id',
        ]);
        $prospecto->update($request->all());

        /*return redirect()->route('prospecto.edit', $prospecto->id)
                         ->with('info','Prospecto actulizado con éxito');
        */
        return redirect()->route('prospecto.index')
            ->with('info', 'Prospecto actulizado con éxito');
    }

    public function destroy(Prospecto $prospecto)
    {
       Postulacion::where('rut_alumno', $prospecto->rut_alumno)->delete();
        $prospecto->delete();
        return back()->with('info', 'Eliminado con éxito');
    }
}
