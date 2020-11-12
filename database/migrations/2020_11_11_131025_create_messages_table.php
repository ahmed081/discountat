<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments("id");
            $table->string('message');
            $table->boolean('availability')->default(1);
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("category_id");
            $table->foreign('user_id')->references('id')->on('users');   //foreign key id_user references users
            $table->foreign('category_id')->references('id')->on('messages_categories');   
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
        Schema::dropIfExists('messages');
    }
}
