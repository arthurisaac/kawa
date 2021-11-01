@extends('base')

@section('main')
    <div class="container-fluid">
        <br>
        <br>
        <div><h2 class="heading">Liste Synthèse de Tournée</h2></div>
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

        <br/>
        <div class="container-fluid">
            <form action="#" method="get">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label for="" class="col-sm-5">Date début</label>
                            <input type="date" name="debut" class="form-control col-sm-7">
                        </div>
                    </div>
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
            <table class="table table-bordered table-hover" id="listeMaincourante" style="width: 100%;">
                <thead>
                <tr>
                    <td style="display: none;">ID</td>
                    <td>Centre Régional</td>
                    <td>Centre</td>
                    <td>Date</td>
                    <td>N°Tournée</td>
                    <td>Véhicule</td>
                    <td>Km départ</td>
                    <td>Km arrivée</td>
                    <td>Départ centre</td>
                    <td>Arrivée centre</td>
                    <td>Km parcouru</td>
                    <td>Temps tournée</td>
                    <td>Carburant départ</td>
                    <td>Carburant arrivée</td>
                    <td>Convoyeur</td>
                </tr>
                </thead>
                <tbody>
                @foreach($tournees as $tournee)
                    <tr>
                        <td style="display: none;">{{$tournee->id}}</td>
                        <td>{{$tournee->centre_regional}}</td>
                        <td>{{$tournee->centre}}</td>
                        <td>{{$tournee->date}}</td>
                        <td>{{$tournee->numeroTournee}}</td>
                        <td>{{$tournee->vehicules->immatriculation ?? "Donnée indisponible"}}</td>
                        <td>{{$tournee->departCentre->kmDepart ?? "Pas de données"}}</td>{{--<td>{{$tournee->departCentre ?? $tournee->departCentre[0]->kmDepart ?? ""}}</td>--}}
                        <td>{{$tournee->arriveeCentre->kmArrive ?? "Donnée indisponible"}}</td>
                        <td>{{$tournee->departCentre->heureDepart ?? ""}}</td>
                        <td>{{$tournee->arriveeCentre->heureArrivee ?? "Donnée indisponible"}}</td>
                        <td>{{($tournee->arriveeCentre->kmArrive ?? 0) - ($tournee->departCentre->kmDepart ?? 0)}}</td>{{--<td>{{$tournee->departCentre[0]->kmDepart - $tournee->arriveeCentre[0]->kmArrive}}</td>--}}
                        <td>
                            <?php
                            /*$date1 = new DateTime($tournee->arriveeCentre->dateArrivee ?? date('Y/m/d'));
                            $date2 = new DateTime($tournee->date);
                            $interval = $date1->diff($date2);
                            echo $interval->days;*/
                            $date = $tournee->date ?? "2021-12-01";
                            $depart = $tournee->departCentre->heureDepart ?? "00:00:00";
                            $arrivee = $tournee->arriveeCentre->heureArrivee ?? "00:00:00";
                            $start = date_create("$date $depart");
                            $end = date_create("$date $arrivee");
                            $diff=date_diff($end,$start);
                            echo str_pad($diff->h, 2, '0', STR_PAD_LEFT) . ":" . str_pad($diff->i, 2, '0', STR_PAD_LEFT);
                            ?>
                        </td>
                        <td>{{$tournee->departCentre->niveauCarburant ?? ""}}</td>
                        <td>{{$tournee->arriveeCentre->niveauCarburant ?? "Donnée indisponible"}}</td>
                        <td>{{$tournee->chauffeurs->nomPrenoms ?? ''}} // {{$tournee->chefDeBords->nomPrenoms ?? ''}} // {{$tournee->agentDeGardes->nomPrenoms ?? ''}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


    </div>
    <script>
        $(document).ready(function () {
            $('#listeMaincourante').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        });
    </script>
    <script>
        function supprimer(id, e) {
            if (confirm("Confirmer la suppression? Cela entrainera la suppression de départ tournée.")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "maincourante/" + id,
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
                        document.getElementById("listeMaincourante").deleteRow(indexLigne);
                    },
                    error: function () {
                        alert("Une erreur s'est produite");
                    }
                })
            }
        }
    </script>
@endsection
