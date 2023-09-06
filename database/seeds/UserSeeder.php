<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create( [
            'name' => 'Administrator',
            'username' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt("admin"),
            'id_role' => 1,
            'remember_token' => Str::random(50),
        ] );
        User::create( [
            'name' => 'Riri',
            'username' => 'Riri',
            'email' => 'riri@gmail.com',
            'password' => bcrypt("riri"),
            'id_role' => 3,
            'remember_token' => Str::random(50),
        ] );
        User::create( [
            'name' => 'Putra',
            'username' => 'Putra',
            'email' => 'putra@gmail.com',
            'password' => bcrypt("putra"),
            'id_role' => 3,
            'remember_token' => Str::random(50),
        ] );
        User::create( [
            'name' => 'Joy',
            'username' => 'Joy',
            'email' => 'joy@gmail.com',
            'password' => bcrypt("joy"),
            'id_role' => 4,
            'remember_token' => Str::random(50),
        ] );
        User::create( [
            'name' => 'Adhit',
            'username' => 'Adhit',
            'email' => 'adhit@gmail.com',
            'password' => bcrypt("adhit"),
            'id_role' => 5,
            'remember_token' => Str::random(50),
        ] );

        User::create( [
            'name' => 'Keuangan',
            'username' => 'Keuangan',
            'email' => 'keuangan@gmail.com',
            'password' => bcrypt("keuangan"),
            'id_role' => 4,
            'remember_token' => Str::random(50),
        ] );
    }
}
