@extends('/AdminViews/index')
@section('adminContent')
    <form method="post" action="{{url('confirmEditPardavejas')}}">
        @csrf
        <input type="hidden" value="{{$user->id_Vartotojas}}" name="id">
        <div class="form-group">
            <label for="password">Slaptažodis:</label>
            <input type="text" class="form-control" value="{{$user->Slaptazodis}}" name="password">
        </div>
        <div class="form-group">
            <label for="createDate">Sukūrimo data:</label>
            <input type="date" class="form-control" value="{{$user->SukurimoData}}" name="createDate">
        </div>

        <!--Idet pardavejo fkid-->

        <div class="form-group">
            <label for="code">Imones kodas:</label>
            <input type="text" class="form-control" value="{{$user->pardavejas["ImonesKodas"]}}" name="code">
        </div>
        <div class="form-group">
            <label for="rating">Įvertinimas:</label>
            <input type="number" step="0.01" min="0" max="5" class="form-control" value="{{$user->pardavejas["Ivertinimas"]}}" name="rating">
        </div>
        <div class="form-group">
            <label for="eventNum">Renginių skaičius:</label>
            <input type="number" step="1" min="0" class="form-control" value="{{$user->pardavejas["RenginiuSkaicius"]}}" name="eventNum">
        </div>
        <div class="form-group">
            <button type="submit" name="submitEditPardavejas">Submit</button>
        </div>
    </form>
@endsection
