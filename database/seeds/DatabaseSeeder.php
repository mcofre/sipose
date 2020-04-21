<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // $this->call(UsersTableSeeder::class);    -> ya no
        $this->call([            
            PermissionsTableSeeder::class,
            UsersTableSeeder::class,
            //ProductsTableSeeder::class,
        ]);
        
        /*
        $this->call([            
            cargaSeeder::class
        ]);
        */
    }
}
