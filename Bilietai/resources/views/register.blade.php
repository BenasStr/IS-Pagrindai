@extends('home')

@section('content')

    <form method="post" action="{{url('naujasVartotojas')}}">
        @csrf
        <table class="centered">
            <tr>
                <td><h3>E.paštas</h3></td>
                <td><input type="text" name="pastoAdresas" value=""></td>
                <td><h4>{{ $errors->first('pastoAdresas') }}</h4></td>
            </tr>

            <tr>
                <td><h3>Slaptažodis</h3></td>
                <td><input type="text" name="slaptazodis" value=""></td>
                <td><h4>{{ $errors->first('slaptazodis') }}</h4></td>
            </tr>
            <tr>
                <th colspan="2" align="center"><button type="submit" name="button">Registruotis</button></th>
            </tr>
        </table>
    </form>

@endsection
