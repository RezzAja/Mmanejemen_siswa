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
        Schema::create('payment_spps', function (Blueprint $table) {
            
            $table->id();
                
                $table->foreignId('student_id')->constrained('students');         
                $table->foreignId('classroom_id')->constrained('classrooms');         
                $table->foreignId('parent_id')->constrained('parents');         
                $table->foreignId('spp_id')->constrained('spps');         
                $table->enum('metode_payment' , ['Credit', 'Transfer', 'Cash',]);
                $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_spps');
    }
};
