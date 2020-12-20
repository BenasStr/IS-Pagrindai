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
                    <td>@if($data->pirkejas["NaujienlaiskioPrenumerata"] == 0)Ne @else Taip @endif</td>
                    <td>{{$data->pirkejas["Amzius"]}}</td>
                    <td>{{$data->pirkejas["TelefonoNumeris"]}}</td>
                @else
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                @endif
                <td>
                    <form method="get" action="{{url('/admin/editUserPirkejas')}}">
                        <button class="btn btn-success" type="submit" value="{{$data->id_Vartotojas}}" name="editUserPirkejas">Edit</button>
                    </form>
                    </td>
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
                    <td>@if($data->pardavejas["ArPatvirtintas"] == 0)Ne @else Taip @endif</td>
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
                <td>
                    <form method="get" action="{{url('/admin/editUserPardavejas')}}">
                        <button class="btn btn-success" type="submit" value="{{$data->id_Vartotojas}}" name="editUserPardavejas">Edit</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
