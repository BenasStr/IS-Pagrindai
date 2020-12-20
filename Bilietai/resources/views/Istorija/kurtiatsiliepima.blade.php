@extends('home')

@section('content')

    <div style="margin-top: 20px">
        <table class="table table-striped table-dark">

            <thead  class="thead-dark">
            <tr>
                <th><h3>Ivertinimas</h3></th>
                <th><h3>Aprašymas</h3></th>
            </tr>
            </thead>
            <tr>
                <form method="post" action="{{url('naujasAtsiliepimas')}}">
                    @csrf
                    <td><input type="text" name="ivertinimas" value=""></td>
                    <td><input type="text" name="aprasymas" value=""></td>
                    <td><input type="hidden" name="pirkejas" value={{$pirkejoID}}></td>
                    <td><input type="hidden" name="renginys" value={{$renginioID}}></td>

                    <th colspan="2" align="center"><button type="submit" name="button">Patvirtinti</button></th>
                </form>
            </tr>
        </table>
    </div>

@endsection
