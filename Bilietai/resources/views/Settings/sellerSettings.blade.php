@extends('home')

@section('content')

    <div style="margin-top: 20px">
        <form method="post" action="{{url('keistiDuomenis2')}}">
            @csrf
            <table class="table table-striped table-dark">
                <thead  class="thead-dark">
                <tr>
                    <th><h3>Vardas</h3></th>
                    <th><h3>Pavardė</h3></th>
                    <th><h3>El. Paštas</h3></th>
                    <th><h3>Sukūrimo Data</h3></th>
                    <th><h3>Slaptažodis</h3></th>
                </tr>
                </thead >

                <tr class="bg-warning">
                    <td><input class="editInput" stype="string" name="vardas" value="{{ $data -> Vardas }}"></td>
                    <td><input class="editInput" stype="string" name="pavarde" value="{{ $data -> Pavarde }}"></td>
                    <td><input class="editInput" stype="string" name="pastoddresas" value="{{ $data -> ElPastas }}"></td>
                    <td><input class="editInput" stype="string" name="sukurimodata" value="{{ $data -> SukurimoData }}" readonly></td>
                    <td><input class="editInput" stype="string" name="slaptazodis" value="{{ $data -> Slaptazodis }}"></td>
                </tr>
                <thead  class="thead-dark">
            </table>
            <td> <input type="submit" name="addPreke" value="Keisti"></td>
        </form>
    </div>

@endsection
