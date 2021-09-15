@extends("base")

@section("main")
    <div class="container">
        <br>
        <div><h2 class="heading">Arrivée site</h2></div>
        <br>
        <table class="table table-bordered" id="liste" style="width: 100%">
            <thead>
            <tr>
                <td>N°</td>
                <td>Site</td>
                <td>Date</td>
                <td>Heure</td>
                <!--<td>Code</td>-->
                <td>Km départ</td>
                <td>Observation</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($arriveeSites as $arriveeSite)
                <tr>
                    <td style="width: 20px; text-align: center">{{$arriveeSite->id}}</td>
                    <td>{{$arriveeSite->sites->site ?? "Non précisé"}}</td>
                    <td>{{$arriveeSite->tournees->date ?? $arriveeSite->tournees }}</td>
                    <td>{{$arriveeSite->heureArrivee}}</td>
                    <td>{{$arriveeSite->kmArrivee}}</td>
                    <td>{{$arriveeSite->observation}}</td>
                    <td style="width: 30px; text-align: center;">
                        <a href="/maincourante-arriveesiteliste/{{$arriveeSite->id}}/edit" class="btn btn-sm btn-primary"></a>
                        <button class="btn btn-sm btn-danger" onclick="supprimer('{{$arriveeSite->id}}', this)"></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <script>
        $(document).ready(function () {
            $('#liste').DataTable({
                "order": [[ 0, "desc" ]],
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
                    url: "maincourante-arriveesiteliste/" + id,
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
