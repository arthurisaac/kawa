@extends('bases.transport')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Etat bordereau</h2></div>
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
            <div class="form-group">
                <label>Date début</label>
                <input type="date" name="dateDebut">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>Date fin</label>
                <input type="date" name="dateFin" value="{{ date('Y-m-d')}}">
            </div>
        </div>
    </div>
    <table class="table table-bordered" id="liste">
        <thead>
        <tr>
            <th>Site</th>
            <th>Nombre bordereaux</th>
            <th>Nombre bordereaux utilisés</th>
            <th>Nombre bordereaux restants</th>
        </tr>
        </thead>
    </table>
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
