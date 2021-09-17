@extends("base")

@section("main")
    <div class="container">
        <br>
        <div><h2 class="heading">Tournée centre</h2></div>
        <br>
        <table class="table table-bordered" id="listeTourneeCentre">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>N° Tournee</th>
                    <th>Véhicule</th>
                    <th>Chauffeur</th>
                    <th>Chef de bord</th>
                    <th>Agent de garde</th>
                    <th>Centre régional</th>
                    <th>Centre</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($tourneeCentres as $tournee)
                <tr>
                    <td>{{$tournee->tournees->date ?? "Indisponible"}}</td>
                    <td>{{$tournee->tournees->numeroTournee  ?? "Indisponible"}}</td>
                    <td>{{$tournee->details->vehicules->immatriculation ?? "Indisponible"}}</td>
                    <td>{{$tournee->details->chauffeurs->nomPrenoms ?? ""}}</td>
                    <td>{{$tournee->details->chefDeBords->nomPrenoms ?? ""}}</td>
                    <td>{{$tournee->details->agentDeGardes->nomPrenoms ?? ""}}</td>
                    <td>{{$tournee->centre}}</td>
                    <td>{{$tournee->centreRegional}}</td>
                    <td>{{$tournee->dateDebut}}</td>
                    <td>{{$tournee->dateFin}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <script>
        $(document).ready(function () {
            $('#listeTourneeCentre').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        });
    </script>
@endsection
