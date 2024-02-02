<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nip',
        'place_of_birth',
        'date_of_birth',
        'address',
        'photo',
        'position',
        'gender',
        'religion',
    ];
}
