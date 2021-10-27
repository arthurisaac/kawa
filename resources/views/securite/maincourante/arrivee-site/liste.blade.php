@extends("base")

@section("main")
    <div class="container-fluid">
        <br>
        <div><h2 class="heading">Arrivée site</h2></div>
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
        <br>
        <table class="table table-bordered" id="liste" style="width: 100%">
            <thead>
            <tr>
                <td>N°</td>
                <td>Centre régional</td>
                <td>Centre</td>
                <td>Date</td>
                <td>N° Tournée</td>
                <td>Heure</td>
                <td>Site</td>
                <td>Client</td>
                <td>Type op</td>
                <td>Véhicule</td>
                <td>Equipage</td>
                <td>Temps op.</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($arriveeSites as $arriveeSite)
                <tr>
                    <td style="width: 20px; text-align: center">{{$arriveeSite->id}}</td>
                    <td>{{$arriveeSite->tournees->centre_regional ?? "Donnée indisponible"}}</td>
                    <td>{{$arriveeSite->tournees->centre ?? "Donnée indisponible"}}</td>
                    <td>{{$arriveeSite->tournees->date ?? "Donnée indisponible"}}</td>
                    <td>{{$arriveeSite->tournees->numeroTournee ?? "Donnée indisponible"}}</td>
                    <td>{{$arriveeSite->tournees->heureDepart ?? "Donnée indisponible"}}</td>
                    <td>{{$arriveeSite->sites->site ?? "Non précisé"}}</td>
                    <td>{{$arriveeSite->sites->clients->client_nom ?? ""}}</td>
                    <td>{{$arriveeSite->operation ?? ""}}</td>
                    <td>{{$arriveeSite->tournees->vehicules->immatriculation ?? "Donnée indisponible"}}</td>
                    <td>{{$arriveeSite->tournees->chefDeBords->nomPrenoms ?? "Donnée indisponible"}} // {{$arriveeSite->tournees->agentDeGardes->nomPrenoms ?? "Donnée indisponible"}} // {{$arriveeSite->tournees->chauffeurs->nomPrenoms ?? "Donnée indisponible"}}</td>
                    <td>{{$arriveeSite->tempsOperation}}</td>
                    <td style="width: 30px; text-align: center;">
                        <a href="/maincourante-arriveesiteliste/{{$arriveeSite->id}}/edit" class="btn btn-sm btn-primary"></a>
                        <button class="btn btn-sm btn-danger" onclick="supprimer('{{$arriveeSite->id}}', this)"></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <script>
        $(document).ready(function () {
            $('#liste').DataTable({
                "order": [[ 0, "desc" ]],
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
                    url: "maincourante-arriveesiteliste/" + id,
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
                }).done(function () {
                    // TODO hide loader
                });


            }

        }
    </script>
@endsection
