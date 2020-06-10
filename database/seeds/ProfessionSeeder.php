<?php

use Illuminate\Database\Seeder;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Profession::create([
            'user_id'=>1,
            'name'=>'Web Developer',
            'country'=>'Philippines'
        ]);
    }
}
