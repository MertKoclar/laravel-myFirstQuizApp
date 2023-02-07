<?php

namespace Database\Factories;

use App\Models\Quiz;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    protected $model = Quiz::class;

    public function definition()
    {
        return [
            'title'         => $this->faker->sentence(rand(4,8)),
            'description'   => $this->faker->text(200),
        ];
    }
}
