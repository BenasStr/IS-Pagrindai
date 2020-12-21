@extends('home')

@section('content')
    <div class="row" style="margin-top: 10px; margin-bottom: 10px; margin-left: 40px">
        <form class="form-inline" action="{{ url('/search') }}" method="post">
            {{ csrf_field() }}
            <input class="form-control mr-sm-2" type="text" placeholder="Įveskite raktažodį" name="search">
            <button type="submit" class="btn btn-success">Ieškoti</button>
        </form>
    </div>
    <table style="margin-left: 40px">
        @if($count == 0)
            <h2>Nepavyko rasti duomenų<h2>
                    @else
                        <?php $cnt = 0;?>
                        @for($i = 0; $i < $count; $i++)
                            <?php $cnt = 0;?>
                            @if($i%4 == 0)
                                <tr>
                                    @endif
                                    <td>
                                        <div class="card">
                                            <div class="card-header" style="text-align: center; background-color: #fbc02d">{{ $events[$i]->Pavadinimas }}</div>
                                            <div class="card-body">
                                                <div>Miestas: {{ $events[$i]->Miestas }}</div>
                                                <div>Aprašymas: {{ $events[$i]->Aprasymas }}</div>
                                            </div>
                                            <div class="card-footer">
                                                <a class="btn btn-success" href="{{ route('event', $events[$i]->id_Renginys ) }}">Peržiūrėti</a>
                                                @if($events[$i]->fk_Pardavejasid_Pardavejas==session()->get('id'))
                                                    <a class="btn btn-success" href="{{ route('rredagavimas', $events[$i]->id_Renginys ) }}">Redaguoti</a>
                                                    <a class="btn btn-danger" href="{{ route('delete', $events[$i]->id_Renginys ) }}">Naikinti</a>
                                                    <a class="btn btn-info" href="{{ route('bilietulangas', $events[$i]->id_Renginys ) }}">Bilieta Kurti/Redaguoti</a>
                                                    <a class="btn btn-warning" href="{{ route('nuolaidoslangas', $events[$i]->id_Renginys ) }}">Nuolaidos</a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <?php $cnt++;?>
                                    @if($cnt == 4)
                                </tr>
            <?php $cnt = 0;?>
        @endif
        @endfor
        @endif
    </table>
@endsection
