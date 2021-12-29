@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">GESTION DE STOCK</h2></div>
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

        {{--<form action="#" method="get">
            @csrf
            <div class="row">
                <div class="col">
                    --}}{{--<div class="form-group row">
                        <label for="centre" class="col-5">Centre Régional</label>
                        <select name="centre" id="centre" class="form-control col">
                        </select>
                    </div>--}}{{--
                </div>
                <div class="col">
                    --}}{{--<div class="form-group row">
                        <label for="centre_regional" class="col-5">Centre</label>
                        <select id="centre_regional" name="centre_regional" class="form-control col">
                        </select>
                    </div>--}}{{--
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="client" class="col-5">Clients</label>
                        <select id="client" name="client" class="form-control col">
                            <option>{{$client}}</option>
                            @foreach ($clients as $client)
                                <option value="{{$client->id}}">{{ $client->client_nom }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    --}}{{--<div class="form-group row">
                        <label for="site" class="col-5">Site</label>
                        <select id="site" name="site" class="form-control col">
                            <option>{{$site}}</option>
                            @foreach ($sites as $site)
                                <option value="{{$site->id}}">{{ $site->site }}</option>
                            @endforeach
                        </select>
                    </div>--}}{{--
                </div>
            </div>
            --}}{{--<div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="" class="col-5">Date début</label>
                        <input type="date" name="debut" class="form-control col-7" value="{{$debut}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="" class="col-5">Date fin</label>
                        <input type="date" name="fin" class="form-control col-sm-7" value="{{$fin}}">
                    </div>
                </div>
                <div class="col"></div>
                <div class="col"></div>
            </div>--}}{{--
            <div class="row">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col text-right">
                    <a href="/regulation-gestion-stock" class="btn btn-info btn-sm">Effacer</a>
                    <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                </div>
            </div>
        </form>--}}
        <br>
        <table class="table table-bordered" id="liste">
            <thead>
            <tr>
                <th>Clients</th>
                <th>Montant entrée au CF</th>
                <th>Montant sorti du CF</th>
                <th>Montant disponible au CF</th>
            </tr>
            </thead>
            <tbody>
            @foreach($stockClients as $stock)
                <tr>
                    <td>{{$stock->client_nom}}</td>
                    <td>{{$stock->montantEntree ?? 0}}</td>
                    <td>{{$stock->montantSorti ?? 0}}</td>
                    <td>{{$stock->montantEntree - $stock->montantSorti}}</td>
                </tr>
            @endforeach
            {{--@foreach($sitesDepart as $site)
                <tr>
                    <td>{{$site->site}}</td>
                    <td>{{$site->tournees->numeroTournee ?? ""}}</td>
                    <td>{{$site->tournees->date ?? ""}}</td>
                    <td>{{$site->regulation_arrivee_valeur_colis ?? 0}}</td>
                    <td>{{$site->regulation_depart_valeur_colis ?? 0}}</td>
                    <td></td>
                </tr>
            @endforeach--}}
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

            const clientInput = $("#client");
            if (clientInput.val()) {
                const client = clients.find(s => s.id === parseInt(clientInput.val() ?? 0));
                if (client) $("select[name='client'] option[value="+ client?.id +"]").attr('selected','selected');
            }
        });
    </script>
@endsection
