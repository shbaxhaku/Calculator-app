<?php

namespace App\Models\Operations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multiplication extends Model
{
    public function calculate($a,$b){
        return $a*$b;
    }
}
