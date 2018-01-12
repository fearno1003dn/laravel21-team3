<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFullNameIdPhoneNumberOnBookRooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_rooms', function (Blueprint $table) {
            $table->string('full_name')->nullable();;
            $table->integer('passport')->nullable();;
            $table->integer('phone_number')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_rooms', function (Blueprint $table) {
            $table->dropColumn('full_name');
            $table->dropColumn('passport');
            $table->dropColumn('phone_number');
        });
    }
}
