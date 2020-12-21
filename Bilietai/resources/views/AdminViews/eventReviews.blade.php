@extends('/AdminViews/index')
@section('adminContent')
    @if ($reviews->atsiliepimas != null)
        <table class="table">
            <tr>
                <td>Įvertinimas</td>
                <td>Aprašymas</td>
                <td>Sukurimo data</td>
            </tr>
            @for($i = 0; $i < $count; $i++)
                <tr>
                    <td>{{$reviews->atsiliepimas[$i]["Ivertinimas"]}}</td>
                    <td>{{$reviews->atsiliepimas[$i]["Aprasymas"]}}</td>
                    <td>{{$reviews->atsiliepimas[$i]["SukurimoData"]}}</td>
                    <td>
                        <form method="get" action="{{url('admin/deleteReview')}}">
                            <button class="btn btn-danger" type="submit" name="deleteReview" value="{{$reviews->atsiliepimas[$i]["id_Atsiliepimas"]}}">Trinti</button>
                        </form>
                    </td>
                </tr>
            @endfor
        </table>
    @else
        <h1 style="color:red">Atsiliepimų nėra</h1>
    @endif
@endsection
