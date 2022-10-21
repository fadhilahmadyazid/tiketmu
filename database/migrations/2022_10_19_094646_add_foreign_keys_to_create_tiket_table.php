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
            $table->foreign('tiket_id', 'fk_role_id_to_tiket')->references('id')->on('tiket')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('email_user', 'fk_role_email_to_tiket')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
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
            $table->dropForeign('fk_role_id_to_tiket');
            $table->dropForeign('fk_role_email_to_tiket');
        });
    }
};
