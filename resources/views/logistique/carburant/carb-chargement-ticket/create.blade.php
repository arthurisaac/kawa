@extends('bases.carburant')

@section('main')
    @extends('bases.toolbar', ["title" => "Carburant", "subTitle" => "Chargement carte carburant"])
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
        <div class="row gy-5 g-xxl-8">
            <div class="col-xxl-9">
                <form method="post" action="{{ route('carb-chargement-ticket.store') }}">
                    <div class="card card-xl-stretch">
                        <div class="card-header border-0 py-5 bg-warning">
                            <h3 class="card-title fw-bolder">Nouveau Chargement Carte</h3>
                        </div>
                        <div class="card-body bg-card-kawa 5">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="carte" class="col-5">Numéro carte</label>
                                        <select class="form-control col" id="carte" name="carte" required>
                                            <option></option>
                                            @foreach($cartes as $carte)
                                                <option value="{{$carte->id}}">{{$carte->numeroCarte}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="date" class="col-5">Date</label>
                                        <input id="date" type="date" class="form-control col" name="date" required/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="somme" class="col-5">Somme</label>
                                        <input id="somme" type="number" class="form-control col" name="somme" required/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="service" class="col-5">Service</label>
                                        <input id="service" type="text" class="form-control col" name="service" required/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col text-right"></div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="reset" class="btn btn-info btn-sm">Annuler</button>
                            <button class="btn btn-primary btn-sm" type="submit">OK</button>
                        </div>
                    </div>
                    @csrf

                </form>
            </div>
        </div>
    </div>
@endsection
