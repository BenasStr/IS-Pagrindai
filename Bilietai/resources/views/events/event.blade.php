@extends('home')

@section('content')
    <div class="row">
        <div class="col-sm-12 text-center"><h1>{{ $event->Pavadinimas }}</h1></div>
    </div>
    <div class="row">
        <div class="col-sm-6 text-center">Nuotraukos: jeigu tokiu butu</div>
        <div class="col-sm-6 text-center">
            <ul class="list-group">
                <li class="list-group-item">Miestas: {{ $event->Miestas }}</li>
                <li class="list-group-item">Adresas: {{ $event->Adresas }}</li>
                <li class="list-group-item">Data: {{ $event->Data }}</li>
                <li class="list-group-item">Laikas:
                    {{ date('H:i', strtotime($event->PradziosLaikas)) }}
                    iki {{ date('H:i', strtotime($event->PabaigosLaikas)) }}
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 text-center">{{ $event->Aprasymas }}</div>
        <div class="col-sm-6 text-center"></div>
    </div>
    <div class="row">
        @if(session()->get('id') != null && $ticket_count > 0)
            <a class="btn btn-info" href="{{ route('addToCart', $event->id_Renginys ) }}" style="position: absolute; right: 40px;">Pridėti į krepšelį</a>
        @endif
        <a class="btn btn-success" href="{{ route('feedback', $event->id_Renginys ) }}" style="right: 40px;">Peržiūrėti atsiliepimus</a>
    </div>

@endsection
