@extends('home')

@section('content')
 <h2> Renginių redagavimo forma </h2>
 <form action=" {{ url('renginionaujinimas/'.$renginys->id_Renginys) }}" method="post">
    @csrf
    <table class="centered">
        <tr>
            <td><h3>Data</h3></td>
            <td><input type="date" name="Data" value="{{$renginys->Data}}"></td>
        </tr>
        <tr>
            <td><h3>Aprašymas</h3></td>
            <td><input type="text" name="Aprasymas" value="{{$renginys->Aprasymas}}"></td>
        </tr>
        <tr>
            <td><h3>Miestas</h3></td>
            <td><input type="text" name="Miestas" value="{{$renginys->Miestas}}"></td>
        </tr>
        <tr>
            <td><h3>Adresas</h3></td>
            <td><input type="text" name="Adresas" value="{{$renginys->Adresas}}"></td>
        </tr>
        <tr>
            <td><h3>Pavadinimas</h3></td>
            <td><input type="text" name="Pavadinimas" value="{{$renginys->Pavadinimas}}"></td>
        </tr>
        <tr>
            <td><h3>Laisvų Vietų Skaičius</h3></td>
            <td><input type="text" name="LaisvuVietuSkaicius" value="{{$renginys->LaisvuVietuSkaicius}}"></td>
        </tr>
        <tr>
            <td><h3>Pradžios Laikas</h3></td>
            <td><input type="time" name="PradziosLaikas" value="{{$renginys->PradziosLaikas}}"></td>
        </tr>
        <tr>
            <td><h3>Pabaigos Laikas</h3></td>
            <td><input type="time" name="PabaigosLaikas" value="{{$renginys->PabaigosLaikas}}"></td>
        </tr>
        <tr>
            <td><h3>Nuolaidos Kodai</h3></td>
            <td><input type="text" name="NuolaidosKodai" value="{{$renginys->NuolaidosKodai}}"></td>
        </tr>
        <tr>
            <th colspan="2" align="center"><button type="submit" name="button">Bilietų redagavimas</button></th>
        </tr>
    </table>
</form>
@endsection
