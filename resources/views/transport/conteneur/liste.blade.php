@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Conteneur</h2></div><br />
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif

    <div class="row">
        <div class="col">
            <table class="table table-bordered" style="width: 100%" id="liste">
                <thead>
                <tr>
                    <th>N°Conteneur</th>
                    <th>Type conteneur</th>
                    <th>Date mise en service</th>
                    <th>Durée de vie</th>
                    <th>Eat</th>
                    <th>Date dégradation</th>
                    <th>Cause</th>
                    <th>Remplacé par</th>
                    <th>Remplacé le</th>
                    <th>Date maintenance</th>
                    <th>Date renouvellement</th>
                    <th>Imputation rapport</th>
                    <th>Date imputation</th>
                    <th>Centre</th>
                    <th>Centre régional</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($conteneurs as $conteneur)
                <tr>
                    <td>{{$conteneur->conteneur}}</td>
                    <td>{{$conteneur->typeConteneur}}</td>
                    <td>{{$conteneur->dateMiseVie}}</td>
                    <td>{{$conteneur->dureeVie}}</td>
                    <td>{{$conteneur->etat}}</td>
                    <td>{{$conteneur->dateDegradation}}</td>
                    <td>{{$conteneur->cause}}</td>
                    <td>{{$conteneur->remplacePar}}</td>
                    <td>{{$conteneur->remplaceLe}}</td>
                    <td>{{$conteneur->dateMaintenanceEffectuee}}</td>
                    <td>{{$conteneur->dateRenouvellement}}</td>
                    <td>{{$conteneur->imputationRaport}}</td>
                    <td>{{$conteneur->dateImputation}}</td>
                    <td>{{$conteneur->centre}}</td>
                    <td>{{$conteneur->centreRegional}}</td>
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
