@extends('home')

@section('content')
 <h2> Bilietų kūrimo forma </h2>
 <form action="{{ url('bilietuatnaujinimas/'.$id) }}" method="post">
    @csrf
    <table class="centered">
        <tr>
            <td><h3>BilietoNr</h3></td>
            <td><input type="text" name="BilietoNr" value="{{$bilietas->BilietoNr}}"></td>
        </tr>
        <tr>
            <td><h3>Kaina</h3></td>
            <td><input type="text" name="Kaina" value="{{$bilietas->Kaina}}"></td>
        </tr>
        <tr>
            <td><h3>Vieta</h3></td>
            <td><input type="text" name="Vieta" value="{{$bilietas->Vieta}}"></td>
        </tr>
        <tr>
            <td><h3>Aprasymas</h3></td>
            <td><input type="text" name="Aprasymas" value="{{$bilietas->Aprasymas}}"></td>
        </tr>
        <tr>
            <td><h3>Data</h3></td>
            <td><input type="date" name="Data" value="{{$bilietas->Data}}"></td>
        </tr>
       
    </table>
    <button type="submit">Kurti</button>
</form>
@endsection
