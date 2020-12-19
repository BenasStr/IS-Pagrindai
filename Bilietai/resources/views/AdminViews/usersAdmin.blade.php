@extends('AdminViews/index')
@section('adminContent')
    <h2>Pirkėjai</h2>
    <table class="table">
        <tr class="table-warning">
            <td>Vardas</td>
            <td>Pavarde</td>
            <td>El. Paštas</td>
            <td>Slaptažodis</td>
            <td>Sukurimo data</td>
            <td>Tipas</td>
        </tr>
        @foreach($pirkejai as $data)
            <tr>
                <td>{{$data->Vardas}}</td>
                <td>{{$data->Pavarde}}</td>
                <td>{{$data->ElPastas}}</td>
                <td>{{$data->Slaptazodis}}</td>
                <td>{{$data->SukurimoData}}</td>
                <td>Pirkėjas</td>
            </tr>
        @endforeach
    </table>
    <h2>Pardavėjai</h2>
        <table class="table">
            <tr class="table-warning">
                <td>Vardas</td>
                <td>Pavarde</td>
                <td>El. Paštas</td>
                <td>Slaptažodis</td>
                <td>Sukurimo data</td>
                <td>
        @foreach($pardavejai as $data)
            <tr>
                <td>{{$data->Vardas}}</td>
                <td>{{$data->Pavarde}}</td>
                <td>{{$data->ElPastas}}</td>
                <td>{{$data->Slaptazodis}}</td>
                <td>{{$data->SukurimoData}}</td>
                <td>Pardavėjas</td>
            </tr>
        @endforeach
    </table>
@endsection
