@extends("base")

@section("main")
    <div class="container">
        <br>
        <br>
        <table class="table table-bordered" id="listeDepartCentre">
            <thead>
            <tr>
                <td>N°Tournée</td>
                <td>Date</td>
                <td>Heure</td>
                <td>Km départ</td>
                <td>Niveau carburant</td>
                <td>Observation</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($departCentres as $centre)
                <tr>
                    <td>{{$centre->tournees->numeroTournee}}</td>
                    <td>{{date('d/m/Y', strtotime($centre->date))}}</td>
                    <td>{{$centre->heureDepart}}</td>
                    <td>{{$centre->kmDepart}}</td>
                    <td>{{$centre->niveauCarburant}}</td>
                    <td>{{$centre->observation}}</td>
                    <td>
                        <a href="maincourante-departsite/{{$centre->id}}/edit" class="btn btn-primary btn-sm"></a>
                        <a class="btn btn-danger btn-sm" onclick="supprimer('{{$centre->id}}', this)"></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
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
