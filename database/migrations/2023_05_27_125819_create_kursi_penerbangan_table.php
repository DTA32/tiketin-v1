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
        Schema::create('kursi_penerbangan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->constrained('kelas_penerbangan');
            $table->text('nomor_kursi');
            $table->boolean('status_kursi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kursi_penerbangan');
    }
};
