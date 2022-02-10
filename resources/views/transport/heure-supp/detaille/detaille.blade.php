@extends('bases.transport')

@section('main')
    @extends('bases.toolbar', ["title" => "Transport", "subTitle" => "Heures supplémentaires détaillées"])
<div class="burval-container">
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
            <!--<div class="form-group row">
                <label class="col-sm-3">Période prédifinie</label>
                <input type="date" class="form-control">
            </div>-->
        </div>
        <div class="col-2">
            <button class="btn btn-primary btn-sm">Rechercher</button>
        </div>
        <div class="col-6"></div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-bordered" id="liste" style="width: 100%;">
                <thead>
                <tr>
                    <td>Date</td>
                    <td>Type date</td>
                    <td>Heures supp</td>
                    <td>Nom et prénom du convoyeur</td>
                    <td>Heure arrivée</td>
                    <td>Heure départ</td>
                    <td>Heure arrivée 1</td>
                    <td>Heure départ 1</td>
                    <td>Heure arrivée 2</td>
                    <td>Heure départ 2</td>
                    <td>Heure arrivée 3</td>
                    <td>Heure départ 3</td>
                    <td>Heures travaillées</td>
                    <td>Heures supplémentaires</td>
                </tr>
                </thead>
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
    });
</script>
@endsection
