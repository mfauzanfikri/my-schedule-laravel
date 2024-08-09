<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('employee_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained();
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('work_type', ['regular', 'shift']);
            $table->enum('work_time', ['regular', 'morning', 'afternoon', 'night']);
            $table->string('slug')->unique();
            $table->enum('status', ['on_progress', 'approved', 'rejected'])->default('on_progress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('employee_schedules');
    }
};
