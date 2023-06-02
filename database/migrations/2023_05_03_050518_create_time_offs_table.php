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
        Schema::create('time_offs', function (Blueprint $table) {
            $table->id();
            //$table->foreign('employee_name')->references('id')->on('users');
            $table->string('employee_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('leave_type');
            $table->string('leave_reason');
            $table->string('file_attachment')->nullable();
            $table->string('status')->default('Pending')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_offs');
    }
};
