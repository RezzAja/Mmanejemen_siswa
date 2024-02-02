<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'parent_type',
        'id_student',
        'place_of_birth',
        'date_of_birth',
        'address',
        'religion',
        'work',
    ];

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
    public function spp(){
        return $this->hasMany(PaymentSpp::class);
    }
}
 
