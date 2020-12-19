@extends('home')

@section('content')
    <div class="row" style="margin-top: 10px; margin-bottom: 10px; margin-left: 25px">
        <form class="form-inline" action="{{ url('/') }}" method="post">
            {{ csrf_field() }}
            <input class="form-control mr-sm-2" type="text" placeholder="Type keyword" name="search">
            <button class="btn btn-success" type="submit">Search</button>
        </form>
    </div>

    @foreach($allEvents as $event)
        {{ $index = 0 }}
        <div class="row" style="margin: 10px">

        </div>
    @endforeach
{{--    <div class="row" style="margin: 10px">--}}
{{--        <div class="col-sm-3">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">Basic card</div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-sm-3">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">Basic card</div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-sm-3">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">Basic card</div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-sm-3">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">Basic card</div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row" style="margin: 10px">--}}
{{--        <div class="col-sm-3">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">Basic card</div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-sm-3">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">Basic card</div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-sm-3">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">Basic card</div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-sm-3">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">Basic card</div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
