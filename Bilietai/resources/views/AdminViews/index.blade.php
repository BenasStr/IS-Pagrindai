@extends('home')
@section('content')

    <!--VARTOTOJU PAIESKAI-->
<div class="row" style="margin-top: 10px; margin-bottom: 10px; margin-left: 25px">
    <div class="col-sm-2">
        <form class="form-inline" action="{{ url('/') }}" method="post">
            {{ csrf_field() }}
            <input class="form-control mr-sm-2" type="text" placeholder="Type keyword" name="search">
            <button class="btn btn-success" type="submit">Ieškoti</button>
        </form>
    </div>


    <!--RENGINIU PERZIURAI-->
    <div class="col-sm-2">
        <form class="form-inline" action="{{url('/admin/getEvents')}}" method="get">
            <button class="btn btn-success" type="submit" name="renginiuSarasas">Rodyti renginius</button>
        </form>
    </div>


    <!--PASKYRU PERZIURAI-->
    <div class="col-sm-2">
        <form class="form-inline" action="{{url('/admin/getUsers')}}" method="get">
            <button class="btn btn-success" type="submit" name="paskyruSarasas">Rodyti paskyras</button>
        </form>
    </div>
</div>
    @yield('adminContent')
@endsection
