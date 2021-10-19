@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Entrée stock</h2></div>
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
        <a href="/regulation-stock-entree" class="btn btn-info btn-sm">Nouveau</a>
        <br>
        <br>
        <table class="table table-bordered" id="liste">
            <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Centre</th>
                <th>Centre regional</th>
                <th>Libelle</th>
                <th>Fournisseur</th>
                <th>Qté entendue</th>
                <th>Qté livrée</th>
                <th>Reste</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($stocks as $stock)
                <tr>
                    <td>{{$stock->id}}</td>
                    <td>{{$stock->date}}</td>
                    <td>{{$stock->centre}}</td>
                    <td>{{$stock->centre_regional}}</td>
                    <td>{{$stock->libelle}}</td>
                    <td>{{$stock->fournisseur}}</td>
                    <td>{{$stock->items->sum('qte_attendu')}}</td>
                    <td>{{$stock->items->sum('qte_livree')}}</td>
                    <td>{{$stock->items->sum('reste')}}</td>
                    <td>
                        <a href="regulation-stock-entree/{{$stock->id}}/edit" class="btn btn-primary btn-sm"></a>
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
                    url: "regulation-stock-entree/" + id,
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
