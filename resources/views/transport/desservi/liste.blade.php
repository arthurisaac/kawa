@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">LISTE DES SITES DESSERVIS</h2></div>
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
        <br>
        <div class="row">
            <div class="col">
                <form action="#" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-7">
                            <div class="form-group row">
                                <label for="" class="col-sm-5">Date début</label>
                                <input type="date" name="debut" class="form-control col-sm-7">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
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
                 <h3 class="text-lg-right">TOTAL: {{$departTournee->sum('coutTournee')}}</h3>
            </div>
        </div>

        <table class="table table-bordered table-hover" id="table" style="width: 100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Centre régional</th>
                <th>Centre</th>
                <th>N°Tournée</th>
                <th>Véhicule</th>
                <th>Km départ</th>
                <th>Heure départ</th>
                <th>Coût tournée</th>
                <th>TDF</th>
                <th>Montant TDF</th>
                <th>Caisse</th>
                <th>Montant caisse</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($departTournee as $depart)
                <tr>
                    <td>{{$depart->id}}</td>
                    <td>{{$depart->date}}</td>
                    <td>{{$depart->centre}}</td>
                    <td>{{$depart->centre_regional}}</td>
                    <td>{{$depart->numeroTournee}}</td>
                    <td>{{strtoupper($depart->vehicules->immatriculation) ?? 'vehicule supprimé ' . $depart->idVehicule}}</td>
                    <td>{{$depart->kmDepart}}</td>
                    <td>{{$depart->heureDepart}}</td>
                    <td>{{$depart->coutTournee}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
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
                    }).done(function () {
                        // TODO hide loader
                    });
                }
            }
        </script>
@endsection
