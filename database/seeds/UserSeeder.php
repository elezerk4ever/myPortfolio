<?php

use Illuminate\Database\Seeder;
use \App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = "import19";
        User::create([
            "name"=>"william galas",
            "email"=>"williamgalas2@gmail.com",
            "password"=>Hash::make($password)
        ]);
    }
}
