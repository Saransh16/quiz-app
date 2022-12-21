<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = $this->getQuestionsWithAnswers();

        foreach ($questions as $question) {

            Question::create([
                'text' => $question['text'],
                'option_A' => $question['option_A'],
                'option_B' => $question['option_B'],
                'option_C' => $question['option_C'],
                'option_D' => $question['option_D'],
                'correct_option' => $question['correct_option'],
            ]);
        }
    }

    private function getQuestionsWithAnswers()
    {
        $questions = [
            [
                'text' => "You're 4th place right now in a race. What place will you be in when you pass the person in 3rd place?",
                'option_A' => "1st",
                'option_B' => "2nd",
                'option_C' => "3rd",
                'option_D' => "4th",
                'correct_option' => 'option_C'
            ],
            [
                'text' => "How many months have 28 days?",
                'option_A' => "2",
                'option_B' => "1",
                'option_C' => "All of them",
                'option_D' => "Depends if there's a leap year or not",
                'correct_option' => 'option_C'
            ],
            [
                'text' => "How many 0.5cm slices can you cut from a bread that is 25cm long?",
                'option_A' => "50",
                'option_B' => "25",
                'option_C' => "39",
                'option_D' => "None of the above.",
                'correct_option' => 'option_A'
            ],
            [
                'text' => "The answer is really big.",
                'option_A' => "THE ANSWER.",
                'option_B' => "Really big.",
                'option_C' => "An elephant.",
                'option_D' => "The data given is insufficient.",
                'correct_option' => 'option_A'
            ],
            [
                'text' => "Divide 30 by half and add ten.",
                'option_A' => "40.35",
                'option_B' => "50",
                'option_C' => "70",
                'option_D' => "I know this is a trick question, so NONE. Ha!",
                'correct_option' => 'option_C'
            ],
            [
                'text' => "There are two clocks of different colors: The green clock is broken and doesn't run at all, but the yellow clock loses one second every 24 hours. Which clock is more accurate?",
                'option_A' => "The green clock",
                'option_B' => "The yellow clock",
                'option_C' => "Neither",
                'option_D' => "Both",
                'correct_option' => 'option_A'
            ],
            [
                'text' => "A farmer has 17 goats. All of them but 8 die. How many goats are alive?",
                'option_A' => "8",
                'option_B' => "9",
                'option_C' => "25",
                'option_D' => "35",
                'correct_option' => 'option_A'
            ],
            [
                'text' => "Jimmy's father has three sons- Paul I and Paul II. Can you guess the name of the third son?",
                'option_A' => "Paul III",
                'option_B' => "Jimmy",
                'option_C' => "Jerin",
                'option_D' => "None",
                'correct_option' => 'option_C'
            ]            
        ];

        return $questions;
    }
}
