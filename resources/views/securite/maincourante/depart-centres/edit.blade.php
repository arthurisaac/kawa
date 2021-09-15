@extends("base")

@section("main")
    <div class="container">
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br/>
        @endif

        @if(session()->get('success'))
            <div class="alert alert-success" id="successAlert">
                {{ session()->get('success') }}
            </div>
        @endif
        <br>
        <div class="container-fluid">
            <form method="post" action="/maincourante-departcentre/{{$centre->id}}" novalidate id="departCentre">
                @csrf
                @method('PATCH')

                <input type="hidden" name="maincourante" value="departCentre"/>
                <br/>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group row">
                            <label for="heure_depart" class="col-sm-4">Heure départ</label>
                            <input type="time" name="dcHeureDepart" value="{{$centre->heureDepart}}" class="form-control col-sm-8"/>
                        </div>
                        <div class="form-group row">
                            <label for="km_depart" class="col-sm-4">Km départ</label>
                            <input type="number" name="dcKmDepart" value="{{$centre->kmDepart}}" class="form-control col-sm-8"/>
                        </div>
                        <div class="form-group row">
                            <label for="km_depart" class="col-sm-4">Niveau carburant</label>
                            <input type="number" name="dcNiveauCarburant" value="{{$centre->niveauCarburant}}" class="form-control col-sm-8"/>
                        </div>
                        <div class="form-group row">
                            <label for="observation" class="col-sm-4">Observation:</label>
                            <textarea name="dcObservation" id="dcObservation"
                                      class="form-control col-sm-8">{{$centre->observation}}</textarea>
                        </div>

                        <div class="form-group row">
                            <span class="col-4"></span>
                            <button class="btn btn-sm btn-primary" type="button" id="dcSubmit">Enregistrer
                            </button>
                        </div>

                    </div>
                    <div class="col-8">

                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            $('#listeDepartCentre').DataTable({
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
                    url: "maincourante-departcentre/" + id,
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
