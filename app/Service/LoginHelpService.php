<?php 

namespace App\Service;

use Carbon\Carbon;
use App\Configuracion;
use Auth;
use DB;
use Illuminate\Http\Request;

trait LoginHelpService
{

    public function validafechaingresousuarionoadmin($user){
        
        $rol = DB::table('role_user')
                    ->where('user_id',$user->id)
                    ->join('roles','role_user.role_id','=','roles.id')
                    ->get(['roles.name'])
                    ->first();
        
        if ($rol->name !== 'Admin' && $rol->name !== 'Coordinador'){
            $config = Configuracion::find(1);
        
            if(Carbon::today() < $config->fechaInicio || Carbon::today() > $config->fechaTermino  ){
            
                session(['BLOQUEADO' => 'bloqueado']);
            }else{
                session(['BLOQUEADO' => 'auth']);
            }
        }else{
            session(['BLOQUEADO' => 'auth']);
        }

    }
    

}