@extends("base")

@section("main")
    <div class="container">
        <br>
        <div><h2 class="heading">Arrivée site</h2></div>
        <br>
        <table class="table table-bordered" id="listeArriveeSite" style="width: 100%">
            <thead>
            <tr>
                <td>Site</td>
                <td>Date</td>
                <td>Heure</td>
                <!--<td>Code</td>-->
                <td>Km départ</td>
                <td>Observation</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($arriveeSites as $arriveeSite)
                <tr>
                    <td>{{$arriveeSite->sites->site ?? "Non précisé"}}</td>
                    <td>{{$arriveeSite->tournees->date ?? $arriveeSite->tournees }}</td>
                    <td>{{$arriveeSite->heureArrivee}}</td>
                    <td>{{$arriveeSite->kmArrivee}}</td>
                    <td>{{$arriveeSite->observation}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <script>
        $(document).ready(function () {
            $('#listeArriveeSite').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        });
    </script>
@endsection
