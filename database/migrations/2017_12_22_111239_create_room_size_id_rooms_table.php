<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomSizeIdRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
          $table->integer('room_size_id')->unsigned();
         $table->foreign('room_size_id')->references('id')->on('room_sizes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
          $table->dropForeign('rooms_room_size_id_foreign');
          $table->dropColumn('room_size_id');
        });
    }
}
