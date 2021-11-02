@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">COLIS ARRIVES TOURNEE</h2></div>
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
                <div class="row">
                    <div class="col">
                        <h6 class="text-lg-right text-secondary">Total colis: {{count($colisArrivees)}}</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h6 class="text-lg-right text-secondary">Total XOF: {{$colisArrivees->sum("valeur_colis_xof_arrivee")}}</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h6 class="text-lg-right text-secondary">Total dollar: {{$colisArrivees->sum("device_etrangere_dollar_arrivee")}}</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h6 class="text-lg-right text-secondary">Total euro: {{$colisArrivees->sum("device_etrangere_euro_arrivee")}}</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h6 class="text-lg-right text-secondary">Total nombre de colis: {{$colisArrivees->sum("nbre_colis_arrivee")}}</h6>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-hover" id="table" style="width: 100%">
            <thead>
            <tr>
                <td>N°</td>
                <td>Centre régional</td>
                <td>Centre</td>
                <td>Date</td>
                <td>N° Tournée</td>
                <td>Valeur colis (XOF)</td>
                <td>Valeur devise étrangère (Dollar)</td>
                <td>Valeur devise étrangère (Euro)</td>
                <td>Valeur pierre précieuse</td>
                <td>Nombre de colis</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($colisArrivees as $colis)
                <tr>
                    <td>{{$colis->id}}</td>
                    <td>{{$colis->tournees->centre_regional ?? ''}}</td>
                    <td>{{$colis->tournees->centre ?? ''}}</td>
                    <td>{{$colis->tournees->date ?? ''}}</td>
                    <td>{{$colis->tournees->numeroTournee ?? ''}}</td>
                    <td>{{$colis->valeur_colis_xof_arrivee}}</td>
                    <td>{{$colis->device_etrangere_dollar_arrivee}}</td>
                    <td>{{$colis->device_etrangere_euro_arrivee}}</td>
                    <td>{{$colis->pierre_precieuse_arrivee}}</td>
                    <td>{{$colis->nbre_colis_arrivee}}</td>
                    <td><a href="{{ route('arrivee-tournee.edit',$colis->idTourneeDepart)}}" class="btn btn-primary btn-sm"></a></td>
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
                    "order": [[0, "desc"]]
                });
            });
        </script>
        <script>
            function supprimer(id, e) {
                if (confirm("Confirmer la suppression?")) {
                    const token = "{{ csrf_token() }}";
                    $.ajax({
                        url: "depart-tournee-item/" + id,
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
