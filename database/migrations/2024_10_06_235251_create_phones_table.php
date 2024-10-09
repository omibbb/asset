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
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->string('ram'); // dalam GB
            $table->string('storage'); // dalam GB
            $table->string('imei');
            $table->integer('battery_capacity'); // dalam mAh
            $table->string('qr_code_path')->nullable(); // Kolom untuk menyimpan path QR Code
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
