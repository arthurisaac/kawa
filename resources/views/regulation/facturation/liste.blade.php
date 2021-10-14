@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Facturation</h2></div>
        <br/>
        <a href="/regulation-facturation" class="btn btn-primary btn-sm">Nouvelle facture</a>
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

        <a href="/regulation-facturation-liste" class="btn btn-info btn-sm">Nouveau</a>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Centre régional</td>
                        <td>Centre</td>
                        <td>DATE Fact</td>
                        <td>Type Facture</td>
                        <td>Client</td>
                        <td>Montant total</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($regulations as $regulation)
                        <tr>
                            <td>{{$regulation->date}}</td>
                            <td>{{$regulation->centre_regional}}</td>
                            <td>{{$regulation->centre}}</td>
                            <td>{{$regulation->date}}</td>
                            <td>{{$regulation->type}}</td>
                            <td>{{$regulation->client}}</td>
                            <td>{{$regulation->montantTotal}}</td>
                            <td>
                                <a href="{{ route('personnel.edit',$regulation->id)}}"
                                   class="btn btn-primary btn-sm"></a>
                                <a class="btn btn-danger btn-sm"
                                        onclick="supprimer('{{$regulation->id}}', this)"></a>
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
            $('#liste').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        });
    </script>
    <script>
        function supprimer(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "regulation-facturation/" + id,
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
@endsection
