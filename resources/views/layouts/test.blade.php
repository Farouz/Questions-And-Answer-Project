<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <!--<link rel="stylesheet" type="text/css" href="/css/main.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">


</head>
<body>
<div id="container">
    <!-- Header Div -->
    <div id="header">
        <a href="/">Make It Snappy Q & A</a>
        <!-- End of header div -->
        <!-- NAV Div-->
        <div id="nav">
            <ul>
                <li><a href="/">Home</a> </li>
                <li><a href="/register">Register</a> </li>
                <li><a href="#">Login</a> </li>
            </ul>
        </div>
        <!-- End Nav -->
        <!-- Content Div -->

        <div id="content">
            @if(Session::has('message'))
                <p id="message">{{Session::get('message')}}</p>
            @endif
            @yield('content')
        </div>
        <!--Content End -->
        <!-- Footer Div -->
        <div id="footer">
            @copy; Hossam Farouz Q&A {{date('Y')}}
        </div>
    </div>
</div>

</body>
</html>