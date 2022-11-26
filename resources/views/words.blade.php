@extends('layouts.app')

@section('title')
    Words
@endsection

@section('content')

    {{-- Show all words --}}
    <div class="container">
        <div class="card-content">
            <div class="content">
                <h1 id="text">French Examen Words</h1>
                <ol>
                    @foreach ($words as $word)
                        {{-- Create a card for each word --}}
                        <li>
                            <div id="word_card" class="card">
                                <div class="card-content">
                                    <div class="content">
                                        <h2 class="title">{{ $word->word }}</h2>
                                        <p>{{ $word->translation }}</p>
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