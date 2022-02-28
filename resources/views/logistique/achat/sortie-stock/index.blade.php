@extends('bases.logistique')

@section('main')
    @extends('bases.toolbar', ["title" => "Logistique", "subTitle" => "Sortie stock"])
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
                    <form class="form-horizontal" method="post" action="{{ route('logistique-sortie-stock.store') }}">
                        <div class="card card-xxl-stretch">
                            <div class="card-header border-0 py-5 bg-warning">
                                <h3 class="card-title fw-bolder">Sortie stock</h3>
                            </div>
                            <div class="card-body bg-card-kawa 5">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="produit" class="col-sm-5">Ref produit</label>
                                            <select class="form-control col" name="produit" id="produit" required>
                                                <option value=""></option>
                                                @foreach($produits as $produit)
                                                    <option value="{{$produit->id}}">{{$produit->reference}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="libelle" class="col-sm-5">Quantité</label>
                                            <input type="number" class="form-control col" name="libelle" id="libelle" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="dateSortie" class="col-sm-5">Date de sortie</label>
                                            <input type="date" class="form-control col" id="dateSortie" name="dateSortie" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="motif" class="col-sm-5">Motif</label>
                                            <input type="text" class="form-control col" name="motif" id="motif" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="dateSaisie" class="col-sm-5">Saisie le</label>
                                            <input type="date" class="form-control col" name="dateSaisie" id="dateSaisie" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="observation" class="col-sm-5">Observation</label>
                                            <textarea class="form-control col" name="observation" id="observation" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="service" class="col-sm-5">Service/Centre</label>
                                            <input type="text" class="form-control col" name="service" id="service" required>
                                        </div>
                                    </div>
                                    <div class="col"></div>
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

{{--        <form class="form-horizontal" method="post" action="{{ route('logistique-sortie-stock.store') }}">--}}
{{--            @csrf--}}


{{--            <div class="row">--}}
{{--                <div class="col-6">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Ref produit</label>--}}
{{--                        <select class="form-control col-sm-7" name="produit" required>--}}
{{--                            <option></option>--}}
{{--                            @foreach($produits as $produit)--}}
{{--                                <option value="{{$produit->id}}">{{$produit->reference}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Quantité</label>--}}
{{--                        <input type="number" name="quantite" class="form-control col-sm-7" required />--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Date de sortie</label>--}}
{{--                        <input type="date" name="dateSortie" class="form-control col-sm-7" required />--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Motif</label>--}}
{{--                        <input type="text" name="motif" class="form-control col-sm-7" />--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Saisi le</label>--}}
{{--                        <input type="date" name="dateSaisie" class="form-control col-sm-7" required />--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Observation</label>--}}
{{--                        <textarea name="observation" class="form-control col-sm-7"></textarea>--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Service/centre</label>--}}
{{--                        <input type="text" name="service" class="form-control col-sm-7" />--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-2">--}}
{{--                    <button class="btn btn-primary btn-sm" type="submit">Valider</button>--}}
{{--                    <button class="btn btn-danger btn-sm" type="reset">Annuler</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}

    </div>
@endsection
