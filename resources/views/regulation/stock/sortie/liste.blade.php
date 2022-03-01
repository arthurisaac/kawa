@extends('bases.regulation')

@section('main')
    @extends('bases.toolbar', ["title" => "Régulation", "subTitle" => "Sortie stock liste"])
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
        <div class="row">
            <div class="col">
                <form action="#" method="get">
                    @csrf
                    <div class="card card-xl-stretch">
                        <div class="card-header border-0 py-5 bg-gradient-kawa">
                            <div class="card-title fw-bolder">
                                Filtre de recherche service
                            </div>
                        </div>
                        <div class="card-body bg-card-kawa pt-2">
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date début</label>
                                        <input type="date" name="debut" class="form-control col-sm-7">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date fin</label>
                                        <input type="date" name="fin" class="form-control col-sm-7">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="/regulation-stock-sortie-liste" class="btn btn-danger btn-sm">Effacer</a>
                        <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                        <a href="/regulation-stock-sortie" class="btn btn-info btn-sm">Nouveau</a>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" id="liste">
            <thead>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                <th>ID</th>
                <th>Date sortie</th>
                <th>Centre régional</th>
                <th>Centre</th>
                <th>Service</th>
                <th>Receveur</th>
                <th>Libelle</th>
                <th>Quantité sortie</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($stocks as $stock)
                <tr>
                    <td>{{$stock->id}}</td>
                    <td>{{$stock->date}}</td>
                    <td>{{$stock->centre_regional}}</td>
                    <td>{{$stock->centre}}</td>
                    <td>{{$stock->service}}</td>
                    <td>{{$stock->receveur}}</td>
                    <td>
                        @foreach($stock->items as $item)
                            {{$item->libelle}} //
                        @endforeach
                    </td>
                    <td>{{$stock->items->sum("qte_sortie")}}</td>
                    <td>
                        <a href="regulation-stock-sortie/{{$stock->id}}/edit" class="btn btn-primary btn-sm"></a>
                        <a class="btn btn-danger btn-sm" onclick="supprimer('{{$stock->id}}', this)"></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function supprimer(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "regulation-stock-sortie/" + id,
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
                    error: function () {
                        alert("Une erreur s'est produite");
                    }
                });
            }
        }
    </script>
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
