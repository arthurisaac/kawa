@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Virgilométrie</h2></div>
        <br/>
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
            </div>
        @endif

        <form class="form-horizontal" method="post" action="{{ route('virgilometrie.update', $virgil->id) }}">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group row">
                        <label class="col-sm-5">Date</label>
                        <input type="date" name="date" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Nom et prénoms</label>
                        <input type="text" class="form-control col-sm-7" />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Heure arrivée</label>
                        <input type="time" class="form-control col-sm-7" />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Type pièce</label>
                        <select class="form-control col-sm-7" >
                            <option>Passeport</option>
                            <option>Carte d'identité</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Personne visitée</label>
                        <input type="text" class="form-control col-sm-7" />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Motif</label>
                        <input type="text" class="form-control col-sm-7" />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Heure départ</label>
                        <input type="time" class="form-control col-sm-7" />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Observation</label>
                        <textarea class="form-control col-sm-7"></textarea>
                    </div>

                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Photo</label>
                        <input type="file" class="form-control-file col-sm-7" />
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                    <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
                </div>
            </div>
        </form>
    </div>

@endsection
