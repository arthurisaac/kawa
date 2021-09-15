@extends("base")

@section("main")
    <div class="container">
        <br>
        <h2 class="heading">Départ site</h2>
        <a href="/maincourante-departsiteliste">Liste depart site</a>

        <br>
        <br>
        <form method="post" action="/maincourante-departsite/{{$site->id}}" id="departSite" novalidate>
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-6">Heure de départ</label>
                        <input type="time" name="heureDepart" value="{{$site->heureDepart}}"
                               class="form-control col-sm-6"/>
                    </div>
                    <div class="form-group row">
                        <label id="km_depart" class="col-sm-6">Kilométrage de depart</label>
                        <input type="number" name="kmDepart" id="kmDepart" value="{{$site->kmDepart}}"
                               class="form-control col-sm-6"/>
                    </div>
                </div>
                <div class="col"></div>
                <div class="col"></div>
            </div>

            <div>
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-sm-6">Date départ site</label>
                            <input type="date" class="form-control col-sm-6" name="departSite"
                                   value="{{$site->depart_site}}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6">Destination</label>
                            <input type="text" class="form-control col-sm-6" name="destination"
                                   value="{{$site->destination}}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6">Observation</label>
                            <textarea class="form-control col-sm-6" name="observation">{{$site->observation}}</textarea>
                        </div>
                        <div class="row">
                            <button class="btn btn-primary btn-sm" type="submit" id="dsSubmit">Enregistrer
                            </button>
                        </div>
                    </div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
                <br/>
            </div>
        </form>
    </div>


    <script>
        $(document).ready(function () {
            $('#listeDepartSite').DataTable({
                "order": [[0, "desc"]],
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
                    url: "maincourante-departsite/" + id,
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
                }).done(function () {
                    // TODO hide loader
                });


            }

        }
    </script>
@endsection
