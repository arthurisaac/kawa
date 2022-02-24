@extends('bases.transport')

@section('main')
    @extends('bases.toolbar', ["title" => "Transport", "subTitle" => "Liste Arrivée Tournée"])
@section("nouveau")
    <a href="/arrivee-tournee" class="btn btn-sm btn-primary">Nouveau</a>
@endsection
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
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

        <form action="#" method="get">
            @csrf

            <div class="card card-xl-stretch mb-xxl-8">
                <div class="card-body">
                    <div class="row">
                        <div class="d-flex flex-column mb-7 col-md-4 fv-row fv-plugins-icon-container">
                            <label for="" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Date début</label>
                            <input type="date" name="debut" class="form-control col-sm-7">
                        </div>
                        <div class="d-flex flex-column mb-7 col-md-4 fv-row fv-plugins-icon-container">
                            <label for="" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Date fin</label>
                            <input type="date" name="fin" class="form-control col-sm-7">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-sm">Rechercher</button>
                </div>
            </div>
        </form>
        <div class="card card-xl-stretch">
            <table class="table table-bordered table-hover" id="table" style="width: 100%">
                <thead>
                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient-kawa">
                    <td>Création</td>
                    <td>Date</td>
                    <td>Centre régional</td>
                    <td>Centre</td>
                    <td>N°Tournée</td>
                    <td>Véhicule</td>
                    <td>Equipage</td>
                    <td>Km arrivée</td>
                    <td>Heure arrivée</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($departTournee as $depart)
                    <tr>
                        <td>{{$depart->created_at}}</td>
                        <td>{{$depart->date}}</td>
                        <td>{{$depart->centre}}</td>
                        <td>{{$depart->centre_regional}}</td>
                        <td>{{$depart->numeroTournee}}</td>
                        <td>{{strtoupper($depart->vehicules->immatriculation) ?? 'vehicule supprimé ' . $depart->idVehicule}}</td>
                        <td>{{$depart->chefDeBords->nomPrenoms ?? ""}} //
                            {{$depart->agentDeGardes->nomPrenoms ?? ""}} //
                            {{$depart->chauffeurs->nomPrenoms ?? ""}} //
                        </td>
                        <td>{{$depart->kmArrivee}}</td>
                        <td>{{$depart->heureArrivee}}</td>
                        <td style="width: 70px;">
                            <div>
                                <a href="{{ route('arrivee-tournee.edit',$depart->id)}}"
                                   class="btn btn-primary btn-sm"></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#table').DataTable({
            "language": {
                "url": "French.json"
            },
            "order": [[0, "desc"]]
        });
    });
</script>
<script>
    function supprimer(id, e) {
        if (confirm("Confirmer la suppression?")) {
            const token = "{{ csrf_token() }}";
            $.ajax({
                url: "depart-tournee/" + id,
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
                    document.getElementById("table").deleteRow(indexLigne);
                },
                error: function (err) {
                    console.error(err.responseJSON.message);
                    alert(err.responseJSON.message ?? "Une erreur s'est produite");
                }
            });
        }
    }
</script>
@endsection
