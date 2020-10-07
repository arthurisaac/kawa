@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Opération maintenance</h2></div>
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

        <form class="form-horizontal" method="post" action="{{ route('informatique-fournisseur.update', $fournisseur->id) }}">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-5">Libelle fournisseur</label>
                        <input class="form-control col-md-7" type="text" name="libelleFournisseur" value="{{$fournisseur->libelleFournisseur}}" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Spécialité</label>
                        <input class="form-control col-md-7" type="text" name="specialite" value="{{$fournisseur->specialite}}" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Localisation</label>
                        <input class="form-control col-md-7" type="text" name="localisation" value="{{$fournisseur->localisation}}" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Nationalité</label>
                        <input class="form-control col-md-7" type="text" name="nationalite" value="{{$fournisseur->nationalite}}" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Email</label>
                        <input class="form-control col-md-7" type="email" name="email" value="{{$fournisseur->email}}" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Contact</label>
                        <input class="form-control col-md-7" type="tel" name="contact" value="{{$fournisseur->contact}}" required/>
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
