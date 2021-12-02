@extends("base")

@section("main")
    <div class="container-fluid">
        <br>
        <br>
        <div><h2 class="heading">Arrivée tournée</h2></div>
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

        <br>
        <a href="/regulation-arrivee-tournee" class="btn btn-info btn-sm">Nouveau</a>
        <br>
        <br>
        <form action="#" method="get">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group row">
                        <label for="" class="col-sm-5">Date début</label>
                        <input type="date" name="debut" class="form-control col-sm-7">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="" class="col-sm-5">Date fin</label>
                        <input type="date" name="fin" class="form-control col-sm-7">
                    </div>
                </div>
                <div class="col">
                    <button class="btn btn-primary btn-sm">Rechercher</button>
                </div>
                <div class="col"></div>
            </div>
        </form>
        <table class="table table-bordered" style="width: 100%;" id="liste">
            <thead>
            <tr>
                <td>ID</td>
                <td>Centre régional</td>
                <td>Centre</td>
                <td>Date</td>
                <td>N° Tournée</td>
                <td>Véhicule</td>
                <td>Nbre Total colis</td>
                <td>Total valeur colis</td>
                <td>Total montant colis (XOF)</td>
                <td>Total device etrangere (Dollar)</td>
                <td>Total device etrangere (EURO)</td>
                <td>Montant total</td>
                <td>Equipage</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($tournees as $tournee)
                <tr>
                    <td>{{$tournee->id}}</td>
                    <td>{{$tournee->centre_regional ?? ""}}</td>
                    <td>{{$tournee->centre ?? ""}}</td>
                    <td>{{$tournee->date}}</td>
                    <td>{{$tournee->numeroTournee ?? "Donnée indisponible"}}</td>
                    <td>{{$tournee->vehicules->immatriculation ?? "Donnée indisponible"}}</td>
                    <td>{{$tournee->sites->sum("nbre_colis_arrivee")}}</td>
                    <td>{{$tournee->sites->sum("valeur_colis_xof_arrivee")}}</td>
                    <td>{{$tournee->sites->sum("device_etrangere_dollar_arrivee")}}</td>
                    <td>{{$tournee->sites->sum("device_etrangere_euro_arrivee")}}</td>
                    <td>{{$tournee->sites->sum("pierre_precieuse_arrivee")}}</td>
                    <td>{{$tournee->sites->sum("montant_regulation")}}</td>
                    <td>{{$tournee->chefDeBords->nomPrenoms ?? ""}} //
                        {{$tournee->agentDeGardes->nomPrenoms ?? ""}} //
                        {{$tournee->chauffeurs->nomPrenoms ?? ""}} //
                    </td>
                    <td>
                        <a href="regulation-arrivee-tournee/{{$tournee->id}}/edit" class="btn btn-sm btn-primary"></a>
                        <a href="" class="btn btn-sm btn-danger" onclick="supprimer('{{$tournee->id}}', this)"></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <script>
        $(document).ready(function () {
            $('#liste').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        });
    </script>

    <script>
        function supprimer(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "regulation-depart-tournee/" + id,
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
                        document.getElementById("listeDepartCentre").deleteRow(indexLigne);
                    },
                    error: function (xhr) {
                        alert("Une erreur s'est produite");
                    }
                });


            }

        }
    </script>
@endsection
