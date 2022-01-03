@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">GESTION DE CF : <span id="client_nom"></span></h2></div>
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

        @if(!empty($stockClients))
            <div class="titre">
                <span>Total montant entré CF</span> : <span id="total_montant_entre"
                                                            class="text-danger">{{$stockClients->sum("regulation_arrivee_valeur_colis")}}</span><br>
                <span>Total montant sorti CF</span> : <span id="total_montant_sorti"
                                                            class="text-danger">{{--{{$stockClients->where("type", "=", "Dépôt / R")->sum("regulation_depart_valeur_colis")}}--}} {{$stockClients->sum("regulation_depart_valeur_colis")}}</span><br>
                <span>Total montant restant : <span
                        class="text-danger">{{$stockClients->sum("regulation_arrivee_valeur_colis") - $stockClients->sum("regulation_depart_valeur_colis")/*($stockClients->where("type", "=", "Dépôt / R")->sum("regulation_depart_valeur_colis"))*/}}</span></span>
            </div>
        @endif
        <br/>
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
                    {{--<div class="form-group row">
                        <label for="client" class="col-5">Clients</label>
                        <select id="client" name="client" class="form-control col">
                            <option>{{$client}}</option>
                            @foreach ($clients as $client)
                                <option value="{{$client->id}}">{{ $client->client_nom }}</option>
                            @endforeach
                        </select>
                    </div>--}}
                    <div class="form-group row">
                        <label for="" class="col-5">Date début</label>
                        <input type="date" name="debut" class="form-control col-7" value="{{$debut}}">
                    </div>
                </div>
                <div class="col">
                    {{--<div class="form-group row">
                        <label for="site" class="col-5">Site</label>
                        <select id="site" name="site" class="form-control col">
                            <option>{{$site}}</option>
                            @foreach ($sites as $site)
                                <option value="{{$site->id}}">{{ $site->site }}</option>
                            @endforeach
                        </select>
                    </div>--}}
                    <div class="form-group row">
                        <label for="" class="col-5">Date fin</label>
                        <input type="date" name="fin" class="form-control col-sm-7" value="{{$fin}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                </div>
                <div class="col">

                </div>
                <div class="col"></div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col text-right">
                    <a href="/regulation-gestion-stock" class="btn btn-sm btn-dark">Retour</a>
                    <a href="/regulation-gestion-client-stock/{{$id}}" class="btn btn-info btn-sm">Effacer</a>
                    <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                </div>
            </div>
        </form>
        <br>
        <table class="table table-bordered" id="liste">
            <thead>
            <tr>
                <th>Sites</th>
                <th>Tournées</th>
                <th>Centre</th>
                <th>Centre régional</th>
                <th>Date</th>
                <th>Montant entrée au CF</th>
                <th>Montant sorti du CF</th>
            </tr>
            </thead>
            <tbody>
            @foreach($stockClients as $stock)
                @if ($stock->regulation_arrivee_valeur_colis - $stock->regulation_depart_valeur_colis != 0)
                    <tr>
                        <td>{{$stock->sites->site ?? ""}}</td>
                        <td>{{$stock->tournees->numeroTournee ?? ""}}</td>
                        <td>{{$stock->tournees->centre ?? ""}}</td>
                        <td>{{$stock->tournees->centre_regional ?? ""}}</td>
                        <td>{{$stock->tournees->date ?? ""}}</td>
                        <td>{{$stock->regulation_arrivee_valeur_colis}}</td>
                        <td>{{$stock->regulation_depart_valeur_colis ?? 0}}</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
        let sites = @json($sites);
        let clients = @json($clients);
        $(document).ready(function () {
            $('#liste').DataTable({
                "language": {
                    "url": "French.json"
                }
            });

            const clientValue = {{$client}};
            const client = clients.find(s => s.id === parseInt(clientValue ?? 0));
            if (client) $("#client_nom").text(client.client_nom);

            const clientInput = $("#client");
            if (clientInput.val()) {
                const client = clients.find(s => s.id === parseInt(clientInput.val() ?? 0));
                if (client) $("select[name='client'] option[value=" + client?.id + "]").attr('selected', 'selected');
            }
        });
    </script>
@endsection
