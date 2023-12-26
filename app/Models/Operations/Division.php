<?php

namespace App\Models\Operations;

use Exception;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    /**
     * @throws Exception
     */
    public function calculate($a, $b){
            if ($b == 0) {
                throw new Exception("Division by zero is not allowed.");
            }
        return $a/$b;
    }
}
