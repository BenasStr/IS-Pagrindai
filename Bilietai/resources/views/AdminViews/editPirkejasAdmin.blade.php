@extends('/AdminViews/index')
@section('adminContent')
    <form method="post" action="{{url('confirmEditPirkejas')}}">
        <input type="hidden" value="{{$user->id_Vartotojas}}" name="id">
        <div class="form-group">
            <label for="points">Taskai:</label>
            <input type="number" min="0" class="form-control" value="{{$user->pirkejas["Taskai"]}}" name="points">
        </div>
        <div class="form-group">
            <label for="createDate">Sukūrimo data:</label>
            <input type="date" class="form-control" value="{{$user->SukurimoData}}" name="createDate">
        </div>
        <div class="form-group">
            <label for="password">Slaptažodis:</label>
            <input type="text" class="form-control" value="{{$user->Slaptazodis}}" name="password">
        </div>

    </form>
@endsection
