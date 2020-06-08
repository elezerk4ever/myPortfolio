<?php

use Illuminate\Database\Seeder;
use \App\About;
class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'user_id'=>1,
            'intro'=>"Please edit me!",
            "bdate"=>"04/03/2000",
            "img"=>"https://shorturl.at/mqHNW",
            "website"=>"place your website link here",
            "phone"=>"09096524461",
            "city"=>"tarlac",
            "age"=>"20",
            "isFreelance"=>false,
            "objectives"=>"write you objectives here"
        ]);
    }
}
