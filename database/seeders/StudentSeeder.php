<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'name' => 'Muhammad Hafidz Choirul Rizal',
            'nisn' => '1234567890',
            'place_of_birth' => 'Bandung',
            'date_of_birth' => '2000-01-01',
            'address' => 'Jl. Kebon Jeruk No. 123',
            'photo' => 'belum-ada.jpg',
            'gender' => 'Laki-Laki',
            'religion' => 'Islam',
        ]);
    }
}
