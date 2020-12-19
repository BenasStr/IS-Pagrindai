@extends('home')

@section('content')

    <form action="{{ url('Jungiamasi') }}" method="post">
        @csrf
        <table class="centered">
            <tr>
                <td><h3>E.paštas</h3></td>
                <td><input type="text" name="pastoAdresas" value=""></td>
            </tr>

            <tr>
                <td><h3>Slaptažodis</h3></td>
                <td><input type="text" name="slaptazodis" value=""></td>
            </tr>
            <tr>
                <th colspan="2" align="center"><button type="submit" name="button">Prisijungti</button></th>
            </tr>
        </table>
    </form>
@endsection
