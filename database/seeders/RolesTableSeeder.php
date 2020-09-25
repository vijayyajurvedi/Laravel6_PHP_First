<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// Adding this solved the issue for DB, 
//so I added use Illuminate\Support\Facades\DB; as well. 
//Problem solved. 

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            'name' => 'Admin',
            'slug' => 'admin'
        ]);

        DB::table('roles')->insert([
            'name' => 'Author',
            'slug' => 'author'
        ]);
    }
}
