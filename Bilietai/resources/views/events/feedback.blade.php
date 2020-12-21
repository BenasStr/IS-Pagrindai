@extends('home')

@section('content')
    <div class="row">
        <div class="col-sm-12 text-center"><h1>Komentarai:</h1></div>
    </div>
    <ul class="list-group">
        <?php $i=0 ?>
        @foreach ($users as $user)
            <li class="list-group-item">
                <b>Vardas: </b>{{ $user->vartotojas['Vardas'] }}
                <b>Atsiliepimas: </b>{{ $rewiews[$i]->Aprasymas }}
            </li>
            <?php $i++ ?>
        @endforeach

    </ul>
@endsection
