@extends('bases.transport')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Huile de pont</h2></div>
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

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br/>
        @endif

        <br>
        <br>
        <div class="container">
            <div>
                <form method="post" action="{{ route('vidange-pont.update', $vidange->id) }}">
                    @csrf
                    @method("PATCH")

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-md-4">Date</label>
                                <input type="date" class="form-control col-md-8" value="{{$vidange->date}}" required/>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Véhicule</label>
                                <input type="text" class="form-control form-control-sm col-md-8" value="{{$vidange->vehicules->immatriculation ??  ""}}" name="vehicule" id="vehicule" readonly />
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Centre</label>
                                <input type="text" class="form-control form-control-sm col-md-8" name="centre" value="{{$vidange->vehicules->centre ?? ""}}" id="centre" readonly/>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Centre régional</label>
                                <input type="text" class="form-control form-control-sm col-md-8" name="centreRegional" value="{{$vidange->vehicules->centreRegional ?? ''}}"
                                       id="centreRegional" readonly/>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group row">
                                <label class="col-md-4">Km actuel</label>
                                <input type="number" class="form-control form-control-sm col-md-8" name="kmActuel" value="{{$vidange->kmActuel}}"
                                       required/>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4">Prochain km</label>
                                <input type="number" class="form-control form-control-sm col-md-8" name="prochainKm" value="{{$vidange->prochainKm}}"
                                       required/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Valider</button>

                    <br>
                    <br>
                </form>
            </div>
            <br>
        </div>
    </div>
@endsection
