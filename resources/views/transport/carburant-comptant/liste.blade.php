@extends('bases.transport')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Liste carburant comptant</h2></div>
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

    <table class="table table-bordered" id="liste">
        <thead>
        <tr>
            <th>Immatriculation</th>
            <th>Date</th>
            <th>Montant</th>
            <th>Quantité</th>
            <th>Lieu</th>
            <th>Utilisation</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($carburants as $carburant)
        <tr>
            <td>{{$carburant->vehicules->immatriculation}}</td>
            <td>{{$carburant->date}}</td>
            <td>{{$carburant->montant}}</td>
            <td>{{$carburant->qteServie}}</td>
            <td>{{$carburant->lieu}}</td>
            <td>{{$carburant->utilisation}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
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
