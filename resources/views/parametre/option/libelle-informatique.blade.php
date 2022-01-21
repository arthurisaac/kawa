@extends('base')

@section('main')
    <div class="burval-container">
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

        <div class="container-fluid">
            <h2>Option libellé informatique : <span class="text-primary">{{$categorie->categorie}}</span></h2>
            <br>

            <div class="row">
                <div class="col-4">
                    <form action="/parametres-option-libelle-informatique/{{$categorie->id}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="libelle" class="col-4">Libelle</label>
                            <input type="text" name="libelle" id="libelle" class="col-8 form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-primary">Enregistrer</button>
                            <a href="/parametres-option-categorie-informatique" class="btn btn-sm btn-info">Liste des catégories</a>
                        </div>

                    </form>
                </div>
                <div class="col-8">
                    <table id="table" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Libellé</th>
                            <th>Catégorie</th>
                            <th class="col-1"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($options as $option)
                            <tr>
                                <td>{{$option->libelle}}</td>
                                <td>{{$option->categorie->categorie ?? $option->categorie_id}}</td>
                                <td><a class="btn btn-danger btn-sm" onclick="supprimer('{{$option->id}}', this)"></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
    <script>
        function supprimer(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "/parametres-option-libelle-informatique/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        _token: token,
                    },
                    success: function () {
                        alert("Suppression effectuée");
                        const indexLigne = $(e).closest('tr').get(0).rowIndex;
                        document.getElementById("table").deleteRow(indexLigne);
                    },
                    error: function () {
                        alert("Une erreur s'est produite");
                    }
                })


            }

        }
    </script>
@endsection
