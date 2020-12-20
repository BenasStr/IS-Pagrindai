@extends('home')

@section('content')

    <div style="margin-top: 20px">
        <form method="post" action="{{url('keistiDuomenis3')}}">
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
                <tr>
                    <th><h3>Taškai</h3></th>
                    <th><h3>Amžius</h3></th>
                    <th><h3>Telefono Numeris</h3></th>
                    <th><h3>Lytis</h3></th>
                    <th><h3>Naujienos</h3></th>
                </tr>
                </thead>
                <tr class="bg-warning">
                    <td><input class="editInput" stype="string" name="taskai" value="{{ $pirkejoData -> Taskai }}" readonly></td>
                    <td><input class="editInput" stype="string" name="amzius" value="{{ $pirkejoData -> Amzius }}"></td>
                    <td><input class="editInput" stype="string" name="telnr" value="{{ $pirkejoData -> TelefonoNumeris }}"></td>

                    @if($pirkejoData -> Lytis == 2)
                    <td><select name="lytis">
                            <option value="1">Vyras</option>
                            <option value="2" selected>Moteris</option>
                            <option value="3">Kita</option>
                        </select></td>
                    @elseif($pirkejoData -> Lytis == 3)
                        <td><select name="lytis">
                                <option value="1">Vyras</option>
                                <option value="2">Moteris</option>
                                <option value="3" selected>Kita</option>
                            </select></td>
                    @else
                        <td><select name="lytis">
                                <option value="1" selected>Vyras</option>
                                <option value="2">Moteris</option>
                                <option value="3">Kita</option>
                            </select></td>
                    @endif

                    @if($pirkejoData -> NaujienlaiskioPrenumerata == 1)
                        <td><input type="checkbox" stype="string" name="naujienlaiskis" value="{{ $pirkejoData -> NaujienlaiskioPrenumerata }}" checked></td>
                    @else
                        <td><input type="checkbox" stype="string" name="naujienlaiskis" value="{{ $pirkejoData -> NaujienlaiskioPrenumerata }}"></td>
                    @endif
                </tr>
            </table>
            <td> <input type="submit" name="addPreke" value="Keisti"></td>
        </form>
    </div>

@endsection
