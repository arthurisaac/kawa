@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Confirmation clients</h2></div>
        <br/>
        @php
            $totalColis = 0;
            foreach ($regulations as $regulation) {
                $totalColis += $regulation->site->regulation_arrivee_valeur_colis;
            }
        @endphp
        <div class="titre"><span class="titre">TOTAL VALEUR COLIS</span> :
            <span class="text-danger">{{$totalColis}}</span>
        </div>
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

        <br>
        <a href="/regulation-confirmation" class="btn btn-info btn-sm">Nouveau</a>
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
                        <label for="client" class="col-5">Clients</label>
                        <select id="client" name="client" class="form-control col">
                            <option>{{$client}}</option>
                            @foreach ($clients_com as $clt)
                                <option value="{{$clt->id}}">{{ $clt->client_nom }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="site" class="col-5">Site</label>
                        <select id="site" name="site" class="form-control col">
                            <option>{{$site}}</option>
                            @foreach ($sites_com as $site)
                                <option value="{{$site->id}}">{{ $site->site }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
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
                <div class="col text-right">
                    <a href="/regulation-confirmation-liste" class="btn btn-info btn-sm">Effacer</a>
                    <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                </div>
            </div>
        </form>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                    <tr>
                        <td>N°</td>
                        <td>Centre</td>
                        <td>Centre régional</td>
                        <td>N°Bordereau</td>
                        <td>Montant (Valeur Colis)</td>
                        <td>Devise</td>
                        {{--                        <td>Device etrangere (EURO)</td>--}}
                        {{--                        <td>Pierre précieuse</td>--}}
                        <td>Scellé</td>
                        <td>Client</td>
                        <td>Nom destinataire</td>
                        <td>Date de reception</td>
                        <td>Destinataire/Banque</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($regulations as $regulation)
                        <tr>
                            <td>{{$regulation->id}}</td>
                            <td>{{$regulation->site->tournees->centre ?? ''}}</td>
                            <td>{{$regulation->site->tournees->centre_regional ?? ''}}</td>
                            <td>{{$regulation->site->bordereau ?? ''}}</td>
                            {{--<td>{{$regulation->site->valeur_colis_xof_arrivee ?? ''}}</td>--}}
                            <td>{{$regulation->site->regulation_arrivee_valeur_colis ?? ''}}</td>
                            <td>{{$regulation->devise ?? ''}}</td>
                            {{--                            <td>{{$regulation->site->device_etrangere_euro_arrivee ?? ''}}</td>--}}
                            {{--                            <td>{{$regulation->site->pierre_precieuse_arrivee ?? ''}}</td>--}}
                            <td>{{$regulation->site->numero ?? ''}}</td>
                            <td>{{$regulation->site->sites->clients->client_nom ?? ''}}</td>
                            <td>{{$regulation->site->sites->site ?? 'inconnu'}}</td>
                            <td>{{$regulation->dateReception}}</td>
                            <td>{{$regulation->lieu}}</td>
                            <td>
                                <a href="{{ route('regulation-confirmation.edit',$regulation->id)}}"
                                   class="btn btn-primary btn-sm"></a>
                                <form action="{{ route('regulation-confirmation.destroy', $regulation->id)}}"
                                      method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit"></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script>
        let sites = {!! json_encode($sites_com) !!};
        let clients = {!! json_encode($clients_com) !!};
        $(document).ready(function () {
            $('#liste').DataTable({
                "language": {
                    "url": "French.json"
                }
            });

            const siteInput = $("#site");
            if (siteInput.val()) {
                const site = sites.find(s => s.id === parseInt(siteInput.val() ?? 0));
                if (site) $("select[name='site'] option[value=" + site?.id + "]").attr('selected', 'selected');
            }
            const clientInput = $("#client");
            if (clientInput.val()) {
                const client = clients.find(s => s.id === parseInt(clientInput.val() ?? 0));
                if (client) $("select[name='client'] option[value=" + client?.id + "]").attr('selected', 'selected');
            }
        });
    </script>
@endsection
