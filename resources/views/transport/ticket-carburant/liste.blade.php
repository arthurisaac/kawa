@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Liste ticket carburant</h2></div>
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
        <div class="col">
            <table class="table table-bordered" style="width: 100%" id="liste">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Lieu</th>
                    <th>Numero Ticket</th>
                    <th>N° Carte Carburant</th>
                    <th>Immatriculation</th>
                    <th>Solde</th>
                    <th>Solde Précédent</th>
                    <th>Utilisation</th>
                    <th>Kilometrage</th>
                    <th>litrage</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($carburants as $carburant)
                <tr>
                    <td>{{$carburant->date}}</td>
                    <td>{{$carburant->heure}}</td>
                    <td>{{$carburant->lieu}}</td>
                    <td>{{$carburant->numeroTicket}}</td>
                    <td>{{$carburant->numeroCarteCarburant}}</td>
                    <td>{{$carburant->idVehicule}}</td>
                    <td>{{$carburant->solde}}</td>
                    <td>{{$carburant->soldePrecedent}}</td>
                    <td>{{$carburant->utilisation}}</td>
                    <td>{{$carburant->kilometrage}}</td>
                    <td>{{$carburant->litrage}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('#liste').DataTable({
            "language": {
                "url": "French.json"
            }
        });
    });
</script>
@endsection
