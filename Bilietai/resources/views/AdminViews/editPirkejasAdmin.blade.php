@extends('/AdminViews/index')
@section('adminContent')
    <form method="post" action="{{url('confirmEditPirkejas')}}">
        @csrf
        <input type="hidden" value="{{$user->id_Vartotojas}}" name="id">
        <div class="form-group">
            <label for="points">Taskai:</label>
            <input type="number" min="0" class="form-control" value="@if($user->pirkejas != null){{$user->pirkejas["Taskai"]}}@else ''@endif" name="points" @if ($user->pirkejas == null) readonly @endif>
        </div>
        <div class="form-group">
            <label for="createDate">Sukūrimo data:</label>
            <input type="date" class="form-control" value="{{$user->SukurimoData}}" name="createDate">
        </div>
        <div class="form-group">
            <label for="password">Slaptažodis:</label>
            <input type="text" class="form-control" value="{{$user->Slaptazodis}}" name="password">
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit" name="submitEditPirkejas">Submit</button>
        </div>
    </form>
    <form method="get" action="{{url('/admin/deleteUserPirkejas')}}">
        <button class="btn btn-danger" type="submit" value="{{$user->id_Vartotojas}}" name="deleteUserPirkejas">Delete</button>
    </form>
@endsection
