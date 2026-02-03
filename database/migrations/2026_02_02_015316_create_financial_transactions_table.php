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
        Schema::create('financial_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // income, expense
            $table->decimal('amount', 10, 2);
            $table->string('description');
            $table->string('category')->nullable(); // e.g., 'Maintenance', 'Rent', 'Sales'
            $table->date('due_date');
            $table->date('paid_date')->nullable();
            $table->foreignId('customer_id')->nullable()->constrained()->onDelete('set null');
            $table->string('status')->default('pending'); // pending, paid, overdue, cancelled
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_transactions');
    }
};
