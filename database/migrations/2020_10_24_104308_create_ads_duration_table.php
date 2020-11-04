<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsDurationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_duration', function (Blueprint $table) {
            $table->increments("id")->unique();
            $table->unsignedBigInteger('ads_id');
            $table->foreign('ads_id')->references('id')->on('ads');
            $table->dateTime('start_at',0);
            $table->dateTime('end_at',0);
            $table->boolean('is_free');
            $table->decimal('price');
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
        Schema::dropIfExists('ads_duration');
    }
}
