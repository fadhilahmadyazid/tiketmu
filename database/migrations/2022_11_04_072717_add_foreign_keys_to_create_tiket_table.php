<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('create_tiket', function (Blueprint $table) {
            $table->foreign('nama_event', 'fk_appointment_to_tiket')->references('id')->on('tiket')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('user_id', 'fk_appointment_to_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('create_tiket', function (Blueprint $table) {
            $table->dropForeign('fk_appointment_to_tiket');
            $table->dropForeign('fk_appointment_to_users');
        });
    }
};
