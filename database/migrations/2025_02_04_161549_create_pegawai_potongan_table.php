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
        Schema::create('pegawai_potongan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pegawai_id');
            $table->unsignedBigInteger('potongan_id');
            $table->timestamps();

            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');
            $table->foreign('potongan_id')->references('id')->on('potongan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai_potongan');
    }
};
