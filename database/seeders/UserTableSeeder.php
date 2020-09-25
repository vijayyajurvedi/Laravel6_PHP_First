<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// Adding this solved the issue for DB, 
//so I added use Illuminate\Support\Facades\DB; as well. 
//Problem solved. 

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'Admin',
            'username' => 'vijay',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('rootadmin')
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Author',
            'username' => 'Ariyan',
            'email' => 'author@gmail.com',
            'password' => bcrypt('rootauthor')
        ]);

        // Schema::create('users', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('role_id')->default(2);  //1 = Admin 2 = Normal USeer
        //     $table->string('name');
        //     $table->string('username')->unique();
        //     $table->string('email')->unique();
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->string('password');
        //     $table->rememberToken();
        //     $table->timestamps();
    }
}
