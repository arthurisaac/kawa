@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Liste des justifs</h2></div>
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
        <a href="/comptabilite-entree-caisse" class="btn btn-sm btn-info">Ajouter</a>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <h5 class="text-left text-danger">Total: {{$entreeCaisses->sum('somme')}}</h5>
            </div>
            <div class="col"></div>
            <div class="col">
                <form action="#" method="get">
                    @csrf
                    <div class="form-group row">
                        <label for="" class="col-sm-5">Date début</label>
                        <input type="date" name="debut" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-5">Date fin</label>
                        <input type="date" name="fin" class="form-control col">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5" for="mouvement">Mouvement</label>
                        <select id="mouvement" name="mouvement" class="form-control col-sm-7">
                            <option></option>
                            <option>Entrée</option>
                            <option>Sortie</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5" for="service">Service</label>
                        <input id="service" name="service" class="form-control col-sm-7" />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5" for="deposant">Déposant</label>
                        <input id="deposant" name="deposant" class="form-control col-sm-7" />
                    </div>

                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                            <button class="btn btn-primary btn-sm text-right" style="margin-left: 10px;">Rechercher</button>
                        </div>
                    </div>

                    <br>
                </form>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Centre</td>
                            <td>Centre régional</td>
                            <td>Date</td>
                            <td>Receveur</td>
                            <td>Somme sortie</td>
                            <td>Montant justifié</td>
                            <td>Montant non justifié</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($entreeCaisses as $entreeCaisse)
                        <tr>
                            <td>{{$entreeCaisse->id}}</td>
                            <td>{{$entreeCaisse->centre}}</td>
                            <td>{{$entreeCaisse->centre_regional}}</td>
                            <td>{{$entreeCaisse->date}}</td>
                            <td>{{$entreeCaisse->deposant}} {{$entreeCaisse->mouvement}}</td>
                            <td class="somme">{{$entreeCaisse->somme}}</td>
                            <td>{{$entreeCaisse->montant_justifie}}</td>
                            <td>{{$entreeCaisse->montant_non_justifie}}</td>
                            <td>
                                <div class="two-columns">
                                    <div>
                                        <a href="{{ route('comptabilite-entree-caisse.edit', $entreeCaisse->id)}}" class="btn btn-primary btn-sm"></a>
                                    </div>
                                    <div>
                                        <form action="{{ route('comptabilite-entree-caisse.destroy', $entreeCaisse->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit"></button>
                                        </form>
                                    </div>
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
        function totalEntree(){
            let entree = 0;
            let sortie = 0;
            $('tr').each(function () {
                const row = $(this);
                row.find('.somme').each(function () {
                    const somme = $(this).text();
                    console.log('somme', somme);
                    row.find('.mouvement').each(function () {
                        console.log('mouvement', $(this).text());
                        if ($(this).text() === 'Entrée') {
                            if (!isNaN(somme) && somme.length !== 0) {
                                entree += parseFloat(somme);
                            }
                        } else if ($(this).text() === 'Sortie') {
                            if (!isNaN(somme) && somme.length !== 0) {
                                sortie += parseFloat(somme);
                            }
                        }
                    });
                });
            });
            $("#totalEntree").html(entree);
            $("#totalSortie").html(sortie);
        }
        $(document).ready(function () {
            $('#liste').DataTable({
                "language": {
                    "url": "French.json"
                },
                "order": [[ 0, "desc" ]]
            });
        });
    </script>
@endsection
