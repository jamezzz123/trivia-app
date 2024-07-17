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
        $questions = [
            [
                'question' => 'What is the capital of France?',
                'options' => ['Paris', 'London', 'Berlin'],
                'correct_option' => 0
            ],
            [
                'question' => 'What is 2 + 2?',
                'options' => ['3', '4', '5'],
                'correct_option' => 1
            ],
            [
                'question' => 'What is the largest planet?',
                'options' => ['Earth', 'Jupiter', 'Mars'],
                'correct_option' => 1
            ],
        ];
        
        foreach ($questions as $q) {
            Question::create([
                'question' => $q['question'],
                'options' => json_encode($q['options']),
                'correct_option' => $q['correct_option']
            ]);
        }
    }
}
