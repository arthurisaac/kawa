@extends("base")

@section("main")
    <div class="container">
        <br>
        <div><h2 class="heading">Départ site</h2></div>
        <br>
        <table class="table table-bordered" style="width: 100%;" id="listeDepartSite">
            <thead>
            <tr>
                <th>SITE</th>
                <th>Date</th>
                <th>Heure de départ</th>
                {{--<th>Type colis</th>
                <th>Nombre de colis</th>
                <th>N° Sécuripack</th>--}}
                <th>Destination</th>
                <th>Observation</th>
                {{-- <th>Nombre de colis</th>
                 <th>Numéro sécuripack</th>--}}
                <th>Numéro bordereau</th>
                <th>Kilométrage départ</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($departSites as $depart)
                <tr>
                    <td>{{$depart->site}}</td>
                    {{--<td>{{$depart->sites->site}}</td>--}}
                    <td>{{date('d-m-Y', strtotime($depart->tournees->date ?? ""))}}</td>
                    <td>{{$depart->heureDepart}}</td>
                    {{--<td></td>
                    <td></td>
                    <td></td>--}}
                    <td>{{$depart->destination}}</td>
                    <td>{{$depart->observation}}</td>
                    {{--<td></td>
                    <td></td>--}}
                    <td>{{$depart->bordereau}}</td>
                    <td>{{$depart->kmDepart}}</td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>


    <script>
        $(document).ready(function () {
            $('#listeDepartSite').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        });
    </script>
@endsection
