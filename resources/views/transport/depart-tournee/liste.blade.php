@extends('bases.transport')

@section('main')
    @extends('bases.toolbar', ["title" => "Transport", "subTitle" => "Liste Départ tournée"])
@section("nouveau")
    <a href="/depart-tournee" class="btn btn-sm btn-primary">Nouveau</a>
@endsection
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

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <br>
        <div class="titre">
            <div class="row">
                <div class="col">
                    <form action="#" method="get">
                        @csrf
                        <div class="row">
                            <div class="col-10">
                                <div class="form-group row">
                                    <label for="" class="col-sm-5">Date début</label>
                                    <input type="date" name="debut" class="form-control col-sm-7">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10">
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
                    <span class="text-lg-right">COUT TOTAL TOURNES: <span class="text-danger">{{$departTournee->sum('coutTournee')}}</span></h3>
                </div>
                <div class="col">
                    <span class="text-lg-right">NOMBRE DE TOURNES: <span class="text-danger">{{count($departTournee)}}</span></h3>
                </div>
            </div>
        </div>


        <table class="table table-bordered table-hover" id="table" style="width: 100%">
            <thead>
            <tr>
                <td>Création</td>
                <td>Date</td>
                <td>Centre régional</td>
                <td>Centre</td>
                <td>N°Tournée</td>
                <td>Véhicule</td>
                <td>Equipage</td>
                <td>Km départ</td>
                <td>Heure départ</td>
                <td>Coût tournée</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($departTournee as $depart)
                <tr>
                    <td>{{$depart->created_at}}</td>
                    <td>{{$depart->date}}</td>
                    <td>{{$depart->centre}}</td>
                    <td>{{$depart->centre_regional}}</td>
                    <td>{{$depart->numeroTournee}}</td>
                    <td>{{strtoupper($depart->vehicules->immatriculation) ?? 'vehicule supprimé ' . $depart->idVehicule}}</td>
                    <td>{{$depart->chefDeBords->nomPrenoms ?? ""}} //
                        {{$depart->agentDeGardes->nomPrenoms ?? ""}} //
                        {{$depart->chauffeurs->nomPrenoms ?? ""}} //</td>
                    <td>{{$depart->kmDepart}}</td>
                    <td>{{$depart->heureDepart}}</td>
                    <td>{{$depart->coutTournee}}</td>
                    <td  style="width: 70px;">

                        <div>
                            <a href="{{ route('depart-tournee.edit',$depart->id)}}" class="btn btn-primary btn-sm"></a>
                            <button class="btn btn-danger btn-sm" onclick="supprimer('{{$depart->id}}', this)"></button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <script>
            $(document).ready(function () {
                $('#table').DataTable({
                    "language": {
                        "url": "French.json"
                    },
                    "order": [[ 0, "desc" ]]
                });
            });
        </script>
        <script>
            function supprimer(id, e) {
                if (confirm("Confirmer la suppression?")) {
                    const token = "{{ csrf_token() }}";
                    $.ajax({
                        url: "depart-tournee/" + id,
                        type: 'DELETE',
                        dataType: "JSON",
                        data: {
                            "id": id,
                            _token: token,
                        },
                        success: function (response) {
                            console.log(response);
                            alert("Suppression effectuée");
                            const indexLigne = $(e).closest('tr').get(0).rowIndex;
                            document.getElementById("table").deleteRow(indexLigne);
                        },
                        error: function (err) {
                            console.error(err.responseJSON.message);
                            alert(err.responseJSON.message ?? "Une erreur s'est produite");
                        }
                    });
                }
            }
        </script>
@endsection
