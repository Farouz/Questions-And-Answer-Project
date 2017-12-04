@extends('layouts.default')
@section('content')

    <!--Pulling Awesome Font -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <div class="container">
        <div class="row">
            <div class="col-md-offset-5 col-md-3">
                <div class="form-login">
                    <h4>Welcome back :)</h4>
                    <h4>
                    Please Login :
                    </h4>
                    <form action="/login" method="POST">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <label  for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control input-sm chat-input" placeholder="username" required/>
                    </br>
                    <label  for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control input-sm chat-input" placeholder="password" />
                    </br>
                    <div class="wrapper">
            <span class="group-btn">
                            <button type="submit" class="btn btn-primary btn-md">Login</button>
            </span>
                    </div>
                    </form>
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

            </div>
        </div>
    </div>
    @stop