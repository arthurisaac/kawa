@extends("base")

@section("main")
    <div class="container">
        <br>
        <div><h2 class="heading">Départ site</h2></div>
        <br>
        <table class="table table-bordered" style="width: 100%;" id="listeDepartSite">
            <thead>
            <tr>
                <th>N°</th>
                <th>N° Tournée</th>
                <th>Véhicule</th>
                <th>Chef de bord</th>
                <th>Agent de garde</th>
                <th>Chauffeur</th>
                <th>Centre</th>
                <th>Centre régional</th>
                <th>Date départ</th>
                <th>Heure de départ</th>
                <th>Kilométrage départ</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($departSites as $depart)
                <tr>
                    <td>{{$depart->id}}</td>
                    <td>{{$depart->tournees->numeroTournee ?? "Donnée indisponible"}}</td>
                    <td>{{$depart->tournees->vehicules->immatriculation ?? "Donnée indisponible"}}</td>
                    <td>{{$depart->tournees->chefDeBords->nomPrenoms ?? "Donnée indisponible"}}</td>
                    <td>{{$depart->tournees->agentDeGardes->nomPrenoms ?? "Donnée indisponible"}}</td>
                    <td>{{$depart->tournees->chauffeurs->nomPrenoms ?? "Donnée indisponible"}}</td>
                    <td>{{$depart->tournees->centre ?? "Donnée indisponible"}}</td>
                    <td>{{$depart->tournees->centre_regional ?? "Donnée indisponible"}}</td>
                    <td>{{date('d-m-Y', strtotime($depart->depart_site ?? ""))}}</td>
                    <td>{{$depart->heureDepart}}</td>
                    <td>{{$depart->kmDepart}}</td>
                    <td>
                        <a href="maincourante-departsite/{{$depart->id}}/edit" class="btn btn-sm btn-primary"></a>
                        <a href="" class="btn btn-sm btn-danger" onclick="supprimer('{{$depart->id}}', this)"></a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>


    <script>
        $(document).ready(function () {
            $('#listeDepartSite').DataTable({
                "order": [[0, "desc"]],
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
                    url: "maincourante-departsite/" + id,
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
