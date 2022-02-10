@extends('bases.securite')

@section('main')
    @extends('bases.toolbar', ["title" => "Sécurité", "subTitle" => "Liste Service"])
@section("nouveau")
    <a href="/service" class="btn btn-sm btn-primary">Nouveau</a>
@endsection
    <div class="burval-container">
        <br/>
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
        <a href="/securite-service" class="btn btn-info btn-sm">Nouveau</a>
        <br>
        <br>
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
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered table-hover" id="liste">
                    <thead>
                    <tr>
                        <td>Date</td>
                        <td>Centre</td>
                        <td>Centre Régional</td>
                        <td>Chargé de sécurité</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($securiteServices as $service)
                        <tr>
                            <td>{{$service->date}}</td>
                            <td>{{$service->centre}}</td>
                            <td>{{$service->centreRegional}}</td>
                            <td>{{$service->personnes->nomPrenoms ?? ""}}</td>
                            <td>
                                <a href="{{ route('securite-service.edit',$service->id)}}" class="btn btn-primary btn-sm"></a>
                                <button class="btn btn-danger btn-sm" onclick="supprimer('{{$service->id}}', this)"></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function supprimer(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "securite-service/" + id,
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
                    error: function (xhr) {
                        alert("Une erreur s'est produite");
                    }
                }).done(function () {
                    // TODO hide loader
                });


            }

        }

        $(document).ready(function () {
            $('#liste').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        });
    </script>
@endsection
