@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Entrée colis</h2></div>
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

        <a href="/caisse-entree-colis" class="btn btn-info btn-sm">Nouveau</a>
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
                            <td>Date</td>
                            <td>Centre régional</td>
                            <td>Centre</td>
                            <td>Nbre Total colis</td>
                            <th>Remettant</th>
                            {{--<td>Total valeur colis</td>
                            <td>Total device etrangere (XOF)</td>
                            <td>Total device etrangere (Dollar)</td>
                            <td>Total device etrangere (EURO)</td>--}}
                            <td>No Tournée</td>
                            <td>Equipage</td>
                            {{--<td>Montant total</td>--}}
                            <td style="width: 50px;">Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($colis as $coli)
                        <tr>
                            <td>{{$coli->date}}</td>
                            <td>{{$coli->centre}}</td>
                            <td>{{$coli->centre_regional}}</td>
                            <td>{{$coli->items->sum('nbre_colis')}}</td>
                            <td>{{$coli->remettant}}</td>
                            {{--<td>{{$coli->items->sum("valeur_colis_xof_entree")}}</td>
                            <td>{{$coli->items->sum("device_etrangere_dollar_entree")}}</td>
                            <td>{{$coli->items->sum("device_etrangere_euro_entree")}}</td>
                            <td>{{$coli->items->sum("pierre_precieuse_entree")}}</td>--}}
                            <td>{{$coli->tournees->numeroTournee ?? ''}}</td>
                            <td>{{$coli->tournees->chefDeBords->nomPrenoms ?? ""}} //
                                {{$coli->tournees->agentDeGardes->nomPrenoms ?? ""}} //
                                {{$coli->tournees->chauffeurs->nomPrenoms ?? ""}} //</td>
                            <td>
                                <a href="{{ route('caisse-entree-colis.edit',$coli->id)}}" class="btn btn-primary btn-sm"></a>
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
                }
            });
        });
    </script>
    <script>
        function supprimer(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "caisse-entree-colis/" + id,
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
