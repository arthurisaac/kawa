@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Liste ticket carburant</h2></div>
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

    <a href="/ticket-carburant" class="btn btn-sm btn-primary">Ajouter</a>
    <br>
    <br>

    <div class="row">
        <div class="col">
            <form action="#" method="get">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group row">
                            <label for="" class="col-sm-5">Date début</label>
                            <input type="date" name="debut" class="form-control col-sm-7">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label for="" class="col-sm-5">Date fin</label>
                            <input type="date" name="fin" class="form-control col-sm-7">
                        </div>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary btn-sm">Rechercher</button>
                    </div>
                    <div class="col"></div>
                </div>
            </form>
        </div>
        <div class="col">
            <h6 class="float-right">Montant total : {{$carburants->sum("soldePrecedent")}}</h6>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-bordered" style="width: 100%" id="liste">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Lieu</th>
                    <th>Numero Ticket</th>
                    <th>N° Carte Carburant</th>
                    <th>Immatriculation</th>
                    <th>Montant</th>
                    <th>Kilometrage</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($carburants as $carburant)
                <tr>
                    <td>{{$carburant->date}}</td>
                    <td>{{$carburant->heure}}</td>
                    <td>{{$carburant->lieu}}</td>
                    <td>{{$carburant->numeroTicket}}</td>
                    <td>{{$carburant->numeroCarteCarburant}}</td>
                    <td>{{$carburant->vehicules->immatriculation ?? ""}}</td>
                    <td>{{$carburant->soldePrecedent}}</td>
                    <td>{{$carburant->kilometrage}}</td>
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
