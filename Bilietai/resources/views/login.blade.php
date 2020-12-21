@extends('home')

@section('content')

    <h1>Prisijungimas</h1>
    <form action="{{ url('loginconfirm') }}" method="post">
        @csrf
        <table class="centered">
            <tr>
                <td><h3>E.paštas</h3></td>
                <td><input type="text" name="pastoAdresas" value=""></td>
            </tr>
            <tr>
                <td><h3>Slaptažodis</h3></td>
                <td><input type="password" name="slaptazodis" value=""></td>
            </tr>
            <tr>
                <th colspan="2" align="center"><button type="submit" name="button">Prisijungti</button></th>
            </tr>
        </table>
    </form>
    <a href="{{ url('/register') }}" style="color: black; text-decoration: none">Registruotis</a>
@endsection
