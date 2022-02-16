@extends('bases.carburant')

@section('main')
    @extends('bases.toolbar', ["title" => "Carburant", "subTitle" => "Carb. chargement carte"])
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
        <div class="col-9">
            <h5>Carte carburant</h5><br />
            <table class="table table-bordered" style="width: 100%;" id="listeCarte">
                <thead>
                <tr>
                    <td>Date</td>
                    <td>Numero Carte</td>
                    <td>Societe</td>
                    <td>ID Vehicule</td>
                    <td>Date acquisition</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($cartes as $carte)
                    <tr>
                        <td>{{$carte->date}}</td>
                        <td>{{$carte->numeroCarte}}</td>
                        <td>{{$carte->societe}}</td>
                        <td>{{$carte->idVehicule}}</td>
                        <td>{{$carte->dateAquisition}}</td>
                        <td>
                            <div class="two-columns">
                                <div>
                                    <a href="{{ route('carte-carburant.edit', $carte->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                </div>
                                <div>
                                    <form action="{{ route('carte-carburant.destroy', $carte->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                                    </form>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-3">
            <br />
            <br />
            <br />
            <br />
            <a href="javascript:popupwnd('carte-carburant','no','no','no','yes','yes','no','','','1200','600')"
               target="_self"
               class="btn btn-primary btn-sm">Nouveau</a>
        </div>
    </div>
    <br />
    <br />

    <div class="row">
        <div class="col-9">
            <h5>Chargement</h5><br />
            <table class="table table-bordered" id="liste">
                <thead>
                <th>ID Carte</th>
                <th>Date</th>
                <th>Somme</th>
                <th>Service</th>
                <th>Actions</th>
                </thead>
                <tbody>
                @foreach ($chargements as $chargement)
                <tr>
                    <td>{{$chargement->carte}}</td>
                    <td>{{$chargement->date}}</td>
                    <td>{{$chargement->somme}}</td>
                    <td>{{$chargement->service}}</td>
                    <td>
                        <div class="two-columns">
                            <div>
                                <a href="{{ route('carb-chargement-ticket.edit', $chargement->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                            </div>
                            <div>
                                <form action="{{ route('carb-chargement-ticket.destroy', $chargement->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                                </form>
                            </div>
                        </div>

                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br />
    <br />
</div>
<script>
    $(document).ready(function () {
        $('#liste').DataTable({
            "language": {
                "url": "French.json"
            }
        });
    });
    $(document).ready(function () {
        $('#listeCarte').DataTable({
            "language": {
                "url": "French.json"
            }
        });
    });
    $(document).ready(function () {
        $('#listeTransport').DataTable({
            "language": {
                "url": "French.json"
            }
        });
    });
</script>
@endsection
