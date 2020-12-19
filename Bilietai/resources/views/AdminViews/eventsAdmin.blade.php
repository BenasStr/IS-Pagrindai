@extends('AdminViews/index')
@section('adminContent')
    <table class="table">
        <tr class="table-warning">
            <td>Pavadinimas</td>
            <td>Data</td>
            <td>Mietsas, adresas</td>
            <td>Aprašymas</td>
            <td>Laisvų vietų sk.</td>
            <td>Pradzios ir pabaigos laikai</td>
            <td>Nuolaidos kodai</td>
            <td>Įvertinimas</td>
            <td>Prioritetas</td>
        </tr>
        @foreach($events as $data)
            <tr>
                <td>{{$data->Pavadinimas}}</td>
                <td>{{$data->Data}}</td>
                <td>{{$data->Miestas.", ".$data->Adresas}}</td>
                <td>{{$data->Aprasymas}}</td>
                <td>{{$data->LaisvuVietuSkaicius}}</td>
                <td>{{$data->PradziosLaikas." | ".$data->PabaigosLaikas}}</td>
                <td>{{$data->NuolaidosKodai}}</td>
                <td>{{$data->Ivertinimas}}</td>
                <td>{{$data->Prioritetas}}</td>
            </tr>
        @endforeach
    </table>

@endsection
