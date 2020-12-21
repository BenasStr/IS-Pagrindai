@extends('home')

@section('content')
<h2> Nuolaidų kūrimo forma </h2>
 <form action="{{ url('kurtinuolaida/'.$id) }}" method="post">
    @csrf
    <table class="centered">
        <tr>
            <td><h3>Nuolaidos kodas</h3></td>
            <td><input type="text" name="NuolaidosKodai" value=""></td>
        </tr>
    </table>
    <button type="submit">Kurti</button>    
</form>

   
@endsection
