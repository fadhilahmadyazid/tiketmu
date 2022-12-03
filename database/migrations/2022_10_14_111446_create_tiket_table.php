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
            $table->foreignId('event_id')->nullable()->index('fk_tiket_to_event');
            $table->foreignId('user_id')->nullable()->index('fk_tiket_to_users');
            $table->foreignId('jenistiket_id')->nullable()->index('fk_tiket_to_jenistiket');
            $table->enum('jenis_tiket',[1,2,3]);
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
