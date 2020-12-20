@extends('home')

@section('content')

    <div style="margin-top: 20px">
        <table class="table table-striped table-dark">

            <thead  class="thead-dark">
            <tr>
                <th><h3>Ivertinimas</h3></th>
                <th><h3>Aprašymas</h3></th>
                <th><h3>Sukūrimo Data</h3></th>
            </tr>
            </thead>
            <tr>
                <td>{{ $atsiliepimas -> Ivertinimas }}</td>
                <td>{{ $atsiliepimas -> Aprasymas }}</td>
                <td>{{ $atsiliepimas -> SukurimoData }}</td>
            </tr>
        </table>
    </div>

@endsection
