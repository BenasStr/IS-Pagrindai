@extends('AdminViews/index')
@section('adminContent')
<table class="table">
    <tr class="table-warning">
        <td>Imones pavadinimas</td>
        <td>Imones kodas</td>
        <td>Adresas</td>
        <td>Ar patvirtintas</td>
        <td>Ivertinimas</td>
        <td>Rengniu skaicius</td>
        <td>Telefono numeris</td>
    @foreach($pardavejai as $data)
        <tr>
            <td>{{$data->ImonesPavadinimas}}</td>
            <td>{{$data->ImonesKodas}}</td>
            <td>{{$data->Adresas}}</td>
            <td>{{$data->ArPatvirtintas}}</td>
            <td>{{$data->Ivertinimas}}</td>
            <td>{{$data->RenginiuSkaicius}}</td>
            <td>{{$data->TelefonoNumeris}}</td>
            <td>
                <form method="get" action="{{url('admin/confirmAccount')}}">
                    <button class="btn btn-success" type="submit" name="patvirtintiPaskyra" value="{{$data->id_Pardavejas}}">Patvirtinti</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection
