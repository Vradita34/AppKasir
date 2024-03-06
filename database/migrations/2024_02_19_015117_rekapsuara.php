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
        Schema::create('rekapsuara', function (Blueprint $table) {
            $table->id();
            $table->integer('total_33');
            $table->integer('total_sah_33');
            $table->integer('total_tidaksah_33');
            $table->integer('suara_no1');
            $table->integer('suara_no2');
            $table->integer('suara_no3');
            $table->string('nama_tps', 150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekapsuara');
    }
};
