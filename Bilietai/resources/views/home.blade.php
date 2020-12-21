<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Bilietu kurimo app</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                @if(session()->get('id') != null)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart', session()->get('id') ) }}">Krepšelis</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                    @if(session()->get('tipas') == 2)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('renginiulangas') }}" style="color: black; text-decoration: none">Renginių kūrimas</a>
                        </li>
                    @endif
            </ul>
            <ul class="navbar-nav">
                @if(session()->get('tipas') == 3)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('Istorija') }}" style="color: black; text-decoration: none">Bilietų istorija</a>
                    </li>
                @endif
                <li class="nav-item">
                    @if(session()->get('tipas') == 1)
                        <a class="nav-link" href="{{ url('settings1') }}" style="color: black; text-decoration: none">Nustatymai</a>
                    @endif
                    @if(session()->get('tipas') == 2)
                        <a class="nav-link" href="{{ url('settings2') }}" style="color: black; text-decoration: none">Nustatymai</a>
                    @endif
                    @if(session()->get('tipas') == 3)
                        <a class="nav-link" href="{{ url('settings3') }}" style="color: black; text-decoration: none">Nustatymai</a>
                    @endif
                </li>
                <li class="nav-item">
                    @if (session()->get('id') == null)
                        <a class="nav-link" href="{{ url('/login') }}" style="color: black; text-decoration: none">Login</a>
                    @else
                        <a class="nav-link" href="{{ url('/logout') }}" style="color: black; text-decoration: none">Logout</a>
                    @endif
                </li>
            </ul>

        </div>
    </nav>

    @if (session('success'))
        <div class="alert alert-success">
            <h3>{{session('success')}}</h3>
        </div>
    @endif
    @if (session('danger'))
        <div class="alert alert-danger">
            <h3>{{session('danger')}}</h3>
        </div>
    @endif

    <div class="container-fluid">
        @yield('content')
    </div>
</body>
</html>
