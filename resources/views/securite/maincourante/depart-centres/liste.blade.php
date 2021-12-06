@extends("base")

@section("main")
    <div class="container-fluid">
        <br>
        <br>
        <table class="table table-bordered" style="width: 100%;" id="listeDepartCentre">
            <thead>
            <tr>
                <th>N°Tournée</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Véhicule</th>
                <th>Chef de bord</th>
                <th>Agent de garde</th>
                <th>Chauffeur</th>
                <th>Centre régional</th>
                <th>Centre</th>
                <th>Km départ</th>
                <th>Niveau carburant</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($departCentres as $centre)
                <tr>
                    <td>{{$centre->tournees->numeroTournee ?? "Donnée indisponible"}}</td>
                    <td>{{$centre->tournees->date ?? ''}}</td>
                    <td>{{$centre->heureDepart}}</td>
                    <td>{{$centre->tournees->vehicules->immatriculation ?? "Donnée indisponible"}}</td>
                    <td>{{$centre->tournees->chefDeBords->nomPrenoms ?? "Donnée indisponible"}}</td>
                    <td>{{$centre->tournees->agentDeGardes->nomPrenoms ?? "Donnée indisponible"}}</td>
                    <td>{{$centre->tournees->chauffeurs->nomPrenoms ?? "Donnée indisponible"}}</td>
                    <td>{{$centre->tournees->centre ?? "Donnée indisponible"}}</td>
                    <td>{{$centre->tournees->centre_regional ?? "Donnée indisponible"}}</td>
                    <td>{{$centre->kmDepart}}</td>
                    <td>{{$centre->niveauCarburant}}</td>
                    <td>
                        <a href="maincourante-departcentre/{{$centre->id}}/edit" class="btn btn-primary btn-sm"></a>
                        <a class="btn btn-danger btn-sm" onclick="supprimer('{{$centre->id}}', this)"></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <script>
        $(document).ready(function () {
            $('#listeDepartCentre').DataTable({
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
                    url: "maincourante-departcentre/" + id,
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
                }).done(function () {
                    // TODO hide loader
                });
            }

        }
    </script>
@endsection
