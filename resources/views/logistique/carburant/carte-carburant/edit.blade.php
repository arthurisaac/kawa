@extends('bases.carburant')

@section('main')
    @extends('bases.toolbar', ["title" => "Carburant", "subTitle" => "Ticket carburant"])
<div class="burval-container">
    <br/>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <br/>
    @endif

    <form method="post" action="{{ route('carte-carburant.update', $carte->id) }}">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-5">Numéro carte</label>
                    <input type="number" class="form-control col-sm-7" name="numeroCarte" value="{{$carte->numeroCarte}}"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Societe</label>
                    <input type="text" class="form-control col-sm-7" name="societe" value="{{$carte->societe}}"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Num véhicule</label>
                    <select class="form-control form-control-sm col-md-7" name="idVehicule">
                        <option>{{$carte->idVehicule}}</option>
                        @foreach($vehicules as $vehicule)
                        <option value="{{$vehicule->id}}">{{$vehicule->immatriculation}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Date acquisition</label>
                    <input type="date" class="form-control col-sm-7" name="dateAquisition"  value="{{$carte->dateAquisition}}"/>
                </div>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary btn-sm btn-block">OK</button>
                <button type="reset" class="btn btn-danger btn-sm btn-block">Annuler</button>
            </div>
            <div class="col"></div>
        </div>
    </form>
</div>
@endsection
