<?php

use Illuminate\Support\Facades\Route;
use App\Models\Question;
use App\Models\Word;
use App\Models\Phrase;
use TCG\Voyager\Facades\Voyager;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login/check', 'App\Http\Controllers\LogIn@check');

// If user is not authenticated, redirect to login page
Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', function () {
        $questions = Question::all();
        return view('questions', ['questions' => $questions]);
    });

    Route::get('/words', function () {
        $words = Word::all();
        return view('words', ['words' => $words]);
    });

    Route::get('/phrases', function () {
        $phrases = Phrase::all();
        return view('phrases', ['phrases' => $phrases]);
    });

    Route::get('/random', function () {
        $questions = Question::all();
        $words = Word::all();
        $phrases = Phrase::all();
        return view('random', ['questions' => $questions, 'words' => $words, 'phrases' => $phrases]);
    });

    // Choose random question
    Route::get('/random/question', 'App\Http\Controllers\Random@random_question');

    // Choose random word
    Route::get('/random/word', 'App\Http\Controllers\Random@random_word');

    // Choose random phrase
    Route::get('/random/phrase', 'App\Http\Controllers\Random@random_phrase');

    Route::post('/logout', 'App\Http\Controllers\LogIn@logout');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
