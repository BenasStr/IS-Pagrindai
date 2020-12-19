@extends('home')

@section('content')
    <div class="row" style="margin-top: 10px; margin-bottom: 10px; margin-left: 25px">
        <form class="form-inline" action="{{ url('/') }}" method="post">
            {{ csrf_field() }}
            <input class="form-control mr-sm-2" type="text" placeholder="Įveskite raktažodį" name="search">
            <button class="btn btn-success" type="submit">Ieškoti</button>
        </form>
    </div>
    <table style="margin-left: 40px">
        <?php $cnt = 0;?>
        @for($i = 0; $i < $count; $i++)
            <?php $cnt = 0;?>
            @if($i%4 == 0)
                <tr>
                    @endif
                    <td>
                        <div class="card">
                            <div class="card-header" style="text-align: center; background-color: #fbc02d">{{ $allEvents[$i]->Pavadinimas }}</div>
                            <div class="card-body">
                                <div>Miestas: {{ $allEvents[$i]->Miestas }}</div>
                                <div>Aprašymas: {{ $allEvents[$i]->Aprasymas }}</div>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-success" href="{{ route('event', $allEvents[$i]->id_Renginys ) }}">Peržiūrėti</a>
                            </div>
                        </div>
                    </td>
                    <?php $cnt++;?>
                    @if($cnt == 4)
                </tr>
                <?php $cnt = 0;?>
            @endif
        @endfor
    </table>
@endsection
