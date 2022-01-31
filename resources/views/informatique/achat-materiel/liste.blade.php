@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Achat matériel</h2></div>

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

        <div class="titre">
            <div class="row">
                <div class="col">
                    <span class="titre">TOTAL QUANTITE</span> : <span class="text-danger">{{$achats->sum('quantite')}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="titre">TOTAL MONTANT</span> : <span class="text-danger">{{$achats->sum('montant')}}</span>
                </div>
            </div>
        </div>
        <br/>
        <form action="#" method="get">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="centre" class="col-5">Centre Régional</label>
                        <select name="centre" id="centre" class="form-control col">
                            <option>{{$centre}}</option>
                            @foreach ($centres as $centre)
                                <option value="{{$centre->centre}}">{{ $centre->centre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="centre_regional" class="col-5">Centre</label>
                        <select id="centre_regional" name="centre_regional" class="form-control col">
                            <option>{{$centre_regional}}</option>
                            @foreach ($centres_regionaux as $centre)
                                <option value="{{$centre->centre_regional}}">{{ $centre->centre_regional }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="categorie" class="col-5">Categorie</label>
                        <select id="categorie" name="categorie" class="form-control col">
                            <option>{{$categorie}}</option>
                            @foreach ($categories as $categorie)
                                <option value="{{$categorie->categorie}}">{{ $categorie->categorie }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="libelle" class="col-5">Libelle</label>
                        <select id="libelle" name="libelle" class="form-control col">
                            <option>{{$libelle}}</option>
                            @foreach ($libelles as $libelle)
                                <option value="{{$libelle->libelle}}">{{ $libelle->libelle }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="fournisseur" class="col-5">Fournisseur</label>
                        <select id="fournisseur" name="fournisseur" class="form-control col">
                            <option>{{$fournisseur}}</option>
                            @foreach ($fournisseurs as $fournisseur)
                                <option value="{{$fournisseur->id}}">{{ $fournisseur->libelleFournisseur }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col text-right">
                    <a href="/informatique-achat-materiel-liste" class="btn btn-info btn-sm">Effacer</a>
                    <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                </div>
            </div>
        </form>
        <br/>
        <a href="/informatique-achat-materiel" class="btn btn-info btn-sm">Nouveau</a>
        <br/>
        <br>
        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Centre régional</td>
                        <td>Centre</td>
                        <td>Service</td>
                        <td>Fournisseur</td>
                        <td>Catégorie</td>
                        <td>Date achat</td>
                        <td>Référence</td>
                        <td>Libellé</td>
                        <td>Quantité</td>
                        <td>Prix unitaire</td>
                        <td>Montant</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($achats as $achat)
                        <tr>
                            <td>{{$achat->id}}</td>
                            <td>{{$achat->centre}}</td>
                            <td>{{$achat->centreRegional}}</td>
                            <td>{{$achat->service}}</td>
                            <td>{{$achat->fournisseurs->libelleFournisseur ?? ""}}</td>
                            <td>{{$achat->categorie}}</td>
                            <td>{{$achat->date_achat}}</td>
                            <td>{{$achat->reference}}</td>
                            <td>{{$achat->libelle}}</td>
                            <td>{{$achat->quantite}}</td>
                            <td>{{$achat->prixUnitaire}}</td>
                            <td>{{$achat->montant}}</td>
                            <td>
                                <a href="{{ route('informatique-achat-materiel.edit',$achat->id)}}"
                                   class="btn btn-primary btn-sm"></a>
                                <button class="btn btn-danger btn-sm"
                                        onclick="supprimer('{{$achat->id}}', this)"></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <script>
            let fournisseurs = {!! json_encode($fournisseurs) !!};
            $(document).ready(function () {
                $('#liste').DataTable({
                    "language": {
                        "url": "French.json"
                    }
                });

                const fournInput = $("#fournisseur");
                if (fournInput.val()) {
                    const fournisseur = fournisseurs.find(f => f.id === parseInt(fournInput.val() ?? 0));
                    if (fournisseur) $("select[name='fournisseur'] option[value="+ fournisseur?.id +"]").attr('selected','selected');
                }
            });
        </script>
        <script>
            function supprimer(id, e) {
                if (confirm("Confirmer la suppression?")) {
                    const token = "{{ csrf_token() }}";
                    $.ajax({
                        url: "/informatique-achat-materiel/" + id,
                        type: 'DELETE',
                        dataType: "JSON",
                        data: {
                            "id": id,
                            _token: token,
                        },
                        success: function (response) {
                            console.log(response);
                            alert("Suppression effectuée");
                            const indexLigne = $(e).closest('tr').get(0).rowIndex;
                            document.getElementById("liste").deleteRow(indexLigne);
                        },
                        error: function (xhr) {
                            alert("Une erreur s'est produite");
                        }
                    }).done(function () {
                        // TODO hide loader
                    });


                }

            }
        </script>
@endsection
