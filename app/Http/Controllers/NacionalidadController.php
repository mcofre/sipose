<?php

namespace App\Http\Controllers;

use App\Nacionalidad;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class NacionalidadController extends Controller
{
    public function index()
    {
        $nacionalidades = Nacionalidad::paginate();
        return view('nacionalidad.index', compact('nacionalidades'));
    }

    public function create()
    {
        return view('nacionalidad.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nacionalidad' => 'required|unique:nacionalidads,nacionalidad'
        ]);
        $nacionalidades = Nacionalidad::create($request->all());
        //return redirect()->route('nacionalidad.edit', $nacionalidades->id)
        return redirect()->route('nacionalidad.index')
            ->with('info', 'Nacionalidad guardada con éxito');
    }

    public function show(Nacionalidad $nacionalidad)
    {
        //dd($nacionalidad);
        return view('nacionalidad.show', compact('nacionalidad'));
    }

    public function edit(Nacionalidad $nacionalidad)
    {
        return view('nacionalidad.edit', compact('nacionalidad'));
    }

    public function update(Request $request, Nacionalidad $nacionalidad)
    {
        $this->validate($request, [
            'nacionalidad' => 'required|unique:nacionalidads,nacionalidad'
        ]);
        $nacionalidad->update($request->all());
        return redirect()->route('nacionalidad.edit', $nacionalidad->id)
            ->with('info', 'Nacionalidad actulizada con éxito');
    }

    public function destroy(Nacionalidad $nacionalidad)
    {
        try {
            $nacionalidad->delete();
        } catch (QueryException $e) {
            return back()->with('info', 'No es posible eliminar una nacionalidad si la usa alguien');
        }
        return back()->with('info', 'Nacionalidad eliminada con éxito');
    }
}
