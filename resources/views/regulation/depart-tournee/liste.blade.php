@extends("bases.regulation")

@section("main")
    @extends('bases.toolbar', ["title" => "Regulation", "subTitle" => "Liste Départ Tournée"])
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
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

            <div class="col">
                <form action="#" method="get">
                @csrf
                <div class="card card-xl-stretch">
                    <div class="card-header border-0 py-5 bg-gradient-kawa">
                        <h3 class="card-title fw-bolder">Option de filtre</h3>
                    </div>
                    <div class="card-body bg-card-kawa pt-5">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date début</label>
                                    <input type="date" name="debut" class="form-control col">
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date fin</label>
                                    <input type="date" name="fin" class="form-control col">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col text-right">
                            <button class="btn btn-primary btn-sm">Rechercher</button>
                            <a href="/regulation-depart-tournee" class="btn btn-info btn-sm">Nouveau</a>
                        </div>
                    </div>
                </div>
            </form>
            </div>
            <table class="table table-bordered" style="width: 100%;" id="liste">
            <thead>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                <td>ID</td>
                <td>Centre régional</td>
                <td>Centre</td>
                <td>Date</td>
                <td>N° Tournée</td>
                <td>Véhicule</td>
                <td>Nbre Total colis</td>
                <td>Equipage</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($tournees as $tournee)
                <tr>
                    <td>{{$tournee->id}}</td>
                    <td>{{$tournee->centre_regional ?? ""}}</td>
                    <td>{{$tournee->centre ?? ""}}</td>
                    <td>{{$tournee->date}}</td>
                    <td>{{$tournee->numeroTournee ?? "Donnée indisponible"}}</td>
                    <td>{{$tournee->vehicules->immatriculation ?? "Donnée indisponible"}}</td>
                    <td>{{$tournee->sites->sum("nbre_colis")}}</td>
                    <td>{{$tournee->chefDeBords->nomPrenoms ?? ""}} //
                        {{$tournee->agentDeGardes->nomPrenoms ?? ""}} //
                        {{$tournee->chauffeurs->nomPrenoms ?? ""}} //
                    </td>
                    <td>
                        <a href="regulation-depart-tournee/{{$tournee->id}}/edit" class="btn btn-sm btn-primary"></a>
                        <a href="" class="btn btn-sm btn-danger" onclick="supprimer('{{$tournee->id}}', this)"></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            $('#liste').DataTable({
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
                    url: "regulation-depart-tournee/" + id,
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
                        document.getElementById("listeDepartCentre").deleteRow(indexLigne);
                    },
                    error: function (xhr) {
                        alert("Une erreur s'est produite");
                    }
                });


            }

        }
    </script>
@endsection
