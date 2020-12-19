@extends('home')

@section('content')

    <h1>Registracija</h1>
    <form method="post" action="{{url('naujasVartotojas')}}">
        @csrf
        <table class="centered">
            <tr>
                <td><h3>E.paštas:</h3></td>
                <td><input type="text" name="pastas" value=""></td>
                <td><p class="text-danger">{{ $errors->first('pastas') }}</p></td>
            </tr>

            <tr>
                <td><h3>Slaptažodis:</h3></td>
                <td><input type="text" name="slaptazodis" value=""></td>
                <td><p class="text-danger">{{ $errors->first('slaptazodis') }}</p></td>
            </tr>
            <tr>
                <td><h3>Vartotojo tipas:</h3></td>
                <th>
                    <select  name="tipas" >
                        <option value="3">Klientas</option>
                        <option value="2">Pardavėjas</option>
                    </select>
                </th>
            </tr>
            <tr>
                <th colspan="2" align="center"><button type="submit" name="button">Registruotis</button></th>
            </tr>
        </table>
    </form>

@endsection
