@extends('base')

@section('main')
    <style>
        .dataTables_filter, .dataTables_info {
            display: none;
        }
    </style>
    <div class="burval-container">
        <div><h2 class="heading">Liste appro carburant</h2></div>
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


        <h6 class="text-lg-right text-secondary">TOTAL: <span
                class="montantTotal text-danger">{{$carburants->sum('soldePrecedent')}}</span></h6>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <form action="#" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group row">
                                <label for="" class="col-sm-5">Date début</label>
                                <input type="date" name="debut" class="form-control col-sm-7">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group row">
                                <label for="" class="col-sm-5">Date fin</label>
                                <input type="date" name="fin" class="form-control col-sm-7">
                            </div>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary btn-sm">Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col"></div>

        </div>
        <form action="#" method="get">
            @csrf
            <div class="row">
                <div class="col"></div>
                <div class="col-4">
                    <div class="form-group row">
                        <label class="col">Rechercher</label>
                        <input type="text" name="q" id="searchInput" class="form-control col-sm-8">
                    </div>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary btn-sm">Rechercher</button>
                </div>
            </div>
        </form>

        <a href="/ticket-carburant" class="btn btn-info btn-sm">Nouveau</a>
        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%" id="liste">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Centre</th>
                        <th>Centre régional</th>
                        <th>Numero Ticket</th>
                        <th>N° Carte Carburant</th>
                        <th>Immatriculation</th>
                        <th>Montant</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($carburants as $carburant)
                        <tr>
                            <td>{{$carburant->date}}</td>
                            <td>{{$carburant->heure}}</td>
                            <td>{{$carburant->centre}}</td>
                            <td>{{$carburant->centre_regional}}</td>
                            <td>{{$carburant->numeroTicket}}</td>
                            <td>{{$carburant->numeroCarteCarburant}}</td>
                            <td>{{$carburant->vehicules->immatriculation ?? ''}}</td>
                            <td class="montant">{{$carburant->soldePrecedent}}</td>
                            <td><a href="{{route('ticket-carburant.edit', $carburant->id)}}"
                                   class="btn btn-primary btn-sm"></a>
                                <button class="btn btn-danger btn-sm"
                                        onclick="supprimer('{{$carburant->id}}', this)"></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            const table = $('#liste').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
            /*$('#searchInput').keyup(function () {
                table.search($(this).val()).draw();
            })*/

        });
    </script>
    <script>
        function supprimer(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "/ticket-carburant/" + id,
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
                        document.getElementById("liste").deleteRow(indexLigne);
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
