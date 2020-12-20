@extends('home')

@section('content')
    <div class="row">
        <div class="col-sm-12 text-center"><h1>Krepšelis</h1></div>
    </div>
    <ul class="list-group">
        @foreach($events as $event)
            <li class="list-group-item">
                {{ $event->Pavadinimas }}
                <b>Data:</b> {{ $event->Data }}
                <b>Laikas:</b> {{ $event->PradziosLaikas }}

            </li>
        @endforeach
    </ul>
    <div>
{{--        <a class="btn-danger" href="{{  }}"--}}
    </div>
@endsection
