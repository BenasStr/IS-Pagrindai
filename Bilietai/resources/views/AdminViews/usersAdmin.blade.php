@extends('AdminViews/index')
@section('adminContent')
    <h2>Pirkėjai</h2>
    <table class="table">
        <tr class="table-warning">
            <td>Vardas</td>
            <td>Pavarde</td>
            <td>El. Paštas</td>
            <td>Sukurimo data</td>
            <td>Taskai</td>
            <td>Naujienlaiskio prenumerata</td>
            <td>Amzius</td>
            <td>Telefono numeris</td>
        </tr>
        @foreach($pirkejai as $data)
            <tr>
                <td>{{$data->Vardas}}</td>
                <td>{{$data->Pavarde}}</td>
                <td>{{$data->ElPastas}}</td>
                <td>{{$data->SukurimoData}}</td>
                @if ($data->pirkejas != null)
                    <td>{{$data->pirkejas["Taskai"]}}</td>
                    <td>{{$data->pirkejas["NaujienlaiskioPrenumerata"]}}</td>
                    <td>{{$data->pirkejas["Amzius"]}}</td>
                    <td>{{$data->pirkejas["TelefonoNumeris"]}}</td>
                @else
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                @endif
            </tr>
        @endforeach
    </table>
    <h2>Pardavėjai</h2>
        <table class="table">
            <tr class="table-warning">
                <td>Vardas</td>
                <td>Pavarde</td>
                <td>El. Paštas</td>
                <td>Sukurimo data</td>
                <td>Imones pavadinimas</td>
                <td>Imones kodas</td>
                <td>Adresas</td>
                <td>Ar patvirtintas</td>
                <td>Ivertinimas</td>
                <td>Rengniu skaicius</td>
                <td>Telefono numeris</td>
        @foreach($pardavejai as $data)
            <tr>
                <td>{{$data->Vardas}}</td>
                <td>{{$data->Pavarde}}</td>
                <td>{{$data->ElPastas}}</td>
                <td>{{$data->SukurimoData}}</td>
                @if ($data->pardavejas != null)
                    <td>{{$data->pardavejas["ImonesPavadinimas"]}}</td>
                    <td>{{$data->pardavejas["ImonesKodas"]}}</td>
                    <td>{{$data->pardavejas["Adresas"]}}</td>
                    <td>{{$data->pardavejas["ArPatvirtintas"]}}</td>
                    <td>{{$data->pardavejas["Ivertinimas"]}}</td>
                    <td>{{$data->pardavejas["RenginiuSkaicius"]}}</td>
                    <td>{{$data->pardavejas["TelefonoNumeris"]}}</td>
                @else
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                @endif
            </tr>
        @endforeach
    </table>
@endsection
