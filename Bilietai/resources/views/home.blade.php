<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Bilietu kurimo app</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <!--Header-->
    <nav class="navbar navbar-expand-sm bg-warning navbar-light">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('/images/bee.png') }}" alt="bee" style="width:40px;height:30px;">
            BEElietai
        </a>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            @if (session()->get('id') == null)
                <a href="{{ url('/login') }}" style="color: black; text-decoration: none">Login</a>
            @else
                <a href="{{ url('/logout') }}" style="color: black; text-decoration: none">Logout</a>
            @endif
        </div>
    </nav>

    @if (session('prisijungeSekmingai'))
        <div class="alert alert-success">
            <h3>{{session('prisijungeSekmingai')}}</h3>
        </div>
    @endif
    @if (session('prisijungeNesekmingai'))
        <div class="alert alert-danger">
            <h3>{{session('prisijungeNesekmingai')}}</h3>
        </div>
    @endif
    @if (session('atsijungeTeisingai'))
        <div class="alert alert-success">
            <h3>{{session('atsijungeTeisingai')}}</h3>
        </div>
    @endif
    <div class="container-fluid">
        @yield('content')
    </div>
</body>
</html>
