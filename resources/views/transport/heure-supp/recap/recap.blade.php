@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Heures supplémentaires recap</h2></div>
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
            <table class="table table-bordered" id="liste">
                <thead>
                <tr>
                    <td>Nom et prénoms convoyeur</td>
                    <td>Heures travaillées</td>
                    <td>Heures supp</td>
                    <td>Heures supp 15%</td>
                    <td>Heures supp 50%</td>
                    <td>Heures supp 75%</td>
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
