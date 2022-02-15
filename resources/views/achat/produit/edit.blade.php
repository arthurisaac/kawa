@extends('bases.achat')

@section('main')
    @extends('bases.toolbar', ["title" => "Achat", "subTitle" => "Produit"])
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


        <form class="form-horizontal" method="post" action="{{ route('achat-produit.update', $achat->id) }}">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group row">
                        <label class="col-sm-5">Date</label>
                        <input type="date" name="date" class="form-control col-sm-7" value="{{$achat->date}}" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Produit</label>
                        <select name="produit" class="form-control col-sm-7" required>
                            <option>{{$achat->produit}}</option>
                            @foreach($produits as $produit)
                                <option value="{{$produit->id}}">{{$produit->libelle}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col-7">
                    <div class="row" style="align-items: center;">
                        <div class="col-2"><label>Siège</label></div>
                        <div class="col">
                            <div class="row" style="align-items: center;">
                                <div class="col-3"><label>Service</label></div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="affectationService" value="RESSOURCES HUMAINES">
                                        <label class="form-check-label">
                                            RESSOURCES HUMAINES
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="affectationService" value="INFORMATIQUE">
                                        <label class="form-check-label">
                                            INFORMATIQUE
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="affectationService" value="LOGISTIQUE">
                                        <label class="form-check-label">
                                            LOGISTIQUE
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="affectationService" value="MONETIQUE">
                                        <label class="form-check-label">
                                            MONETIQUE
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="affectationService" value="GARAGE">
                                        <label class="form-check-label">
                                            GARAGE
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="affectationService" value="SSB">
                                        <label class="form-check-label">
                                            SSB
                                        </label>
                                    </div>
                                </div>
                            </div><br />
                            <div class="row" style="align-items: center;">
                                <div class="col-3"><label>Direction</label></div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="affectationDirection" value="DIRECTION FINANCIERE ET COMPTABLE">
                                        <label class="form-check-label">
                                            DIRECTION FINANCIERE ET COMPTABLE
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="affectationDirection" value="DIRECTION COMMERCIALE ET MARKETING">
                                        <label class="form-check-label">
                                            DIRECTION COMMERCIALE ET MARKETING
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="affectationDirection" value="DIRECTION DES OPERATIONS">
                                        <label class="form-check-label">
                                            DIRECTION DES OPERATIONS
                                        </label>
                                    </div>
                                </div>
                            </div><br />
                            <div class="row" style="align-items: center;">
                                <div class="col-3"><label>Direction générale</label></div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="affectationDirectionGenerale" value="DIRECTION GENERALE ADJOINTE">
                                        <label class="form-check-label">
                                            DIRECTION GENERALE ADJOINTE
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="affectationDirectionGenerale" value="ASISTANTE EXECUTIVE">
                                        <label class="form-check-label">
                                            ASISTANTE EXECUTIVE
                                        </label>
                                    </div>
                                </div>
                            </div><br />
                            <div class="row" style="align-items: center;">
                                <div class="col-3"><label>Centre</label></div>
                                <div class="col">
                                    <div class="form-group">
                                        <select class="form-control col-md-6" name="centre" id="centre" required>
                                            <option>{{$achat->centre}}</option>
                                            @foreach ($centres as $centre)
                                                <option value="{{$centre->centre}}">{{$centre->centre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div><br />
                            <div class="row" style="align-items: center;">
                                <div class="col-3"><label>Centre Régional</label></div>
                                <div class="col">
                                    <div class="form-group">
                                        <select class="form-control col-md-6" name="centreRegional" id="centre_regional" required>
                                            <option>{{$achat->centreRegional}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <br />
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group row">
                        <label class="col-sm-5">Quantité</label>
                        <input type="number" class="form-control col-sm-7" min="0" name="quantite" value="{{$achat->quantite}}" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Montant</label>
                        <input type="number" class="form-control col-sm-7" min="0" name="montant" value="{{$achat->montant}}" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Montant TTC</label>
                        <input type="number" class="form-control col-sm-7" min="0" name="montantTTC" value="{{$achat->montantTTC}}" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Montant HT</label>
                        <input type="number" class="form-control col-sm-7" min="0" name="montantHT" value="{{$achat->montantHT}}" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Suivi budgétaire</label>
                        <input type="number" class="form-control col-sm-7" min="0" name="suiviBudgetaire" value="{{$achat->suiviBudgetaire}}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                    <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
                </div>
            </div>
        </form>

    </div>
    <script>
        let achat =  {!! json_encode($achat) !!};
        $(document).ready(function () {

            const affectationService = achat.affectationService + "";
            const affectationService_array = affectationService.split(',');

            const affectationDirection = achat.affectationDirection + "";
            const affectationDirection_array = affectationDirection.split(',');

            const affectationDirectionGenerale = achat.affectationDirectionGenerale + "";
            const affectationDirectionGenerale_array = affectationDirectionGenerale.split(',');

            $("input[name='affectationService']").map(function () {
                const value = $(this).val();
                if (affectationService_array.includes(value)) $(this).prop("checked", true);
            });

            $("input[name='affectationDirection']").map(function () {
                const value = $(this).val();
                if (affectationDirection_array.includes(value)) $(this).prop("checked", true);
            });

            $("input[name='affectationDirectionGenerale']").map(function () {
                const value = $(this).val();
                if (affectationDirectionGenerale_array.includes(value)) $(this).prop("checked", true);
            });
        });
    </script>
@endsection
