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
        return $this->belongsTo(Clas::class,'class_id')->withDefault();
    }
}
