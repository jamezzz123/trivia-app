<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Question::create(
            [
                'question' => 'What is the capital of France?',
                'options' => json_encode(['Paris', 'London', 'Berlin']),
                'correct_option' => 0
            ],
            [
                'question' => 'What is 2 + 2?',
                'options' => json_encode(['3', '4', '5']),
                'correct_option' => 1
            ],
            [
                'question' => 'What is the largest planet?',
                'options' => json_encode(['Earth', 'Jupiter', 'Mars']),
                'correct_option' => 1
            ],
            // Add more questions
        );
    }
}
