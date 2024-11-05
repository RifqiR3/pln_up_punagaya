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
        Schema::create('data_sppd', function (Blueprint $table) {
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
            $table->string('surat_undangan');
            $table->string('sppd_file')->nullable();
            $table->boolean('status_konfirmasi')->default(0);
            $table->enum('status', ['Menunggu Asmen untuk meneruskan SPPD ke Manager', 'Menunggu persetujuan Manager', 'Diproses Sekretaris', 'Selesai', 'Ditolak', 'Dibatalkan'])->default('Menunggu Asmen untuk meneruskan SPPD ke Manager');
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('user_uuid')
                ->references('uuid')
                ->on('data_user')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_sppd');
    }
};
