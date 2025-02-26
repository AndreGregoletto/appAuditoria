<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
              'name'      => 'André Gregoletto'
            , 'email'     => 'argregoletto@gmail.com'
            , 'password'  => bcrypt('12345678')
            , 'cellphone' => '(99) 99999-9999'
            , 'username'  => 'johndoe'
            , 'cpf'       => '123.456.789-00'
            , 'image'     => ''
            , 'status'    => 1
        ]);
    }
}
