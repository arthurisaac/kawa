@extends('bases.informatique')

@section('main')
    @extends('bases.toolbar', ["title" => "Informatique", "subTitle" => "Fournisseur"])
    <div class="burval-container">
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

        <form class="form-horizontal" method="post" action="{{ route('informatique-fournisseur.store') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-5">Libelle fournisseur</label>
                        <input class="form-control col-md-7" type="text" name="libelleFournisseur" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Spécialité</label>
                        <input class="form-control col-md-7" type="text" name="specialite" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Localisation</label>
                        <input class="form-control col-md-7" type="text" name="localisation" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Nationalité</label>
                        <input class="form-control col-md-7" type="text" name="nationalite" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Email</label>
                        <input class="form-control col-md-7" type="email" name="email" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Contact</label>
                        <input class="form-control col-md-7" type="tel" name="contact" required/>
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
