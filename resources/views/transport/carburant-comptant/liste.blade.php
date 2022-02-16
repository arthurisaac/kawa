@extends('bases.carburant')

@section('main')

<div class="burval-container">
    @extends('bases.toolbar', ["title" => "Carburant", "subTitle" => "Liste Carburant comptant"])
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

    <table class="table table-striped gy-7 gs-7 pt-0" style="width: 100%" id="liste">
        <thead>
        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
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
