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
        Schema::create('tiket', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nama_event')->nullable()->index('fk_appointment_to_tiket');
            $table->foreignId('user_id')->nullable()->index('fk_appointment_to_users');
            $table->string('jenis_tiket');
            $table->string('harga_tiket');
            $table->enum('status', [1,2]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiket');
    }
};
