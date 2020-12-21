@extends('home')
@section('content')


    <?php
            $tipas  = session()->get('tipas');
            if($tipas != 1)
            {
                die("Negalima patekti dėl teisių trūkumo");
            }
        ?>
    <!--VARTOTOJU PAIESKAI-->
<div class="row" style="margin-top: 10px; margin-bottom: 10px; margin-left: 25px">
    <div class="col-sm-2">
        <form class="form-inline" action="{{ url('/admin/filteredUserRequest') }}" method="post">
            {{ csrf_field() }}
            <input class="form-control mr-sm-2" type="text" placeholder="Type keyword" name="searchAdmin">
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
    <!--PATVIRTINTI PASKYRAS-->
    <div class="col-sm-2">
        <form class="form-inline" action="{{url('/admin/unconfirmedAccounts')}}" method="get">
            <button class="btn btn-success" type="submit" name="patvirtintiPaskyras">Patvirtinti paskyras</button>
        </form>
    </div>
</div>
    @yield('adminContent')
@endsection

