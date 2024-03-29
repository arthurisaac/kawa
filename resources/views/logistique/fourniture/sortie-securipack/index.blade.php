@extends('bases.logistique')

@section('main')
    @extends('bases.toolbar', ["title" => "Logistique", "subTitle" => "Sortie sécuripack"])
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
                <form class="form-horizontal" method="post" action="{{ route('logistique-sortie-securipack.store') }}">
                    <div class="card card-xxl-stretch">
                        <div class="card-header border-0 py-5 bg-warning">
                            <h3 class="card-title fw-bolder">Entrée sécuripack</h3>
                        </div>
                        <div class="card-body bg-card-kawa 5">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="debutSerie" class="col-sm-5">Debut série</label>
                                        <input type="text" class="form-control col" id="debutSerie" name="debutSerie" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="finSerie" class="col-sm-5">Fin série</label>
                                        <input type="text" class="form-control col" name="finSerie" id="finSerie" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-5">Date</label>
                                        <input type="date" class="form-control col" name="date" id="date" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="centre" class="col-sm-5">Service</label>
                                        <input type="text" class="form-control col" name="centre" id="centre" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="prixUnitaire" class="col-sm-5">Prix unitaire</label>
                                        <input type="number" class="form-control col" name="prixUnitaire" id="prixUnitaire" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="reference" class="col-sm-5">Référence</label>
                                        <input type="text" class="form-control col" name="reference" id="reference" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="reset" class="btn btn-danger btn-sm">Annuler</button>
                        <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                        <br>
                    </div>
              </div>
            @csrf
            </form>
        </div>

{{--    <form method="post" action="{{ route('logistique-sortie-securipack.store') }}">--}}
{{--        @csrf--}}

{{--        <div class="row">--}}
{{--            <div class="col">--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-5">Debut série</label>--}}
{{--                    <input type="text" class="form-control col-sm-7" name="debutSerie" required />--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-5">Fin série</label>--}}
{{--                    <input type="text" class="form-control col-sm-7" name="finSerie" required />--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-5">Date</label>--}}
{{--                    <input type="date" class="form-control col-sm-7" name="date" required />--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-5">Service</label>--}}
{{--                    <input type="text" name="centre" class="form-control col-sm-7" required />--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-5">Prix</label>--}}
{{--                    <input type="number" class="form-control col-sm-7" name="prixUnitaire" required />--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-5">Référence</label>--}}
{{--                    <input type="number" class="form-control col-sm-7" name="reference" required />--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-2">--}}
{{--                <button class="btn btn-primary btn-sm" type="submit">Valider</button>--}}
{{--                <button class="btn btn-danger btn-sm" type="reset">Annuler</button>--}}
{{--            </div>--}}
{{--            <div class="col"></div>--}}
{{--        </div>--}}
{{--    </form>--}}
</div>
@endsection
