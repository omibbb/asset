<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('softwares', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('version');
            $table->string('license_key');
            $table->string('buying_date');
            $table->string('expiry_date');
            $table->string('qr_code_path')->nullable(); // Kolom untuk menyimpan path QR Code
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('softwares');
    }
};
