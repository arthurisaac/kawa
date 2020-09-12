@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Carte carburant</h2></div>
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
            <table class="table table-bordered" id="liste">
                <thead>
                <th>Num Carte</th>
                <th>Société</th>
                <th>Num Véhicule</th>
                <th>Date acquisition</th>
                </thead>
                <tbody>
                @foreach ($carteCarburants as $carte)
                <tr>
                    <td>{{$carte->numeroCarte}}</td>
                    <td>{{$carte->societe}}</td>
                    <td>{{$carte->idVehicule}}</td>
                    <td>{{$carte->dateAquisition}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-3">
            <a href="javascript:popupwnd('carte-carburant','no','no','no','yes','yes','no','','','1200','600')"
               target="_self"
               class="btn btn-primary btn-sm">Nouveau</a>
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
