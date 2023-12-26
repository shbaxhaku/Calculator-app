<?php

namespace App\Models\Operations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtraction extends Model
{
    public function calculate($a,$b){
        return $a-$b;
    }
}
