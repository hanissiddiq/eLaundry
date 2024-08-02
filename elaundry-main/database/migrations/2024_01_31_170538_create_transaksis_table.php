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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('id_user',255)->nullable();
            $table->string('id_toko',255)->nullable();
            $table->string('id_paket',255)->nullable();
            $table->string('berat',255)->nullable();
            $table->string('total',255)->nullable();
            $table->string('payment',255)->nullable();
            $table->string('status',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
