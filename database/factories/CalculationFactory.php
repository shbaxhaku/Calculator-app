<?php

namespace Database\Factories;

use App\Models\Calcuation\Calculation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Calculation>
 */
class CalculationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {

        return [
            //
            'expression'=> $this->generateRandomMathProblems(),
            'result'=> $this->faker->randomFloat(2,0,10000),
        ];

    }
    public function generateRandomMathProblems(){
        $operators=['-','/','+','*'];
        $expresionOne=$this->faker->randomFloat(2,0,10000);
        $expresionTwo=$this->faker->randomFloat(2,0,10000);
        $operator = $this->faker->randomElement($operators);

        return $result=$expresionOne."".$operator." ".$expresionTwo;

}
}
