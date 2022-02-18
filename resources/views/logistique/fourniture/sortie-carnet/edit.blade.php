@extends('bases.logistique')

@section('main')
    @extends('bases.toolbar', ["title" => "Logistique", "subTitle" => "Sortie carnet caisse"])
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

    <form method="post" action="{{ route('logistique-sortie-carnet.update', $sortie->id) }}">
        @method('PATCH')
        @csrf

        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-5">Debut série</label>
                    <input type="text" class="form-control col-sm-7" name="debutSerie" value="{{$sortie->debutSerie}}" required />
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Fin série</label>
                    <input type="text" class="form-control col-sm-7" name="finSerie" value="{{$sortie->finSerie}}" required />
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Date</label>
                    <input type="date" class="form-control col-sm-7" name="date" value="{{$sortie->date}}" required />
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Service</label>
                    <input type="text" class="form-control col-sm-7" name="service" value="{{$sortie->service}}" required />
                </div>
                <div class="form-group row">
                    <label class="col-sm-5">Prix</label>
                    <input type="number" class="form-control col-sm-7" name="prixUnitaire" value="{{$sortie->prixUnitaire}}" required />
                </div>
            </div>
            <div class="col-2">
                <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
            </div>
            <div class="col"></div>
        </div>
    </form>
</div>
@endsection
