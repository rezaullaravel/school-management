<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    public function fees_category(){
        return $this->belongsTo(FeesCategory::class,'fees_category_id')->withDefault();
    }

    public function clas(){
        return $this->belongsTo(Clas::class,'clas_id')->withDefault();
    }

    public function section(){
        return $this->belongsTo(Section::class,'section_id')->withDefault();
    }

    public function session(){
        return $this->belongsTo(SessionModel::class,'session_id')->withDefault();
    }
}
