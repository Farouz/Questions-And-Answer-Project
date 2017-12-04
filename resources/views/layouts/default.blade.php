<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>{{$title}}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="navbar-top.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="/">Make Your Good Q & A </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            @if(! Auth::check())
            <li class="nav-item">
                <a class="nav-link" href="/register">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="/login">login</a>
            </li>
                @endif
            @if(Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="#">{{Auth::user()->username}}</a>
                </li>
                @if(Auth::user()->is_admin)
                    <li class="nav-item">
                        <a class="nav-link" href="/admin">Admin Controller</a>
                    </li>
                @endif
            <li class="nav-item">
                <a class="nav-link" href="/your-questions">Your Questions</a>
            </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
                @endif
        </ul>
        <form class="form-inline mt-2 mt-md-0" method="post" action="/search">
            {{csrf_field()}}
            <input name="search" id="search" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<main role="main" class="container">
    <div id="content">
        @if(Session::has('message'))
            <p id="message">{{Session::get('message')}}</p>
    @endif
    @yield('content')
</main>



<!-- Bootstrap core JavaScript
================================================== -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<!-- Placed at the end of the document so the pages load faster -->
<footer style="
position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  background-color: #222222;
  text-align: center;">


    <p style="color: #5bc0de"> &copy;Hossam Farouz Q&A {{date('Y')}}</p>

</footer>
</body>
</html>
