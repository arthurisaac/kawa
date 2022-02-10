@extends('bases.transport')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Etat tournée par véhicule</h2></div>
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

    <div class="row">
        <div class="col-4">
            <div class="form-group row">
                <label class="col-sm-4">Date de début</label>
                <input type="date" class="form-control col-sm-8">
            </div>
            <div class="form-group row">
                <label class="col-sm-4">Date de fin</label>
                <input type="date" class="form-control col-sm-8">
            </div>
        </div>
        <div class="col-2">
            <button class="btn btn-primary btn-sm">Rechercher</button>
        </div>
        <div class="col-6"></div>
    </div><br />
    <div class="row">
        <div class="col">
            <table class="table table-bordered" style="width: 100%;" id="liste">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Véhicule</th>
                    <th>Convoyeur</th>
                    <th>Tournée</th>
                    <th>Heure de départ</th>
                    <th>Km de départ</th>
                    <th>Heure arrivée</th>
                    <th>Km arrivé</th>
                    <th>Tps tournée</th>
                    <th>Total km</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tournees as $tournee)
                    <tr>
                        <td>{{$tournee->date}}</td>
                        <td>{{ strtoupper($tournee->vehicules->immatriculation) ?? $tournee->idVehicule}}</td>
                        <td>{{$tournee->chauffeur}}</td>
                        <td>{{$tournee->numeroTournee}}</td>
                        <td>{{$tournee->heureDepart}}</td>
                        <td>{{$tournee->kmDepart}}</td>
                        <td>{{$tournee->heureArrivee}}</td>
                        <td>{{$tournee->kmArrivee}}</td>
                        <td>{{(strtotime($tournee->heureArrivee) - strtotime($tournee->heureDepart)) / 60}}</td>
                        <td>{{$tournee->kmArrivee - $tournee->kmDepart}}</td>
                        <td>
                            <a href="javascript:popupwnd('{{route('depart-tournee.show',$tournee->id)}}','no','no','no','no','no','no','','','1000','400')"
                               target="_self" class="btn btn-primary btn-sm">Voir</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="11">Compteur</td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div><br />
    <h3>Transport</h3>
    <div class="row">
        <div class="col">
            <table class="table table-bordered" style="width: 100%;" id="liste1">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>N°Ticket</th>
                    <th>Véhicule</th>
                    <th>Centre</th>
                    <th>Lieu</th>
                    <th>Solde prec</th>
                    <th>Solde</th>
                    <th>Consommation</th>
                    <th>Utilisation</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td colspan="10">Somme</td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
<script>
    $(document).ready(function () {
        $('#liste').DataTable({
            "language": {
                "url": "French.json"
            }
        });
        $('#liste1').DataTable({
            "language": {
                "url": "French.json"
            }
        });
    });
</script>
@endsection
