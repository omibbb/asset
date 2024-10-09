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
        Schema::create('network_devices', function (Blueprint $table) {
            $table->id();
            $table->string('device_type'); // contoh: router, switch
            $table->string('model');
            $table->string('brand');
            $table->string('serial_number');
            $table->string('ip_address')->nullable();
            $table->string('qr_code_path')->nullable(); // Kolom untuk menyimpan path QR Code
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('network_devices');
    }
};
