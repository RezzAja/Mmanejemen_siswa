<?php

namespace Database\Seeders;

use App\Models\ParentModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParentModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ParentModel::create([
            'name' => 'Muhammad Hafidz Choirul Rizal',
            'parent_type' => 'ayah',
            'id_student' => '1',
            'place_of_birth' => 'Bandung',
            'date_of_birth' => '2000-01-01',
            'address' => 'Jl. Kebon Jeruk No. 123',
            'religion' => 'Islam',
            'work' => 'Begal',
        ]);
    }
}
