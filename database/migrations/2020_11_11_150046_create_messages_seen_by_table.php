<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesSeenByTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages_seen_by', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("message_id");
            $table->boolean('action')->default(0);
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
        Schema::dropIfExists('messages_seen_by');
    }
}
