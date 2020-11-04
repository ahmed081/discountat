<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login', function (Blueprint $table) {
            $table->increments("id")->unique();
            $table->unsignedBigInteger("id_device");
            $table->unsignedBigInteger("id_user");
            $table->boolean("logged_out");
            $table->foreign('id_device')->references('id')->on('device');      //foreign key references type id
            $table->foreign('id_user')->references('id')->on('users');      //foreign key references type id
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
        Schema::dropIfExists('login');
    }
}
