@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Sortie colis</h2></div>
        <br/>
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
        <a href="/caisse-sortie-colis" class="btn btn-info btn-sm">Nouveau</a>
        <br>
        <br>
        <form action="#" method="get">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group row">
                        <label for="" class="col-sm-5">Date début</label>
                        <input type="date" name="debut" class="form-control col-sm-7">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="" class="col-sm-5">Date fin</label>
                        <input type="date" name="fin" class="form-control col-sm-7">
                    </div>
                </div>
                <div class="col">
                    <button class="btn btn-primary btn-sm">Rechercher</button>
                </div>
                <div class="col"></div>
            </div>
        </form>
        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Centre régional</th>
                            <th>Centre</th>
                            <th>Nbre Total colis</th>
                            <th>Receveur</th>
                            <th>Total valeur colis</th>
                            <th>No Tournee</th>
                            <th>Equipage</th>
                            {{--<td>Montant total</td>--}}
                            <td style="width: 50px;">Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($colis as $coli)
                        <tr>
                            <td>{{$coli->id}}</td>
                            <td>{{$coli->date}}</td>
                            <td>{{$coli->tournees->centre ?? ""}}</td>
                            <td>{{$coli->tournees->centre_regional ?? ""}}</td>
                            <td>{{$coli->items->sum('nbre_colis')}}</td>
                            <td>{{$coli->receveur}}</td>
                            <td>{{$coli->items->sum("valeur")}}</td>
                            <td>{{$coli->tournees->numeroTournee ?? ''}}</td>
                            <td>{{$coli->tournees->chefDeBords->nomPrenoms ?? ""}} //
                                {{$coli->tournees->agentDeGardes->nomPrenoms ?? ""}} //
                                {{$coli->tournees->chauffeurs->nomPrenoms ?? ""}} //</td>
                            <td>
                                <a href="{{ route('caisse-sortie-colis.edit',$coli->id)}}" class="btn btn-primary btn-sm"></a>
                                <a class="btn btn-danger btn-sm" onclick="supprimer('{{$coli->id}}', this)"></a>
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
            $('#liste').DataTable({
                "language": {
                    "url": "French.json"
                },
                "order": [[ 0, "desc" ]]
            });
        });
    </script>
    <script>
        function supprimer(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "caisse-sortie-colis/" + id,
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
                });


            }

        }
    </script>
@endsection
