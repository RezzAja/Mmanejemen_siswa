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
        Schema::create('parent_models', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->enum('parent_type' , ['ayah', 'ibu', 'wali']);
                $table->foreignId('id_student')->constrained('students');
                $table->string('place_of_birth');
                $table->date('date_of_birth');
                $table->text('address');
                $table->string('work');          
                $table->enum('religion' , ['Islam', 'Konghucu', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'budha']);
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent_models');
    }
};
