@extends("base")

@section("main")
    <div class="container-fluid">
        <br>
        <br>
        <div><h2 class="heading">Départ tournée</h2></div>
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
                    <td>{{$tournee->sites->sum("nbre_colis")}}</td>
                    <td>{{$tournee->sites->sum("montant_regulation")}}</td>
                    <td>{{$tournee->chefDeBords->nomPrenoms ?? ""}} //
                        {{$tournee->agentDeGardes->nomPrenoms ?? ""}} //
                        {{$tournee->chauffeurs->nomPrenoms ?? ""}} //
                    </td>
                    <td>
                        <a href="regulation-depart-tournee/{{$tournee->id}}/edit" class="btn btn-sm btn-primary"></a>
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
