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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->string('cep');
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->decimal('energy_cost', 10, 2);
            $table->decimal('kwh_consumption', 10, 2);
            $table->decimal('system_size', 10, 2);
            $table->decimal('system_cost', 10, 2);
            $table->decimal('payback_period', 10, 2);
            $table->json('components'); // Painéis, inversores, etc.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
