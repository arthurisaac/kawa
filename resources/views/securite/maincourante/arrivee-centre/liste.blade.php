@extends("base")

@section("main")
    <div class="container">
        <br>
        <div><h2 class="heading">Arrivee centre</h2></div>
        <br>
        <table class="table table-bordered" style="width: 100%;" id="listeArriveeCentre">
            <thead>
            <tr>
                <th>N°Tournée</th>
                <th>Date</th>
                <th>Heure arrivée</th>
                <th>Km arrivé</th>
                <th>Observation</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($arriveeCentres as $centre)
                <tr>
                    <td>{{$centre->tournees->numeroTournee}}</td>
                    <td>{{$centre->tournees->date}}</td>
                    <td>{{$centre->heureArrivee}}</td>
                    <td>{{$centre->kmArrive}}</td>
                    <td>{{$centre->observation}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <script>
        $(document).ready(function () {
            $('#listeArriveeCentre').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        });
    </script>
@endsection
