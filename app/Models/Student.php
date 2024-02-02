<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nisn',
        'place_of_birth',
        'date_of_birth',
        'address',
        'photo',
        'gender',
        'religion',
        'classroom_id',
    ];

    public function classroom(){
        return $this->belongsTo(Classroom::class,'classroom_id');
    }

    public function spp() {
        return $this->hasMany(PaymentSpp::class);
    }
}
