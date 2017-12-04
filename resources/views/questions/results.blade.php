@extends('layouts.default')
@section('content')
        <h2>Search Results</h2>
        <div class="container">


        <ul>
                @foreach($questions as $question)
                        <li>
                                <a href="/question/{{$question->id}}"> {{$question->question}}</a>
                        </li>
                        @endforeach
        </ul>
        </div>
    @stop