@extends('base')

@section('main')
    <div class="burval-container">
        <h2 class="heading">Sortie stock</h2>
        <h2>Quantité sortie : <span class="text-danger">{{ $stocks->sum("qte_sortie") }}</span></h2>
        <br>
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

        <a href="/regulation-stock-sortie" class="btn btn-info btn-sm">Nouveau</a>
        <br>
        <br>
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
                        <label for="service" class="col-5">Service</label>
                        <select id="service" name="service" class="form-control col">
                            <option>{{$service}}</option>
                            <option>Informatique</option>
                            <option>Sécurité</option>
                            <option>Caisse</option>
                            <option>DAB</option>
                            <option>Comptabilite</option>
                            <option>Regulation</option>
                        </select>
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="" class="col-5">Date début</label>
                        <input type="date" name="debut" class="form-control col-7" value="{{$debut}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="" class="col-5">Date fin</label>
                        <input type="date" name="fin" class="form-control col-sm-7" value="{{$fin}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="libelle" class="col-5">Libelle</label>
                        <select class="form-control col" name="libelle" id="libelle">
                            <option>{{$libelle}}</option>
                            <option>bordereau de transport</option>
                            <option>bordereau de collecte</option>
                            <option>cahier de maintenance</option>
                            <option>cahier d’appro</option>
                            <option>securipack extra</option>
                            <option>securipack grand</option>
                            <option>securipack moyen</option>
                            <option>securipack petit</option>
                            <option>pochette</option>
                            <option>scellé DAB</option>
                            <option>scellé caisse</option>
                            <option>coiffe 10000</option>
                            <option>coiffe 5000</option>
                            <option>coiffe 2000</option>
                            <option>coiffe 1000</option>
                            <option>coiffe 500</option>
                            <option>sac jute grand</option>
                            <option>sac jute moyen</option>
                            <option>TAG bleu</option>
                            <option>TAG vert</option>
                            <option>TAG jaune</option>
                        </select>
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col text-right">
                    <a href="/regulation-stock-sortie-liste-detaillee" class="btn btn-info btn-sm">Effacer</a> <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                </div>
            </div>
        </form>
        <br>
        <table class="table table-bordered" id="liste">
            <thead>
            <tr>
                <th>ID</th>
                <th>Date sortie</th>
                <th>Centre régional</th>
                <th>Centre</th>
                <th>Service</th>
                <th>Receveur</th>
                <th>Libelle</th>
                <th>Quantité sortie</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($stocks as $stock)
                <tr>
                    <td>{{$stock->id}}</td>
                    <td>{{$stock->stocks->date}}</td>
                    <td>{{$stock->stocks->centre_regional}}</td>
                    <td>{{$stock->stocks->centre}}</td>
                    <td>{{$stock->stocks->service}}</td>
                    <td>{{$stock->stocks->receveur}}</td>
                    <td>{{$stock->libelle}}</td>
                    <td>{{$stock->qte_sortie}}</td>
                    <td>
                        <a href="regulation-stock-sortie/{{$stock->stocks->id}}/edit" class="btn btn-primary btn-sm"></a>
                        <a class="btn btn-danger btn-sm" onclick="supprimer('{{$stock->id}}', this)"></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function supprimer(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "regulation-stock-sortie/" + id,
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
                    error: function () {
                        alert("Une erreur s'est produite");
                    }
                });
            }
        }
    </script>
    <script>
        $(document).ready(function () {
            $('#liste').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        });
    </script>
@endsection
