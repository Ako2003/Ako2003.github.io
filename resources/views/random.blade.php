@extends('layouts.app')

@section('title')
    Random
@endsection


@section('content')
    {{-- Create a dropdown and a button, according to option chosen in dropdown show random question, word or phrase --}}
    <div class="container">
        <div class="card-content">
            <div class="content">
                <h1 id="text">French Examen Random</h1>
                <div class="select">
                    <select id="select">
                        <option value="question">Question</option>
                        <option value="word">Word</option>
                        <option value="phrase">Phrase</option>
                    </select>
                </div>
                <button id="button" class="button is-primary">Random</button>
                <div id="random"></div>
            </div>
        </div>
    </div>

    {{-- Send a reuqest and return json and also create a dropdown with answer--}}

    <script>
        document.getElementById("button").addEventListener("click", function() {
            var select = document.getElementById("select").value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var response = JSON.parse(this.responseText);
                    var random = document.getElementById("random");
                    random.innerHTML = "";
                    if (select == "question") {
                        random.innerHTML += "<div id='question_card' class='card'><div class='card-content'><div class='content'><h2 class='title'>" + response.question +"</h2>"
                    } else if (select == "word") {
                        random.innerHTML += "<div id='word_card' class='card'><div class='card-content'><div class='content'><h2 class='title'>" + response.word + "</h2>";
                    } else if (select == "phrase") {
                        random.innerHTML += "<div id='word_card' class='card'><div class='card-content'><div class='content'><h2 class='title'>" + response.phrase + "</h2>";
                    }
                }
            };
            xhttp.open("GET", "/random/" + select, true);
            xhttp.send();
        });
    </script>

@endsection