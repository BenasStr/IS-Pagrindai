@extends('home')

@section('content')


    <div style="margin-top: 20px">
        <table class="table table-striped table-dark">

            <thead  class="thead-dark">
                <tr>
                    <th><h3>Renginys</h3></th>
                    <th><h3>Kaina</h3></th>
                    <th><h3>Įvertinimas</h3></th>
                </tr>
            </thead>
                @csrf
                @foreach($istorija as $dmenys)
                    <tr >
                        <td>{{ $dmenys -> RenginioPavadinimas }}</td>
                        <td>{{ $dmenys -> Kaina }}</td>
                        <td>{{ $dmenys -> RenginioIvertinimas }}</td>
                        <form method="post" action="{{url('perziuretiDetaliau')}}">
                            @csrf
                            <td><input type="hidden" class="editInput" stype="string" name="id" value="{{ $dmenys -> id_Istorija }}"  readonly></td>
                            <td><input type="submit" name="addPreke" value="Peržiūrėti"></td>
                        </form>
                        <form method="post" action="{{url('atsiliepimai')}}">
                            @csrf
                            <td><input type="hidden" class="editInput" stype="string" name="id" value="{{ $dmenys -> fk_Renginysid_Renginys }}"  readonly></td>
                            <td><input type="submit" name="addPreke" value="Atsiliepimai"></td>
                        </form>
                    </tr>
                @endforeach
        </table>
    </div>

@endsection
