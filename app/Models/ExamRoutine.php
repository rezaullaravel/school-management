<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamRoutine extends Model
{
    use HasFactory;

    public function clas(){
        return $this->belongsTo(Clas::class,'clas_id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }

    public function exam(){
        return $this->belongsTo(Exam::class,'exam_id');
    }

    public function session(){
        return $this->belongsTo(SessionModel::class,'session_id');
    }
}
