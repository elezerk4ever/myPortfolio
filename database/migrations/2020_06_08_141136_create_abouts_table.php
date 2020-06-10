<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->mediumText('intro');
            $table->mediumText  ('objectives');
            $table->string('bdate');
            $table->mediumText('img');
            $table->mediumText('website');
            $table->string('phone');
            $table->string('city');
            $table->string('age');
            $table->boolean('isFreelance')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}
