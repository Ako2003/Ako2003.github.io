@extends('layouts.app')

@section('title')
    Questions
@endsection

@section('content')
    <div class="container">
        <div class="card-content">
            <div class="content">
                <h1 id="text">French Examen Questions</h1>
                <ol>
                    @foreach ($questions as $question)
                        {{-- Create a card for each question-answer --}}
                        <li>
                            <div id="question_card" class="card">
                                <div class="card-content">
                                    <div class="content">
                                        <h2 class="title">{{ $question->question }}</h2>
                                        <p>{{ $question->answer }}</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
@endsection