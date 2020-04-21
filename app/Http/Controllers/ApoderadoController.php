<?php

namespace App\Http\Controllers;

use App\Apoderado;
use App\Nacionalidad;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class ApoderadoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        //dd($idd);

        $rol = DB::table('role_user')
            ->where('user_id', $user->id)
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->get(['roles.name'])
            ->first();

        if ($rol->name === 'Admin' || $rol->name === 'Coordinador') {
            $apoderados = Apoderado::paginate(15);
        } else {
            $apoderados = Apoderado::where('apoderado_user', $user->id)->paginate(1);
        }

        return view('apoderado.index', compact('apoderados'));

        /*$apoderados = Apoderado::orderby('id')->get();
        foreach($apoderados as $key => $apoderado){
            $nacionalidades = Nacionalidad::findOrFail($apoderado->nacionalidad_id);
            $apoderado->nacionalidad_name = $nacionalidades->nacionalidad;
        }
        return view('apoderado.index',compact('apoderados'));*/
    }

    public function create()
    {
        $nacionalidad_id = Nacionalidad::all()->sortBy('nacionalidad', SORT_NATURAL | SORT_FLAG_CASE)->pluck('nacionalidad', 'id');
        return view('apoderado.create', compact('nacionalidad_id'));
        //return view('apoderado.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rut_apoderado' => 'required|unique:apoderados,rut_apoderado|integer|min:0|max:99999999',
            'nombre' => 'required|string|max:100',
            'apellidop' => 'required|string|max:100',
            'appelidom' => 'required|string|max:100',
            'direccion' => 'required|string|max:100',
            'telefono' => 'required|numeric',
        ]);
        $apoderados = Apoderado::create($request->all());
        return redirect()->route('apoderado.edit', $apoderados->id)
            ->with('info', 'Apoderado guardado con éxito');
    }

    public function show(Apoderado $apoderado)
    {
        //dd($nacionalidad);
        return view('apoderado.show', compact('apoderado'));
    }

    public function edit(Apoderado $apoderado)
    {
        $nacionalidad_id = Nacionalidad::all()->sortBy('nacionalidad', SORT_NATURAL | SORT_FLAG_CASE)->pluck('nacionalidad', 'id');
        return view('apoderado.edit', ['nacionalidad_id' => $nacionalidad_id, 'apoderado' => $apoderado]);
        //return view('apoderado.edit', compact('apoderado')); //inicial
    }

    public function update(Request $request, Apoderado $apoderado)
    {


        $request->validate([
            'rut_apoderado' => 'required|unique:apoderados,rut_apoderado|integer|min:0|max:99999999',
            'nombre' => 'required|string|max:100',
            'apellidop' => 'required|string|max:100',
            'appelidom' => 'required|string|max:100',
            'direccion' => 'required|string|max:100',
            'telefono' => 'required|numeric',
        ]);
        $apoderado->update($request->all());
        return back()
            ->with('info', 'Apoderado actulizad@ con éxito');
    }

    public function destroy(Apoderado $apoderado)
    {
        //$pendientes = alumno::where('rut_o', $request->input('rut_asegurado'))->where('id_estado_reembolso', 3)->get();
        $apoderado->delete();
        return back()->with('info', 'Apoderado eliminad@ con éxito');
    }
}
