<?php

namespace App\Models\Calcuation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{

    use HasFactory ;
        protected $fillable = ['expression','result'];


}
