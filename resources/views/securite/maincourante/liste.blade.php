@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Site</h2></div>
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

    <br/>
    <p>DEPART TOURNEE</p>
    <table class="table table-bordered table-hover" id="listeDepartTournee">
        <thead>
        <tr>
            <td>N°Tournée</td>
            <td>Date</td>
            <td>Heure</td>
            <td>Code</td>
            <td>Km départ</td>
            <td>Observation</td>
        </tr>
        </thead>
        <tbody>
        @foreach ($departCentres as $depart)
        <tr>
            <td>{{$depart->noTournee}}</td>
            <td>{{$depart->date}}</td>
            <td>{{$depart->heureDepart}}</td>
            <td>{{$depart->code}}</td>
            <td>{{$depart->kmDepart}}</td>
            <td>{{$depart->observation}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <br/>
    <p>ARRIVEE CENTRE</p>
    <table class="table table-bordered table-hover" style="width: 100%"  id="listeArriveeTournee">
        <thead>
        <tr>
            <td>Site</td>
            <td>Date</td>
            <td>Heure</td>
            <td>Km départ</td>
            <td>Observation</td>
        </tr>
        </thead>
        <tbody>
        @foreach ($arriveeCentres as $depart)
        <tr>
            <td>{{$depart->site}}</td>
            <td>{{$depart->date}}</td>
            <td>{{$depart->heureDepart}}</td>
            <td>{{$depart->kmDepart}}</td>
            <td>{{$depart->observation}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <br/>
    <p>MOUVEMENT CENTRE</p>
    <table class="table table-bordered table-hover" style="width: 100%">
        <thead>
        <tr>
            <td>Date</td>
            <td>N°Tournee</td>
            <td>Vehicule</td>
            <td>Temps tournée</td>
            <td>Km parcouru</td>
            <td>Observe départ</td>
            <td>Observ arrivée</td>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <br/>
    <p>MOUVEMENT CENTRE</p>
    <table class="table table-bordered table-hover" style="width: 100%">
        <thead>
        <tr>
            <td>Site</td>
            <td>Date</td>
            <td>Heure</td>
            <td>Km arrivée</td>
            <td>N°Tournée</td>
            <td>Code</td>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <br/>

    <p>MOUVEMENT CENTRE</p>
    <table class="table table-bordered table-hover" style="width: 100%">
        <thead>
        <tr>
            <td>Site</td>
            <td>Date</td>
            <td>Heure</td>
            <td>Num tournée</td>
            <td>Type colis</td>
            <td>Nombre de colis</td>
            <td>N°Sécuripack</td>
            <td>Destination</td>
            <td>Observation</td>
            <td>Numéro bordereau</td>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <p>POINTAGE SITE</p>
    <table class="table table-bordered table-hover" style="width: 100%">
        <thead>
        <tr>
            <td>Date</td>
            <td>N°Tournée</td>
            <td>Site</td>
            <td>Heure arrivée</td>
            <td>Heure dep</td>
            <td>Duree</td>
            <td>Observation</td>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>



</div>
<script>
    $(document).ready(function () {
        $('#listeDepartTournee').DataTable({
            "language": {
                "url": "French.json"
            }
        });
        $('#listeArriveeTournee').DataTable({
            "language": {
                "url": "French.json"
            }
        });

    });
</script>
@endsection
