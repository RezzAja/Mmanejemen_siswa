<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSpp extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'student_id',
        'classroom_id',
        'parent_id',
        'spp_id',
        'metode_payment',
        

    ];
    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
    public function spp(){
        return $this->belongsTo(Spp::class,'spp_id');
    }
    public function classroom(){
        return $this->belongsTo(Classroom::class,'classroom_id');
    }
    public function parent(){
        return $this->belongsTo(ParentModel::class,'parent_id');
    }
}
