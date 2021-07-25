<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuitionFeeCategoryAmount extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','class_id','amount'];

    public function cateogry(){
        return $this->belongsTo(TuitionFeeCategory::class,'category_id','id');
    }

    public function class(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }
}
