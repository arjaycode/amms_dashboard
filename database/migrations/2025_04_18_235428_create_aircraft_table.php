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
        Schema::create('aircraft', function (Blueprint $table) {
            $table->id();
            $table->string('tail_number')->unique();
            $table->foreignId('manufacturer_id')->constrained()->onDelete('cascade');
            $table->string('model');
            $table->year('year_of_manufacture');
            $table->float('total_flight_hours')->default(0.0);
            $table->integer('total_landings')->default(0);
            $table->date('last_maintenance_date')->nullable();
            $table->date('next_maintenance_due')->nullable();
            $table->foreignId('status_id')->constrained()->onDelete('cascade');
            $table->boolean('is_deleted')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aircraft');
    }
};
