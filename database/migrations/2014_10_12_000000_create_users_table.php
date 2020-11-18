<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments("id")->unique();
            $table->string('full_name',80);
            $table->string('email',100)->unique();
            $table->string('password',255);
            $table->string('image',255)->nullable()->default("https://www.w3schools.com/howto/img_avatar.png");
            $table->boolean('availability');
            $table->boolean('country')->nullable()->default("Kuwait");
            $table->unsignedBigInteger('type');
            $table->integer('free_ads_count'); 
            $table->timestamps();
            $table->foreign('type')->references('id')->on('type');      //foreign key references type id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
