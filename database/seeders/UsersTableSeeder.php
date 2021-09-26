<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id'   => '1',
            'name'      => 'Admin',
            'username'  => 'deepak',
            'email'     => 'mindfreakky@gmail.com',
            'password'  => bcrypt('test@123'),
        ]);

        DB::table('users')->insert([
            'role_id'   => '2',
            'name'      => 'Author',
            'username'  => 'saini',
            'email'     => 'author@gmail.com',
            'password'  => bcrypt('test@123'),
        ]);
    }
}
