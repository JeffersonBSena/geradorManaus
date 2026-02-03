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
        Schema::create('s_l_a_s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('resolution_time_hours')->default(24);
            $table->string('color')->default('info'); // primary, danger, waring, success, info
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_l_a_s');
    }
};
