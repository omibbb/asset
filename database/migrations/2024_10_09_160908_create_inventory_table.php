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
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->string('asset_class');
            $table->string('asset_no');
            $table->string('asset_description');
            $table->date('acquisition_date');
            $table->string('new_fixed_asset_no');
            $table->string('qr_code_path')->nullable(); // Kolom untuk menyimpan path QR Code
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
