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
            <h2>Option catégorie informatique</h2>
            <br>

            <div class="row">
                <div class="col-4">
                    <form action="/parametres-option-categorie-informatique" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-4">Catégorie</label>
                            <input type="text" name="option" id="option" class="col-8 form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-primary">Enregistrer</button>
                        </div>

                    </form>
                </div>
                <div class="col-8">
                    <table id="table" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Catégorie</th>
                            <th class="col-1"></th>
                            <th class="col-1"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($options as $option)
                            <tr>
                                <td>{{$option->categorie}}</td>
                                <td><a class="btn btn-success btn-sm" href="/parametres-option-libelle-informatique/{{$option->id}}"></a></td>
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
                    url: "/parametres-option-secteur-activite/" + id,
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
