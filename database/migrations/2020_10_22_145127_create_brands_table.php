<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatebrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments("id")->unique();
            $table->string("name",20);    
            $table->boolean("availability");   
            $table->string("mobile",20);   
            $table->string("web_site",50);   
            $table->string("address",150);   
            $table->string("geolocalisation");   
            $table->string("country")->nullable()->default("Kuwait");   
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            
            $table->foreign('category_id')->references('id')->on('categories');   //foreign key category references categories
            $table->foreign('user_id')->references('id')->on('categories');   //foreign key category references categories
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
        Schema::dropIfExists('brands');
    }
}
