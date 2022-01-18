@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Liste personnel</h2></div>
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
        <div class="titre">
            <span class="titre">TOTAL PERSONNEL</span> : <span class="text-danger">{{count($personnels)}}</span>
        </div>
        <br>
        <form action="#" method="get">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="centre" class="col-5">Centre Régional</label>
                        <select name="centre" id="centre" class="form-control col">
                            <option>{{$centre}}</option>
                            @foreach ($centres as $centre)
                                <option value="{{$centre->centre}}">{{ $centre->centre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="centre_regional" class="col-5">Centre</label>
                        <select id="centre_regional" name="centre_regional" class="form-control col">
                            <option>{{$centre_regional}}</option>
                            @foreach ($centres_regionaux as $centre)
                                <option value="{{$centre->centre_regional}}">{{ $centre->centre_regional }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="fonction" class="col-5">Fonction</label>
                        <input id="fonction" name="fonction" class="form-control col" value="{{$fonction}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="service" class="col-5">Service</label>
                        <input id="service" name="service" class="form-control col" value="{{$service}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="nature" class="col-5">Nature contrat</label>
                        <input id="nature" type="text" name="nature" class="form-control col-7" value="{{$nature}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="situation_matrimonial" class="col-5">Situation matrimonial</label>
                        <input id="situation_matrimonial" type="text" name="situation_matrimonial" class="form-control col-7" value="{{$nature}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row"></div>
                </div>
                <div class="col">
                    <div class="form-group row"></div>
                </div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col text-right">
                    <a href="/personnel-liste-detaillee" class="btn btn-info btn-sm">Effacer</a> <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                    <tr>
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
                                        onclick="supprimer({{$personnel->id}}, this)"></button>
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
