@extends('bases.securite')

@section('main')
    @extends('bases.toolbar', ["title" => "Sécurité", "subTitle" => "Saisie | Liste Saisie"])
<div class="burval-container">
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
        </div>
    @endif
    <div class="row gy-5 g-xxl-12">
            <div class="col-xxl-12">
                <form  method="post" action="{{ route('saisie.store') }}">
                    <div class="card card-xxl-stretch">
                        <div class="card-header border-0 py-5 bg-warning">
                            <h3 class="card-title fw-bolder">Option de filtre</h3>
                        </div>
                        <div class="card-body pt-5">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label class="col-sm-5">Date de tournée</label>
                                        <input type="date" class="form-control col" name="date" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label class="col-sm-5">Type de date</label>
                                        <input type="text" class="form-control col" name="typeDate" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label class="col-sm-5">Nom et prénoms</label>
                                        <select class="form-control col" name="idPersonnel" required>
                                            <option></option>
                                            @foreach($personnels as $personnel)
                                                <option value="{{$personnel->id}}">{{$personnel->nomPrenoms}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                            </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label class="col-sm-4">Heure arrivée</label>
                                            <input type="time" class="form-control col" name="heureArrivee" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label class="col-sm-4">Heure arrivée 1</label>
                                            <input type="time" class="form-control col" name="heureArrivee1">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label class="col-sm-4">Heure arrivée 2</label>
                                            <input type="time" class="form-control col" name="heureArrivee2">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label class="col-sm-4">Heure arrivée 3</label>
                                            <input type="time" class="form-control col" name="heureArrivee3">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label class="col-sm-4">Heure départ</label>
                                            <input type="time" class="form-control col" name="heureDepart" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label class="col-sm-4">Heure départ 1</label>
                                            <input type="time" class="form-control col" name="heureDepart1">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label class="col-sm-4">Heure départ 2</label>
                                            <input type="time" class="form-control col" name="heureDepart2">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label class="col-sm-4">Heure départ 3</label>
                                            <input type="time" class="form-control col"  name="heureDepart3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="reset" class="btn btn-danger btn-sm">Annuler</button>
                            <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                        </div>
            </div>
            @csrf
            </form>
        </div>

{{--    <form method="post" action="{{ route('saisie.store') }}">--}}
{{--        @csrf--}}
{{--        <div class="row">--}}
{{--            <div class="col">--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Date de tournée</label>--}}
{{--                    <input type="date" class="form-control col-sm-8" name="date" required>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Type de date</label>--}}
{{--                    <input type="text" class="form-control col-sm-8" name="typeDate" required>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Nom et prénoms</label>--}}
{{--                    <select class="form-control col-sm-8" name="idPersonnel" required>--}}
{{--                        <option></option>--}}
{{--                        @foreach($personnels as $personnel)--}}
{{--                        <option value="{{$personnel->id}}">{{$personnel->nomPrenoms}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-4"></div>--}}
{{--            <div class="col-2">--}}
{{--                <button class="btn btn-primary btn-sm btn-block" type="submit">Valider</button>--}}
{{--                <button class="btn btn-danger btn-sm btn-block" type="reset">Annuler</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col">--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Heure arrivée</label>--}}
{{--                    <input type="time" class="form-control col-sm-8" name="heureArrivee" required>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Heure arrivée 1</label>--}}
{{--                    <input type="time" class="form-control col-sm-8" name="heureArrivee1">--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Heure arrivée 2</label>--}}
{{--                    <input type="time" class="form-control col-sm-8" name="heureArrivee2">--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Heure arrivée 3</label>--}}
{{--                    <input type="time" class="form-control col-sm-8" name="heureArrivee3">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col">--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Heure départ</label>--}}
{{--                    <input type="time" class="form-control col-sm-8" name="heureDepart" required>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Heure départ 1</label>--}}
{{--                    <input type="time" class="form-control col-sm-8" name="heureDepart1">--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Heure départ 2</label>--}}
{{--                    <input type="time" class="form-control col-sm-8" name="heureDepart2">--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-4">Heure départ 3</label>--}}
{{--                    <input type="time" class="form-control col-sm-8"  name="heureDepart3">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}
</div>
@endsection
