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

        User::create( [
            'name' => 'Logistik',
            'username' => 'Logistik',
            'email' => 'logistik@gmail.com',
            'password' => bcrypt("logistik"),
            'id_role' => 6,
            'remember_token' => Str::random(50),
        ] );

        User::create( [
            'name' => 'Perawatan',
            'username' => 'Perawatan',
            'email' => 'sopir@gmail.com',
            'password' => bcrypt("sopir"),
            'id_role' => 7,
            'remember_token' => Str::random(50),
        ] );

        User::create( [
            'name' => 'Petugas Cuci',
            'username' => 'Petugas Cuci',
            'email' => 'petugascuci@gmail.com',
            'password' => bcrypt("petugascuci"),
            'id_role' => 8,
            'remember_token' => Str::random(50),
        ] );

        User::create( [
            'name' => 'Perawatan',
            'username' => 'svpcuci',
            'email' => 'svpcuci@gmail.com',
            'password' => bcrypt("svpcuci"),
            'id_role' => 9,
            'remember_token' => Str::random(50),
        ] );

        User::create( [
            'name' => 'Perawatan',
            'username' => 'Petugas Check',
            'email' => 'petugascheck@gmail.com',
            'password' => bcrypt("petugascheck"),
            'id_role' => 10,
            'remember_token' => Str::random(50),
        ] );

        User::create( [
            'name' => 'Perawatan',
            'username' => 'svp Petugas Check',
            'email' => 'svppetugascheck@gmail.com',
            'password' => bcrypt("svppetugascheck"),
            'id_role' => 11,
            'remember_token' => Str::random(50),
        ] );
    }
}
