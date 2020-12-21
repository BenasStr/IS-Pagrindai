@extends('home')

@section('content')
 <h2> Renginių kūrimo forma </h2>
 <form action="{{ url('rengkurimas') }}" method="post">
    @csrf
    <table class="centered">
        <tr>
            <td><h3>Data</h3></td>
            <td><input type="date" name="Data" value=""></td>
        </tr>
        <tr>
            <td><h3>Aprašymas</h3></td>
            <td><input type="text" name="Aprasymas" value=""></td>
        </tr>
        <tr>
            <td><h3>Miestas</h3></td>
            <td><input type="text" name="Miestas" value=""></td>
        </tr>
        <tr>
            <td><h3>Adresas</h3></td>
            <td><input type="text" name="Adresas" value=""></td>
        </tr>
        <tr>
            <td><h3>Pavadinimas</h3></td>
            <td><input type="text" name="Pavadinimas" value=""></td>
        </tr>
        <tr>
            <td><h3>Laisvų Vietų Skaičius</h3></td>
            <td><input type="text" name="LaisvuVietuSkaicius" value=""></td>
        </tr>
        <tr>
            <td><h3>Pradžios Laikas</h3></td>
            <td><input type="time" name="PradziosLaikas" value=""></td>
        </tr>
        <tr>
            <td><h3>Pabaigos Laikas</h3></td>
            <td><input type="time" name="PabaigosLaikas" value=""></td>
        </tr>
        <tr>
            <td><h3>Nuolaidos Kodai</h3></td>
            <td><input type="text" name="NuolaidosKodai" value=""></td>
        </tr>
        <tr>
            <th colspan="2" align="center"><button type="submit" name="button">Kurti Renginį</button></th>
        </tr>
    </table>
</form>
@endsection
