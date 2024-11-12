<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_mobil_dinas', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->uuid('user_uuid');
            $table->string('nama');
            $table->string('nip');
            $table->text('maksud');
            $table->string('tujuan_provinsi');
            $table->string('tujuan_kota');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->uuid('driver_uuid');
            $table->boolean('status_konfirmasi')->default(0);
            $table->timestamps();

            $table->foreign('user_uuid')
                ->references('uuid')
                ->on('data_user')
                ->onDelete('cascade');

            $table->foreign('driver_uuid')
                ->references('uuid')
                ->on('data_driver')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_mobil_dinas');
    }
};
