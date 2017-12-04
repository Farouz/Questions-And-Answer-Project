@extends('layouts.default')
@section('content')

    <h1>Register</h1>
<form method="Post" action="register">
    {{csrf_field()}}
    
<div class="form-group">
    <label for="username">Your Username : </label>
    <input type="text" name="username" id="username" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password_confirmation">Password Confirmation</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
    </div>
    <div>
    <button type="submit" class="btn btn-primary">Register</button>
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
@endsection