@extends('layouts.app')

@section('title')
    Log In
@endsection

@section('content')
    {{-- Login form with email and password --}}
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-half">
                {{-- Error message which disappears after 3 seconds--}}
                @if (session('error'))
                    <div class="notification is-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-content">
                        <div class="content">
                            <h1 class="title">Log In</h1>
                            <form action="/login/check" method="POST">
                                @csrf
                                <div class="field">
                                    <label for="email" class="label">Email</label>
                                    <div class="control">
                                        <input type="email" name="email" id="email" class="input @error('email') is-danger @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                    @error('email')
                                        <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="field">
                                    <label for="password" class="label">Password</label>
                                    <div class="control">
                                        <input type="password" name="password" id="password" class="input @error('password') is-danger @enderror" required autocomplete="current-password">
                                    </div>
                                    @error('password')
                                        <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <button type="submit" class="button is-link">Log In</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection