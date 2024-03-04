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
        Schema::create('manager_assignments', function (Blueprint $table) {
            $table->id("manager_assignment_id");
            $table->date("manager_assignment_date");
            $table->foreignId("professor_id")->constrained();
            $table->foreignId("department_id")->constrained();
            $table->unique(['department_id', 'professor_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manager_assignments');
    }
};
