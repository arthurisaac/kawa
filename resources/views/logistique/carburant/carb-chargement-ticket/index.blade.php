@extends('bases.carburant')

@section('main')
    @extends('bases.toolbar', ["title" => "Carburant", "subTitle" => "Carburant chargement ticket"])
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
    <br>
            <table class="table table-striped gy-7 gs-7 pt-0" style="width: 100%" id="listeCarte">
                <thead>
                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
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
                        <td>{{$carte->dateAquisition}}</td>
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
            <a href="javascript:popupwnd('carte-carburant','no','no','no','yes','yes','no','','','1200','600')"
               target="_self"
               class="btn btn-primary btn-sm">Nouveau</a>
        </div>
    <br />
    <br />

    <div class="row">
        <div class="col">
            <h5>Chargement</h5><br />
            <table class="table table-striped gy-7 gs-7 pt-0" style="width: 100%" id="liste">
                <thead class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
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

    <div class="row">
        <div class="col">
            <h5>Transport</h5><br />
            <table class="table table-striped gy-7 gs-7 pt-0" style="width: 100%" id="listeTransport">
                <thead class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                <th>N°Ticket</th>
                <th>N°Carte carburant</th>
                <th>Véhicule</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Lieu</th>
                <th>Solde précédent</th>
                <th>Solde</th>
                <th>Actions</th>
                </thead>
                <tbody>
                {{--TODO--}}
                </tbody>
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
