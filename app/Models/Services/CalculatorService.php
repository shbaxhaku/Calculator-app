<?php

namespace App\Models\Services;

use App\Models\Operations\Addition;
use App\Models\Operations\Division;
use App\Models\Operations\Multiplication;
use App\Models\Operations\Subtraction;
use Illuminate\Database\Eloquent\Model;

class CalculatorService extends Model
{

    public function calculate($operation, $arrayoperands)
    {
        try {
            $operation = match ($operation) {
                "+" => new Addition(),
                "-" => new Subtraction(),
                "*" => new Multiplication(),
                "/" => new Division(),
                default => throw new \InvalidArgumentException("Invalid operation symbol"),
            };
            return $operation->calculate(...$arrayoperands);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }


}
