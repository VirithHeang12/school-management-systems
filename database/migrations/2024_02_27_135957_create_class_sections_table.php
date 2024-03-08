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
        Schema::create('class_sections', function (Blueprint $table) {
            $table->id();
            $table->string("class_time")->nullable();
            $table->foreignId("course_id")->constrained();
            $table->foreignId("professor_id")->constrained();
            $table->foreignId("room_id")->constrained();
            $table->foreignId("semester_id")->constrained();
            $table->unique(['professor_id', 'room_id', 'semester_id', 'course_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_sections');
    }
};
