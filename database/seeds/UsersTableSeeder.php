<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Administrador',
            'email'    => 'Administrador@admin.cl',
            'password' => '12345678',
        ]);

        factory(App\User::class,10)->create();

        DB::table('roles')->insert([
            'name'    => 'Admin',
            'slug'    => 'admin',
            'special' => 'all-access',
        ]);

        DB::table('roles')->insert([
            'name'    => 'Apoderado',
            'slug'    => 'apoderado',
        ]);
    
        DB::table('roles')->insert([
            'name'    => 'Coordinador',
            'slug'    => 'coordinador',
        ]);
//Permiso total al Administrador    
        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1,
        ]);

//Permisos para el perfil de APODERADO
        DB::table('permission_role')->insert(['permission_id' => 11, 'role_id' => 2, ]);    
        DB::table('permission_role')->insert(['permission_id' => 12, 'role_id' => 2, ]);
        DB::table('permission_role')->insert(['permission_id' => 14, 'role_id' => 2, ]);
        //DB::table('permission_role')->insert(['permission_id' => 15, 'role_id' => 2, ]);

        DB::table('permission_role')->insert(['permission_id' => 21, 'role_id' => 2, ]);
        DB::table('permission_role')->insert(['permission_id' => 22, 'role_id' => 2, ]);
        DB::table('permission_role')->insert(['permission_id' => 23, 'role_id' => 2, ]);
        DB::table('permission_role')->insert(['permission_id' => 24, 'role_id' => 2, ]);
        DB::table('permission_role')->insert(['permission_id' => 25, 'role_id' => 2, ]);

        DB::table('permission_role')->insert(['permission_id' => 26, 'role_id' => 2, ]);
        DB::table('permission_role')->insert(['permission_id' => 27, 'role_id' => 2, ]);
        DB::table('permission_role')->insert(['permission_id' => 28, 'role_id' => 2, ]);
        DB::table('permission_role')->insert(['permission_id' => 29, 'role_id' => 2, ]);
        DB::table('permission_role')->insert(['permission_id' => 30, 'role_id' => 2, ]); 
        
//Permisos para el perfil de COORDINADOR
        DB::table('permission_role')->insert(['permission_id' => 11, 'role_id' => 3, ]);    
        DB::table('permission_role')->insert(['permission_id' => 12, 'role_id' => 3, ]);
        DB::table('permission_role')->insert(['permission_id' => 14, 'role_id' => 3, ]);

        DB::table('permission_role')->insert(['permission_id' => 17, 'role_id' => 3, ]);
        DB::table('permission_role')->insert(['permission_id' => 18, 'role_id' => 3, ]);
        DB::table('permission_role')->insert(['permission_id' => 19, 'role_id' => 3, ]);
        DB::table('permission_role')->insert(['permission_id' => 20, 'role_id' => 3, ]);

        DB::table('permission_role')->insert(['permission_id' => 21, 'role_id' => 3, ]);
        DB::table('permission_role')->insert(['permission_id' => 22, 'role_id' => 3, ]);
        DB::table('permission_role')->insert(['permission_id' => 24, 'role_id' => 3, ]);

        DB::table('permission_role')->insert(['permission_id' => 26, 'role_id' => 3, ]);
        DB::table('permission_role')->insert(['permission_id' => 27, 'role_id' => 3, ]);
        DB::table('permission_role')->insert(['permission_id' => 29, 'role_id' => 3, ]);

        DB::table('permission_role')->insert(['permission_id' => 31, 'role_id' => 3, ]);
        DB::table('permission_role')->insert(['permission_id' => 32, 'role_id' => 3, ]);
        DB::table('permission_role')->insert(['permission_id' => 33, 'role_id' => 3, ]);
        DB::table('permission_role')->insert(['permission_id' => 34, 'role_id' => 3, ]);
        DB::table('permission_role')->insert(['permission_id' => 35, 'role_id' => 3, ]);

        DB::table('permission_role')->insert(['permission_id' => 36, 'role_id' => 3, ]);
        DB::table('permission_role')->insert(['permission_id' => 37, 'role_id' => 3, ]);

//Nacionalidad
        DB::table('nacionalidads')->insert(['nacionalidad' => 'Chilena', ]);
        DB::table('nacionalidads')->insert(['nacionalidad' => 'Peruana', ]);
        DB::table('nacionalidads')->insert(['nacionalidad' => 'Colombiana', ]);
        DB::table('nacionalidads')->insert(['nacionalidad' => 'Venezolana', ]);

    }
}
