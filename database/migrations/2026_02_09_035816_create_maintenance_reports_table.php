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
        Schema::create('maintenance_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Technician
            $table->string('service_type')->default('preventive'); // preventive, corrective
            $table->date('maintenance_date');
            
            // Equipment Info
            $table->string('equipment_name')->default('Grupo Gerador');
            $table->string('brand_model')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('power')->nullable();
            $table->string('hour_meter')->nullable();
            $table->string('installation_location')->nullable();
            
            // Technical details
            $table->json('checklist')->nullable();
            $table->text('services_performed')->nullable();
            $table->text('observations')->nullable();
            $table->string('status')->default('completed'); // draft, completed
            
            // Signatures & Photos
            $table->string('technician_signature_path')->nullable();
            $table->string('client_signature_path')->nullable();
            $table->json('photos')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_reports');
    }
};
