@extends('bases.regulation')

@section('main')
    @extends('bases.toolbar', ["title" => "Regulation", "subTitle" => "Etat de Stock"])
    <div class="burval-container">
        <div><h2 class="heading">ETAT DE STOCK</h2></div>
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
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                <th>Libellé</th>
                <th>Appro stock</th>
                <th>stock sortir Burval</th>
                <th>Stock sortie facture</th>
                <th>Quantité en stock</th>
            </tr>
            </thead>
            <tbody>
            @foreach($stocks as $stock)
                <tr>
                    <td>{{$stock['libelle']}}</td>
                    <td>{{$stock['appro']}}</td>
                    <td>{{$stock['sortie']}}</td>
                    <td>{{$stock['facture']}}</td>
                    <td class="text-danger" style="font-size: 18px;">{{$stock['restant']}}</td>
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
