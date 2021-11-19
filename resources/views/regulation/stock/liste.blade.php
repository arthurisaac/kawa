@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Stock appro</h2></div>
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
                <th>Libellé</th>
                <th>Appro stock</th>
                <th>stock sortir Burval</th>
                <th>Stock sortie facture</th>
                <th>Stock restant</th>
            </tr>
            </thead>
            <tbody>
            @foreach($stocks as $stock)
                <tr>
                    <td>{{$stock['libelle']}}</td>
                    <td>{{$stock['appro']}}</td>
                    <td>{{$stock['sortie']}}</td>
                    <td>{{$stock['facture']}}</td>
                    <td>{{$stock['restant']}}</td>
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
