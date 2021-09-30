@extends("base")

@section("main")
    <div class="container-fluid">
        <br>
        <div><h2 class="heading">Arrivee centre</h2></div>
        <br>
        <table class="table table-bordered" style="width: 100%;" id="listeArriveeCentre">
            <thead>
            <tr>
                <th>N°Tournée</th>
                <th>Véhicule</th>
                <th>Chef de bord</th>
                <th>Agent de garde</th>
                <th>Chauffeur</th>
                <th>Centre régional</th>
                <th>Centre</th>
                <th>Date arrivée</th>
                <th>Heure arrivée</th>
                <th>Km arrivée centre</th>
                <th>Niveau carburant</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($arriveeCentres as $centre)
                <tr>
                    <td>{{$centre->tournees->numeroTournee ?? "Donnée indisponible"}}</td>
                    <td>{{$centre->tournees->vehicules->immatriculation ?? "Donnée indisponible"}}</td>
                    <td>{{$centre->tournees->chefDeBords->nomPrenoms ?? "Donnée indisponible"}}</td>
                    <td>{{$centre->tournees->agentDeGardes->nomPrenoms ?? "Donnée indisponible"}}</td>
                    <td>{{$centre->tournees->chauffeurs->nomPrenoms ?? "Donnée indisponible"}}</td>
                    <td>{{$centre->tournees->centre ?? "Donnée indisponible"}}</td>
                    <td>{{$centre->tournees->centre_regional ?? "Donnée indisponible"}}</td>
                    <td>{{$centre->dateArrivee}}</td>
                    <td>{{$centre->heureArrivee}}</td>
                    <td>{{$centre->kmArrive}}</td>
                    <td>{{$centre->niveauCarburant}}</td>
                    <td>
                        <a href="maincourante-arriveecentre/{{$centre->id}}/edit" class="btn btn-sm btn-primary"></a>
                        <a href="" class="btn btn-sm btn-danger" onclick="supprimer('{{$centre->id}}', this)"></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <script>
        $(document).ready(function () {
            $('#listeArriveeCentre').DataTable({
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
                    url: "maincourante-arriveecentre/" + id,
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
