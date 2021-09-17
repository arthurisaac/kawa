@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Régulation départ tournée</h2></div>
        <br/>
        <br/>

        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label for="date" class="col-sm-4">Date départ</label>
                    <input type="text" name="date" id="date" value="{{$date}}" class="form-control col-sm-8"/>
                </div>
            </div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
    </div>
@endsection
