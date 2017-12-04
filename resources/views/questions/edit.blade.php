@extends('layouts.default')
@section('content')
   Your Original Question Is : <h3>{{$question->question}}</h3>
    <form method="post" action="update" class="form-control" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="question" id="question">Edit Your Question :</label>
            <input type="text" name="question" id="question" class="form-control" required>
        </div>
        <div>
            <label for="solved">
                <input type="checkbox" name="solved" for="solved" id="solved"> Solved
            </label>
        </div>
        <div>
            <button type="submit" class="btn btn-primary"> Edit</button>

        </div>
    </form>
    @stop