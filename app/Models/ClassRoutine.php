<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoutine extends Model
{
    use HasFactory;

    public function clas(){
        return $this->belongsTo(Clas::class,'clas_id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }

    public function week(){
        return $this->belongsTo(Week::class,'week_id');
    }
}
