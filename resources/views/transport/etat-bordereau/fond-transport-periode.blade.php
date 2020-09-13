@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Etat tournée fond transporté période</h2></div>
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
                    <th>N°Tournée</th>
                    <th>Tps roulage</th>
                    <th>Km parcouru</th>
                    <th>Somme transportée</th>
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
    });
</script>
@endsection
