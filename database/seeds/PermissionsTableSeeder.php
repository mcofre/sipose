<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
//USUARIO
        DB::table('permissions')->insert([
            'name'        => 'Navegar usuarios', //Str::random(10),
            'slug'        => 'users.index',  //Str::random(10).'@gmail.com',
            'description' => 'Lista y navega todos los usuarios del sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Ver detalle de usuario',
            'slug'        => 'users.show', 
            'description' => 'Ver detalle de cada usuario del sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Edición de usuarios',
            'slug'        => 'users.edit',  //Str::random(10).'@gmail.com',
            'description' => 'Editar cualquier dato de usuario del sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar usuario', //Str::random(10),
            'slug'        => 'users.destroy',  //Str::random(10).'@gmail.com',
            'description' => 'Eliminar cualquier usuario del sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Crear usuario', //Str::random(10),
            'slug'        => 'users.create',  //Str::random(10).'@gmail.com',
            'description' => 'Crear cualquier usuario del sistema',
        ]);

//Roles
        DB::table('permissions')->insert([
            'name'        => 'Navegar roles', //Str::random(10),
            'slug'        => 'roles.index',  //Str::random(10).'@gmail.com',
            'description' => 'Lista y navega todos los Roles del sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Ver detalle de rol',
            'slug'        => 'roles.show', 
            'description' => 'Ver detalle de cada Rol del sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Creación de roles',
            'slug'        => 'roles.create',  //Str::random(10).'@gmail.com',
            'description' => 'Crear Nuevo Rol del sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Edición de roles',
            'slug'        => 'roles.edit',  //Str::random(10).'@gmail.com',
            'description' => 'Editar cualquier Rol del sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar rol', //Str::random(10),
            'slug'        => 'roles.destroy',  //Str::random(10).'@gmail.com',
            'description' => 'Eliminar Rol del sistema',
        ]);

//APODERADO
        DB::table('permissions')->insert([
            'name'        => 'Navegar apoderados',
            'slug'        => 'apoderado.index',
            'description' => 'Lista y navega todos los apoderados',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Ver detalle de apoderado',
            'slug'        => 'apoderado.show', 
            'description' => 'Ver detalle del apoderado del sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Creación de apoderado',
            'slug'        => 'apoderado.create',  //Str::random(10).'@gmail.com',
            'description' => 'Crear Nuevo apoderado del sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Edición de apoderado',
            'slug'        => 'apoderado.edit',  //Str::random(10).'@gmail.com',
            'description' => 'Editar cualquier apoderados del sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar apoderado', //Str::random(10),
            'slug'        => 'apoderado.destroy',  //Str::random(10).'@gmail.com',
            'description' => 'Eliminar apoderados del sistema',
        ]);
        
//NACIONALIDAD
        DB::table('permissions')->insert([
            'name'        => 'Navegar nacionalidades',
            'slug'        => 'nacionalidad.index',
            'description' => 'Lista y navega todas las nacionalidades',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Ver detalle de nacionalidad',
            'slug'        => 'nacionalidad.show', 
            'description' => 'Ver detalle del nacionalidad del sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Creación de nacionalidad',
            'slug'        => 'nacionalidad.create',  //Str::random(10).'@gmail.com',
            'description' => 'Crear Nueva nacionalidad en el sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Edición de nacionalidad',
            'slug'        => 'nacionalidad.edit',  //Str::random(10).'@gmail.com',
            'description' => 'Editar cualquier nacionalidad del sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar nacionalidad', //Str::random(10),
            'slug'        => 'nacionalidad.destroy',  //Str::random(10).'@gmail.com',
            'description' => 'Eliminar nacionalidad del sistema',
        ]);

//PROSPECTO
        DB::table('permissions')->insert([
            'name'        => 'Navegar prospecto',
            'slug'        => 'prospecto.index',
            'description' => 'Lista y navega todas las prospecto',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Ver detalle de prospecto',
            'slug'        => 'prospecto.show', 
            'description' => 'Ver detalle del prospecto del sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Creación de prospecto',
            'slug'        => 'prospecto.create',  //Str::random(10).'@gmail.com',
            'description' => 'Crear Nueva prospecto en el sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Edición de prospecto',
            'slug'        => 'prospecto.edit',  //Str::random(10).'@gmail.com',
            'description' => 'Editar cualquier prospecto del sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar prospecto', //Str::random(10),
            'slug'        => 'prospecto.destroy',  //Str::random(10).'@gmail.com',
            'description' => 'Eliminar prospecto del sistema',
        ]);

//POSTULACIONES
        DB::table('permissions')->insert([
            'name'        => 'Navegar postulacion',
            'slug'        => 'postulacion.index',
            'description' => 'Lista y navega todas las postulacion',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Ver detalle de postulacion',
            'slug'        => 'postulacion.show', 
            'description' => 'Ver detalle del postulacion del sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Creación de postulacion',
            'slug'        => 'postulacion.create',
            'description' => 'Crear Nueva postulacion en el sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Edición de postulacion',
            'slug'        => 'postulacion.edit',
            'description' => 'Editar cualquier postulacion del sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar postulacion',
            'slug'        => 'postulacion.destroy', 
            'description' => 'Eliminar postulacion del sistema',
        ]);

//cursos
        DB::table('permissions')->insert([
            'name'        => 'Navegar cursos',
            'slug'        => 'curso.index',
            'description' => 'Lista y navega todas las cursos',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Ver detalle de cursos',
            'slug'        => 'curso.show', 
            'description' => 'Ver detalle del cursos del sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Creación de cursos',
            'slug'        => 'curso.create',
            'description' => 'Crear Nueva cursos en el sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Edición de curso',
            'slug'        => 'curso.edit',
            'description' => 'Editar cualquier cursos del sistema',
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Eliminar cursos',
            'slug'        => 'curso.destroy', 
            'description' => 'Eliminar cursos del sistema',
        ]);   

//Ranking
        DB::table('permissions')->insert([
            'name'        => 'Navegar ranking',
            'slug'        => 'ranking.index',
            'description' => 'Listado de pastulaciones',
        ]);

//Configuracion
        DB::table('permissions')->insert([
            'name'        => 'Navegar Configuración',
            'slug'        => 'configuracion.edit',  //antes con index, malo
            'description' => 'Configuracion',
        ]);

//cursoses
// cursos de básica
        DB::table('cursos')->insert([
            'curso'        => '1B',
            'descripcion'  => 'primero básico',
            'cupo'         => 10,
        ]);

        DB::table('cursos')->insert([
            'curso'        => '2B',
            'descripcion'  => 'segundo básico',
            'cupo'         => 10,
        ]);

        DB::table('cursos')->insert([
            'curso'        => '3B',
            'descripcion'  => 'tercero básico',
            'cupo'         => 10,
        ]);

        DB::table('cursos')->insert([
            'curso'        => '4B',
            'descripcion'  => 'cuarto básico',
            'cupo'         => 10,
        ]);

        DB::table('cursos')->insert([
            'curso'        => '5B',
            'descripcion'  => 'quinto básico',
            'cupo'         => 10,
        ]);

        DB::table('cursos')->insert([
            'curso'        => '6B',
            'descripcion'  => 'sexto básico',
            'cupo'         => 10,
        ]);

        DB::table('cursos')->insert([
            'curso'        => '7B',
            'descripcion'  => 'septimo básico',
            'cupo'         => 10,
        ]);

        DB::table('cursos')->insert([
            'curso'        => '8B',
            'descripcion'  => 'octavo básico',
            'cupo'         => 10,
        ]);

//cursoss de Media
        DB::table('cursos')->insert([
            'curso'        => '1M',
            'descripcion'  => 'primero medio',
            'cupo'         => 10,
        ]);

        DB::table('cursos')->insert([
            'curso'        => '2M',
            'descripcion'  => 'segundo medio',
            'cupo'         => 10,
        ]);

        DB::table('cursos')->insert([
            'curso'        => '3M',
            'descripcion'  => 'tercero medio',
            'cupo'         => 10,
        ]);

        DB::table('cursos')->insert([
            'curso'        => '4M',
            'descripcion'  => 'cuarto medio',
            'cupo'         => 10,
        ]);

      }
}
