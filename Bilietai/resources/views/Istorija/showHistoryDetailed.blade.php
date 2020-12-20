@extends('home')

@section('content')

    <div style="margin-top: 20px">
        <table class="table table-striped table-dark">

            <thead  class="thead-dark">
            <tr>
                <th><h3>Renginys</h3></th>
                <th><h3>Data</h3></th>
                <th><h3>Kaina</h3></th>
                <th><h3>Vieta</h3></th>
                <th><h3>Įvertinimas</h3></th>
            </tr>
            </thead>
            @csrf
                <tr >
                    <td>{{ $istorija -> RenginioPavadinimas }}</td>
                    <td>{{ $istorija -> RenginioData }}</td>
                    <td>{{ $istorija -> Kaina }}</td>
                    <td>{{ $istorija -> RenginioVieta }}</td>
                    <td>{{ $istorija -> RenginioIvertinimas }}</td>
                    <form method="post" action="{{url('atsiliepimai')}}">
                        @csrf
                        <td><input type="hidden" class="editInput" stype="string" name="id" value="{{ $istorija -> fk_Renginysid_Renginys }}"  readonly></td>
                        <td><input type="submit" name="addPreke" value="Atsiliepimai"></td>
                    </form>
                </tr>
        </table>
    </div>

@endsection
