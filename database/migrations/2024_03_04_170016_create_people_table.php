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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string("person_email")->nullable(false)->unique();
            $table->string("person_first_name")->nullable(false);
            $table->string("person_last_name")->nullable(false);
            $table->boolean("person_is_professor")->nullable(false);
            $table->date("person_date_of_birth")->nullable(false);
            $table->string("person_profile")->nullable();
            $table->foreignId("department_id")->constrained();
            $table->foreignId("address_id")->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
