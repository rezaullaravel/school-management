<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public function designation(){
        return $this->belongsTo(Designation::class,'designation_id')->withDefault();
    }

    static function getRecord(){
        return self::all();
    }
}
