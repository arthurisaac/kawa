@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Etat par site</h2></div>
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
            <table class="table table-bordered" style="width: 100%;">
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
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td colspan="10">Compteur</td>
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
    });
</script>
@endsection
