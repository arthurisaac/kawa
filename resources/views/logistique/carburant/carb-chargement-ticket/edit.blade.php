@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Chargement carte carburant</h2></div>
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

        <form method="post" action="{{ route('carb-chargement-ticket.update', $chargement->id) }}">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-5">
                    <div class="form-group row">
                        <label class="col-sm-5">Numéro carte</label>
                        <select class="form-control col-sm-7" name="carte" required>
                            <option>{{$chargement->carte}}</option>
                            @foreach($cartes as $carte)
                                <option value="{{$carte->id}}">{{$carte->numeroCarte}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Date</label>
                        <input type="date" class="form-control col-sm-7" name="date" value="{{$chargement->date}}" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Somme</label>
                        <input type="number" class="form-control col-sm-7" name="somme" value="{{$chargement->somme}}" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Service</label>
                        <input type="text" class="form-control col-sm-7" name="service" value="{{$chargement->service}}" required/>
                    </div>

                </div>
                <div class="col-2">
                    <button class="btn btn-primary btn-block btn-sm" type="submit">Valider</button>
                    <button class="btn btn-danger btn-block btn-sm" type="reset">Annuler</button>
                </div>
            </div>

        </form>


    </div>
@endsection
