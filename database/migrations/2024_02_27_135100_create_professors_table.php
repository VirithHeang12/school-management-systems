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
        Schema::create('professors', function (Blueprint $table) {
            $table->id("prof_id");
            $table->foreignId("dept_id")->constrained();
            $table->string("prof_specialty")->nullable(false);
            $table->string("prof_fname")->nullable(false);
            $table->string("prof_lname")->nullable(false);
            $table->string("prof_email");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professors');
    }
};
