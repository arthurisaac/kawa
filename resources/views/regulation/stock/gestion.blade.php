@extends('bases.regulation')

@section('main')
    @extends('bases.toolbar', ["title" => "Regulation", "subTitle" => "Gestion de CF"])
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

        @php
            $totalMontantEntree = 0;
            $totalMontantSortie = 0;

                foreach ($stockClients as $st) {
                    $entrees = 0;
                    $sorties = 0;
                    foreach($st->sites as $clt)
                        $entrees += $clt->sitesDepart->sum("regulation_arrivee_valeur_colis") ?? 0;

                    foreach($st->sites as $clt)
                            $sorties += $clt->sitesDepart->sum("regulation_depart_valeur_colis") ?? 0;

                    $totalMontantEntree += $entrees;
                    $totalMontantSortie += $sorties;

                }
        @endphp

        <div class="titre">
            <span>Total montant entré CF</span> : <span id="total_montant_entre"
                                                        class="text-danger">
                {{$totalMontantEntree}}
            </span><br>
            <span>Total montant sorti CF</span> : <span id="total_montant_sorti"
                                                        class="text-danger">
                {{$totalMontantSortie}}
            </span><br>
            <span>Total montant restant : <span
                    class="text-danger">{{$totalMontantSortie - $totalMontantEntree}}</span></span>
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
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                <th>Clients</th>
                <th>Montant entrée au CF</th>
                <th>Montant sorti du CF</th>
                <th>Montant disponible au CF</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($stockClients as $stock)
                @php
                    $totalEntree = 0;
                    foreach($stock->sites as $clt)
                        $totalEntree += $clt->sitesDepart->sum("regulation_arrivee_valeur_colis") ?? 0;
                @endphp
                @php
                    $totalSortie = 0;
                    foreach($stock->sites as $clt)
                        $totalSortie += $clt->sitesDepart->sum("regulation_depart_valeur_colis") ?? 0;
                @endphp
                @php
                    $totalEntree = 0;
                    $totalSortie = 0;

                    foreach($stock->sites as $clt)
                        $totalEntree += $clt->sitesDepart->sum("regulation_arrivee_valeur_colis") ?? 0;

                    foreach($stock->sites as $clt)
                        $totalSortie += $clt->sitesDepart->sum("regulation_depart_valeur_colis") ?? 0;
                $disponible = $totalEntree - $totalSortie;
                @endphp
                @if ($disponible != 0)
                    <tr>
                        <td>{{$stock->client_nom}}{{-- @if ($stock->id == 84) {{$stock->sites}} @endif--}}</td>
                        <td>{{$totalEntree}}</td>
                        <td>{{$totalSortie}}</td>
                        <td>{{$disponible}}</td>
                        <td><a href="/regulation-gestion-client-stock/{{$stock->id}}" class="btn btn-sm btn-info">Voir details</a>
                        </td>
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

            const clientInput = $("#client");
            if (clientInput.val()) {
                const client = clients.find(s => s.id === parseInt(clientInput.val() ?? 0));
                if (client) $("select[name='client'] option[value=" + client?.id + "]").attr('selected', 'selected');
            }
        });
    </script>
@endsection
