<?php

namespace Database\Factories;

use Carbon\Carbon;
use Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubTaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name' => $this->faker->unique()->sentence,
            'date' => Carbon::now(),
        ];
    }
}
