<?php

namespace App\Http\Controllers;

use App\Configuracion;
use Illuminate\Http\Request;

class configuracionController extends Controller
{
    public function index()
    {
        $configuraciones = Configuracion::paginate();
        return view('configuracion.index',compact('configuraciones'));
    }

    public function create()
    {
        return view('configuracion.create');
    }

    public function store(Request $request)
    {
        $configuraciones = Configuracion::create($request->all());
        return redirect()->route('configuracion.index', $configuraciones->id)
            ->with('info','Configuracion guardada con éxito');
    }

    public function show(Configuracion $configuracion)
    {
        return view('configuracion.show', compact('configuracion'));
    }

    public function edit(Configuracion $configuracion)
    {
        return view('configuracion.edit', compact('configuracion'));
    }

    public function update(Request $request, Configuracion $configuracion)
    {
        $configuracion->update([
            'fechainicio'=>$request->fechaInicio,
            'fechatermino' => $request->fechaTermino]);
        return redirect()->route('configuracion.edit', $configuracion->id)
            ->with('info','Configuración actulizada con éxito');
    }

    public function destroy(Configuracion $configuracion)
    {
        $configuracion->delete();
        return back()->with('info','Configuración eliminada con éxito');
    }
}
