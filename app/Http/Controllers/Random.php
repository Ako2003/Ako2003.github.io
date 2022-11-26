<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;
use App\Models\Word;
use App\Models\Phrase;

class Random extends Controller
{
    // Choose random question and return them as json

    public function random_question()
    {
        $questions = Question::all();
        $random_question = $questions->random();
        return response()->json($random_question);
    }

    // Choose random word and return them as json

    public function random_word()
    {
        $words = Word::all();
        $random_word = $words->random();
        return response()->json($random_word);
    }

    // Choose random phrase and return them as json

    public function random_phrase()
    {
        $phrases = Phrase::all();
        $random_phrase = $phrases->random();
        return response()->json($random_phrase);
    }
}
