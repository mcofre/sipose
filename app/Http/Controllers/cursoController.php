<?php

namespace App\Http\Controllers;

use App\Postulacion;
use Illuminate\Http\Request;
use App\Curso;

class cursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::paginate();
        return view('curso.index', compact('cursos'));
    }

    public function create()
    {
        return view('curso.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'curso' => 'required|unique:cursos',
            'descripcion' => 'required|string|max:120',
            'cupo' => 'required|integer'
        ]);
        Curso::create($request->all());
        return redirect()->route('curso.index')
            ->with('info', 'Curso guardado con éxito');
    }

    public function edit($id)
    {
        $curso = Curso::find($id);
        return view('curso.edit', compact('curso'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'curso' => 'required|unique:cursos',
            'descripcion' => 'required|string|max:120',
            'cupo' => 'required|integer'
        ]);
        $curso = Curso::find($id);
        $curso->update($request->all());
        return redirect()->route('curso.index')
            ->with('info', 'Curso actulizado con éxito');
    }

    public function destroy($id)
    {

        $curso = Curso::find($id);
        $postulaciones = Postulacion::where('curso', $curso->curso)->get();

        if($postulaciones->count() >= 1){
            return back()->with('info', 'No es posible eliminar un curso si tiene postulaciones asociadas');
        }

        $curso->delete();
        return back()->with('info', 'Curso eliminado con éxito');
    }
}
