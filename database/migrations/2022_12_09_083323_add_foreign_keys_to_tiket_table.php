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
        Schema::table('tiket', function (Blueprint $table) {
            $table->foreign('event_id', 'fk_tiket_to_event')->references('id')->on('event')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('user_id', 'fk_tiket_to_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('jenis_tiket_id', 'fk_tiket_to_jenistiket')->references('id')->on('jenis_tiket')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tiket', function (Blueprint $table) {
            $table->dropForeign('fk_tiket_to_event');
            $table->dropForeign('fk_tiket_to_users');
            $table->dropForeign('fk_tiket_to_jenistiket');
        });
    }
};
