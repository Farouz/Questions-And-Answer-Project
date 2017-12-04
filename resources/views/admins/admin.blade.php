@extends('layouts.default')
@section('content')
<div class="container">
    <h2>Questions Control</h2>

    <table class=" table table-hover">
            <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Username</th>
                <th>Control</th>
            </tr>

            @foreach($questions as $question)
            <tr>
                <th>{{$question->id}}</th>
                <th>{{$question->question}}</th>
                <th>{{$question->user->username}}</th>
                <th>
                    <div>
                        <a href="admin/{{$question->id }}/delete" class="btn btn-danger center-block">Delete</a>
                    </div>
                </th>
            </tr>
                @endforeach


    </table>
</div>
<hr>

<div class="container">
    <h2>Users Control</h2>

    <table class=" table table-hover">
        <tr>
            <th>ID</th>
            <th>UserName</th>
            <th>Control</th>
        </tr>

        @foreach($users as $user)
            <tr>
                <th>{{$user->id}}</th>
                <th>{{$user->username}}</th>
                <th>
                    <div>
                        <a href="admin/{{$user->id }}/deleteUser" class="btn btn-danger center-block">Delete</a>
                        <form action="admin/{{$user->id}}/update" method="post" class="pull-right">
                            {{csrf_field()}}

                                    <input type="checkbox" name="makeAdmin" class="bottom" for="makeAdmin" id="solved"> make admin

                                <button type="submit" class="btn btn-primary"> submit</button>


                        </form>
                    </div>
                </th>
            </tr>
        @endforeach


    </table>
</div>

    @stop