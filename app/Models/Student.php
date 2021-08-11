<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function student(){
        return $this->belongsTo(User::class,'student_id','id');
    }



    public function class(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }


    public function year(){
        return $this->belongsTo(Year::class,'year_id','id');
    }


    public function group(){
        return $this->belongsTo(StudentGroup::class,'group_id','id');
    }


    public function shift(){
        return $this->belongsTo(StudentShift::class,'shift_id','id');
    }
}
