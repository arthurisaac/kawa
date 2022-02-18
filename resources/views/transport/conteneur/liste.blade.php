@extends('bases.logistique')

@section('main')
    @extends('bases.toolbar', ["title" => "Logistique", "subTitle" => "Liste Conteneur"])
    <div class="burval-container">
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
            <table class="table table-striped gy-7 gs-7 pt-0" style="width: 100%;" id="liste">
                <thead>
                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
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
