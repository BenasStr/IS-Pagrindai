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
                <b>Laikas:</b> {{ date('H:i', strtotime($event->PradziosLaikas)) }}
                <a class="btn btn-success" href="{{ route('addTicket', $event->id_Renginys) }}">+</a>
                <a class="btn btn-success" href="{{ route('removeTicket', $event->id_Renginys) }}">-</a>
                <div>
                    <b>Bilietai:</b>
                    @foreach($tickets as $ticket)
                        @if($event->id_Renginys == $ticket->fk_Renginysid_Renginys)
                            <div>
                                Vieta: {{ $ticket->Vieta }}
                                Kaina: {{ $ticket->Kaina }}
                            </div>
                        @endif
                    @endforeach
                </div>
            </li>
        @endforeach
    </ul>
    <div>
       <a class="btn btn-danger" href="{{ route('deleteCart', session()->get('id')) }}" style="color: black; text-decoration: none">Naikinti Krepšelį</a>
    </div>
@endsection
