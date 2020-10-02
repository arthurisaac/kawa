@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Entrée caisse</h2></div>
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

        <form class="form-horizontal" method="post" action="{{ route('comptabilite-entree-caisse.store') }}">
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="form-group row">
                        <label class="col-sm-5">Date</label>
                        <input type="date" class="form-control col-sm-7" name="date" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Somme</label>
                        <input type="number" class="form-control col-sm-7" name="somme" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Motif</label>
                        <textarea class="form-control col-sm-7" name="motif" required ></textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Déposant</label>
                        <input class="form-control col-sm-7" name="deposant" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Service</label>
                        <input class="form-control col-sm-7" name="service" required />
                    </div>

                </div>
                <div class="col-2">
                    <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                    <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
                </div>
            </div>
        </form>

    </div>
@endsection
