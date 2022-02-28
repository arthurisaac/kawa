@extends('bases.logistique')

@section('main')
    @extends('bases.toolbar', ["title" => "Logistique", "subTitle" => "Produit"])
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
                    <form class="form-horizontal" method="post" action="{{ route('logistique-produit.store') }}">
                        <div class="card card-xxl-stretch">
                            <div class="card-header border-0 py-5 bg-warning">
                                <h3 class="card-title fw-bolder">Produit</h3>
                            </div>
                            <div class="card-body bg-card-kawa 5">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="fournisseur" class="col-sm-5">Société (Fournisseur)</label>
                                            <select class="form-control col" name="fournisseur" id="fournisseur" required>
                                                <option value=""></option>
                                                @foreach($fournisseurs as $fournisseur)
                                                    <option value="{{$fournisseur->id}}">{{$fournisseur->societe}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="reference" class="col-sm-5">Référence</label>
                                            <input type="text" class="form-control col" id="reference" name="reference" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="libelle" class="col-sm-5">Libellé</label>
                                            <input type="text" class="form-control col" name="libelle" id="libelle" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="description" class="col-sm-5">Description</label>
                                            <textarea class="form-control col" name="description" id="description" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="seuil" class="col-sm-5">Seuil de réapprovisionnement</label>
                                            <input type="number" class="form-control col" name="seuil" id="seuil" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="stockAlert" class="col-sm-5">Stock alert</label>
                                            <input type="number" class="form-control col" name="stockAlert" id="stockAlert" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="ves" class="col-sm-5">Ves (Vital ou non)</label>
                                            <input type="text" class="form-control col" name="ves" id="ves" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="prix" class="col-sm-5">Prix (HT)</label>
                                            <input type="number" class="form-control col" name="prix" id="prix" required>
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


{{--        <form class="form-horizontal" method="post" action="{{ route('logistique-produit.store') }}">--}}
{{--            @csrf--}}

{{--            <div class="row">--}}
{{--                <div class="col-6">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Socitété (Fournisseur)</label>--}}
{{--                        <select name="fournisseur" class="form-control col-sm-7" required>--}}
{{--                            <option></option>--}}
{{--                            @foreach($fournisseurs as $fournisseur)--}}
{{--                                <option value="{{$fournisseur->id}}">{{$fournisseur->societe}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Référence</label>--}}
{{--                        <input type="text" name="reference" class="form-control col-sm-7" required />--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Libellé</label>--}}
{{--                        <input type="text" name="libelle" class="form-control col-sm-7" required />--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Description</label>--}}
{{--                        <textarea type="text" name="description" class="form-control col-sm-7"></textarea>--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Seuil de réapprovisionnement</label>--}}
{{--                        <input type="number" name="seuil" class="form-control col-sm-7">--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Stock alert</label>--}}
{{--                        <input type="number" name="stockAlert" class="form-control col-sm-7" required>--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Ves (Vital ou non)</label>--}}
{{--                        <input type="text" name="ves" class="form-control col-sm-7">--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Prix (HT)</label>--}}
{{--                        <input type="number" name="prix" class="form-control col-sm-7">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <button type="submit" class="btn btn-primary btn-sm">Valider</button>--}}
{{--                        <button type="reset" class="btn btn-danger btn-sm">Annuler</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}

    </div>
@endsection
