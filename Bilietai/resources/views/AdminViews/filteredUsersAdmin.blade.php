@extends('AdminViews/index')
@section('adminContent')
    @if ($countPirkejai == 0)
        <h2 style="color:red;">Pirkėjų nerasta</h2>
    @else
    <h1>Pirkėjai</h1>
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
        @for($i = 0; $i < $countPirkejai; $i++)
            <tr>
                <td>{{$usersPirkejai[$i]->Vardas}}</td>
                <td>{{$usersPirkejai[$i]->Pavarde}}</td>
                <td>{{$usersPirkejai[$i]->ElPastas}}</td>
                <td>{{$usersPirkejai[$i]->SukurimoData}}</td>
                <td>{{$usersPirkejai[$i]->pirkejas["Taskai"]}}</td>
                <td>@if($usersPirkejai[$i]->pirkejas["NaujienlaiskioPrenumerata"] == 1)Taip @else Ne @endif</td>
                <td>{{$usersPirkejai[$i]->pirkejas["Amzius"]}}</td>
                <td>{{$usersPirkejai[$i]->pirkejas["TelefonoNumeris"]}}</td>
            </tr>
        @endfor
    </table>
    @endif
    @if ($countPardavejai == 0)
        <h2 style="color:red;">Pardavėjų nerasta</h2>
    @else
    <h1>Pardavėjai</h1>
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
        </tr>
        @for($i = 0; $i < $countPardavejai; $i++)
            <tr>
                <td>{{$usersPardavejai[$i]->Vardas}}</td>
                <td>{{$usersPardavejai[$i]->Pavarde}}</td>
                <td>{{$usersPardavejai[$i]->ElPastas}}</td>
                <td>{{$usersPardavejai[$i]->SukurimoData}}</td>
                <td>{{$usersPardavejai[$i]->pardavejas["ImonesPavadinimas"]}}</td>
                <td>{{$usersPardavejai[$i]->pardavejas["ImonesKodas"]}}</td>
                <td>{{$usersPardavejai[$i]->pardavejas["Adresas"]}}</td>
                <td>{{$usersPardavejai[$i]->pardavejas["ArPatvirtintas"]}}</td>
                <td>{{$usersPardavejai[$i]->pardavejas["Ivertinimas"]}}</td>
                <td>{{$usersPardavejai[$i]->pardavejas["RenginiuSkaicius"]}}</td>
                <td>{{$usersPardavejai[$i]->pardavejas["TelefonoNumeris"]}}</td>
            </tr>
        @endfor
    </table>
    @endif
@endsection
