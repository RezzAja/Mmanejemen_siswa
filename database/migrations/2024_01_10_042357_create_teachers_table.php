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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nip');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->text('address');
            $table->text('photo');
            $table->string('position');
            $table->enum('gender' , ['Laki-Laki', 'Perempuan']);
            $table->enum('religion' , ['Islam', 'Konghucu', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'budha']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
