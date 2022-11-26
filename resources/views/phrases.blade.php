@extends('layouts.app')

@section('title')
    Phrases
@endsection

@section('content')
    {{-- Show all phrases --}}
    <div class="container">
        <div class="card-content">
            <div class="content">
                <h1 id="text">French Examen Phrases</h1>
                <ol>
                    @foreach ($phrases as $phrase)
                        {{-- Create a card for each phrase --}}
                        <li>
                            <div id="question_card" class="card">
                                <div class="card-content">
                                    <div class="content">
                                        <h2 class="title">{{ $phrase->phrase }}</h2>
                                        <p>{{ $phrase->translation }}</p>
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