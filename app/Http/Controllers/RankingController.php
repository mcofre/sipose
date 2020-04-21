<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postulacion;
use App\Curso;


class RankingController extends Controller
{
    public function index(Request $request){
        $cursos = Curso::all();
        $cupos = 0;
        if($request->filtro){
            $postulacion = Postulacion::where('curso',$request->filtro)
            ->Orderby('totalizado','desc')
            //->Orderby('notaporcsocial','desc')
            ->paginate(1000);
            $curso = Curso::where('curso',$request->filtro)->get()->first();
            $cupos = $curso->cupo;
        }else{
        $postulacion = Postulacion::Orderby('totalizado','desc')->paginate(1000);
        }

        return view('ranking.index',['postulaciones'=>$postulacion, 'cursos'=> $cursos, 'cupos' => $cupos]);
        
    }
}
