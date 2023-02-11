<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Question;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    protected $model = Question::class;

    public function definition()
    {
        return [
            'quiz_id'       => rand(1,10),
            'question'      => $this->faker->text(200),
            'answer1'       => $this->faker->text(20),
            'answer2'       => $this->faker->text(20),
            'answer3'       => $this->faker->text(20),
            'answer4'       => $this->faker->text(20),
            'correct_answer'=> rand(1,4),
        ];
    }
}
