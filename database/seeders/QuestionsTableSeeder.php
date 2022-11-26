<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    public function run()
    {
        $question = $this->question('question', 'question');
        if (!$question->exists) {
            $question->fill([
                'question'              => 'question',
                'answer' => 'answer',
            ])->save();
        }
    }

    /**
     * [dataType description].
     *
     * @param [type] $field
     * @param [type] $for
     *
     * @return [type]
     */
    protected function question($field, $for)
    {
        return Question::firstOrNew([$field => $for]);
    }
}
