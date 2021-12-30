@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">GESTION DE CF</h2></div>
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

        <div class="titre">
            <span>Total montant entré CF</span> : <span id="total_montant_entre" class="text-danger">{{$stockClients->sum("montantEntree")}}</span><br>
            <span>Total montant sorti CF</span> : <span id="total_montant_sorti" class="text-danger">{{$stockClients->sum("montantSorti")}}</span><br>
            <span>Total montant restant : <span class="text-danger">{{$stockClients->sum("montantEntree") - $stockClients->sum("montantSorti")}}</span></span>
        </div>
        <br/>
        {{--<form action="#" method="get">
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
                <div class="col"></div>
                <div class="col"></div>
            </div>
            <div class="row">
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
            </div>
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
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($stockClients as $stock)
                <tr>
                    <td>{{$stock->client_nom}}</td>
                    <td>{{$stock->montantEntree ?? 0}}</td>
                    <td>{{$stock->montantSorti ?? 0}}</td>
                    <td>{{$stock->montantEntree - $stock->montantSorti}}</td>
                    <td><a href="/regulation-gestion-client-stock/{{$stock->id}}" class="btn btn-sm btn-info"></a></td>
                </tr>
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

            const clientInput = $("#client");
            if (clientInput.val()) {
                const client = clients.find(s => s.id === parseInt(clientInput.val() ?? 0));
                if (client) $("select[name='client'] option[value="+ client?.id +"]").attr('selected','selected');
            }
        });
    </script>
@endsection
