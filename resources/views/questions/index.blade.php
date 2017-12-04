@extends('layouts.default')
@section('content')

        <h2>Ask Your Questions </h2>

        <div class="form-control"> <!-- Questions Form-->
            @if(Auth::check())
            <form method="post" action="ask">
                {{csrf_field()}}
                <input name="user_id" type="hidden" value="{{Auth::user()->id}}"/>
                <label for="question">Ask Your Question</label>
                <input type="text" name="question" class="form-control input-sm chat-input" id="question" required>
                <br>
                <button type="submit" class="btn btn-xs btn-success">Ask</button>
            </form>
                @else
            <h2>Please Login or Register to ask your questions</h2>
                @endif
                @if(count($errors))
                    <div class="form-group" >
                        <div class="alert alert-error">
                            <ul>
                                @foreach($errors->all() as $error )
                                    <li> {{$error}} </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
    </div>
        @if(Auth::check())
    <div class="container"> <!-- showing questions-->
        <hr>
<h2>Unsolved Questions</h2>
      <ul>
          @foreach($questions as $question)
            <a href="question/{{$question->id}}" > <li>{{$question->question}}</li> </a> By {{$question->user->username}}
              @endforeach
      </ul>
    </div>
@endif
@endsection
