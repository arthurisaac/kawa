@extends('bases.regulation')

@section('main')
    @extends('bases.toolbar', ["title" => "Regulation", "subTitle" => "Gestion de CF"])
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
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

            <div class="row">
                <!--begin::List Widget 2-->
                <div class="card card-xl-stretch mb-xxl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0 bg-gradient-kawa">
                        <h3 class="card-title fw-bolder text-dark">Résultats</h3>
                    </div>
                    <div class="card-body bg-card-kawa pt-2">
                        <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">
                            <!--begin::Icon-->
                            <span class="svg-icon svg-icon-warning me-5">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                             height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                              d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                              fill="black"></path>
                                        <path
                                            d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                            fill="black"></path>
                                    </svg>
                                </span>
                            </span>
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Total montant entré CF :</a>
                                <h1 class="text-danger chiffreAffaire" id="chiffreAffaire">{{$totalMontantEntree}}</h1>
                                <span class="text-muted fw-bold d-block"></span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">
                            <!--begin::Icon-->
                            <span class="svg-icon svg-icon-warning me-5">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                             height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                              d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                              fill="black"></path>
                                        <path
                                            d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                            fill="black"></path>
                                    </svg>
                                </span>
                            </span>
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Total montant sorti CF  :</a>
                                <h1 class="text-danger chiffreAffaire" id="chiffreAffaire">{{$totalMontantSortie}}</h1>
                                <span class="text-muted fw-bold d-block"></span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-light-info rounded p-5 mb-7">
                            <!--begin::Icon-->
                            <span class="svg-icon svg-icon-info me-5">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                         height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3"
                                          d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                          fill="black"></path>
                                    <path
                                        d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                        fill="black"></path>
                                </svg>
                            </span>
                        </span>

                            <div class="flex-grow-1 me-2">
                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Total montant restant :</a>
                                <h1 class="fw-bolder text-danger py-1">{{$totalMontantSortie - $totalMontantEntree}}</h1>
                                <span class="text-muted fw-bold d-block"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--        <div class="titre">--}}
{{--            <span>Total montant entré CF</span> : <span id="total_montant_entre"--}}
{{--                                                        class="text-danger">--}}
{{--                {{$totalMontantEntree}}--}}
{{--            </span><br>--}}
{{--            <span>Total montant sorti CF</span> : <span id="total_montant_sorti"--}}
{{--                                                        class="text-danger">--}}
{{--                {{$totalMontantSortie}}--}}
{{--            </span><br>--}}
{{--            <span>Total montant restant : <span--}}
{{--                    class="text-danger">{{$totalMontantSortie - $totalMontantEntree}}</span></span>--}}
{{--        </div>--}}
{{--        <br/>--}}
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
