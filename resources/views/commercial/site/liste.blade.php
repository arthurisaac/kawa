@extends('bases.commercial')

@section('main')
    @extends('bases.toolbar', ["title" => "Commercial", "subTitle" => "Site Liste"])
@section("nouveau")
    <a href="/commercial-site" class="btn btn-sm btn-primary">Nouveau</a>
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
        <br/>
        <div class="card card-xl-stretch">
            <table id="table_client_information" class="table table-striped gy-7 gs-7 pt-0" style="width: 100%">
                <thead>
                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                    <td>Centre régional</td>
                    <td>Centre</td>
                    <td>Client</td>
                    <td>Site</td>
                    <td>Centre</td>
                    <td>Téléphone</td>
                    <td>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($sites as $site)
                    <tr>
                        <td>{{$site->centre_regional}}</td>
                        <td>{{$site->centre}}</td>
                        <td>{{$site->clients->client_nom ?? "Client inexistant"}}</td>
                        <td>{{$site->site}}</td>
                        <td>{{$site->centre}}</td>
                        <td>{{$site->telephone}}</td>
                        <td>
                            <a href="{{ route('commercial-site.edit', $site->id)}}" class="btn btn-primary btn-sm"></a>
                            <a onclick="supprimer('{{$site->id}}', this)" class="btn btn-danger btn-sm"
                               type="submit"></a>
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
        $('#table_client_information').DataTable({
            "language": {
                "url": "../French.json"
            }
        });
    });
</script>

<script>
    function supprimer(id, e) {
        if (confirm("Confirmer la suppression?")) {
            const token = "{{ csrf_token() }}";
            $.ajax({
                url: "commercial-site/" + id,
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
                    document.getElementById("table_client_information").deleteRow(indexLigne);
                },
                error: function (xhr) {
                    alert("Une erreur s'est produite");
                }
            }).done(function () {
                // TODO hide loader
            });


        }

    }
</script>
@endsection
