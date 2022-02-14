@extends('bases.rh')

@section('main')
    @extends('bases.toolbar', ["title" => "RH", "subTitle" => "Liste Personnel"])
    <div class="burval-container">
        <div><h2 class="heading">Liste personnel</h2></div>
        <br/>
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
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="row">
            <a href="{{route('personnel.index')}}" class="btn btn-primary">Nouveau personnel +</a>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                        <td>N°</td>
                        <td>Nom et prénom</td>
                        <td>Fonction</td>
                        <td>Service</td>
                        <td>Nature contrat</td>
                        <td>Date d'embauche</td>
                        <td>Situation matrimoniale</td>
                        <td>Centre</td>
                        <td>Centre régional</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($personnels as $personnel)
                        <tr>
                            <td>{{$personnel->id}}</td>
                            <td>{{$personnel->nomPrenoms}}</td>
                            <td>{{$personnel->fonction}}</td>
                            <td>{{$personnel->service}}</td>
                            <td>{{$personnel->natureContrat}}</td>
                            <td>{{$personnel->dateEntreeSociete}}</td>
                            <td>{{$personnel->situationMatrimoniale}}</td>
                            <td>{{$personnel->centre}}</td>
                            <td>{{$personnel->centreRegional}}</td>
                            <td>
                                <a href="{{ route('personnel.edit',$personnel->id)}}"
                                   class="btn btn-primary btn-sm"></a>
                                <button class="btn btn-danger btn-sm"
                                        onclick="supprimer('{{$personnel->id}}', this)"></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br/><br/>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#liste').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        });
        $(document).ready(function () {
            $('#liste2').DataTable({
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
                    url: "personnel/" + id,
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
