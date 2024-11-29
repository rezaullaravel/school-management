<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Person extends Controller
{
    public $name;
    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
       return $this->name;
    }
}
