@extends('home')

@section('content')
    <div class="row">
        <div class="col-sm-12 text-center"><h1>Komentarai:</h1></div>
    </div>
    <ul class="list-group">
        @for($i = 0; $i < $count; $i++)
            <li class="list-group-item">
                <b>Vardas:</b> {{ $users[$i]->vartotojas["Vardas"] }}
                <b>Atsiliepimas:</b> {{ $rewiews[$i]->Aprasymas }}
            </li>
        @endfor
    </ul>
@endsection
