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
        Schema::create('temp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_produk');
            $table->integer('jumlah');
            $table->foreignId('id_pelanggan');
            $table->foreignId('id_users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temp');
    }
};
