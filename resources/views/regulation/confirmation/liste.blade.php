@extends('bases.regulation')

@section('main')
    @extends('bases.toolbar', ["title" => "Regulation", "subTitle" => "Confirmation clients"])
    <div class="burval-container">
        <div><h2 class="heading">Confirmation clients</h2></div>
        <br/>
        @php
            $totalColis = 0;
            foreach ($regulations as $regulation) {
                $totalColis += $regulation->site->regulation_arrivee_valeur_colis;
            }
        @endphp
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

        <div class="row gy-5 g-xxl-8">
            <div class="col-xxl-3">
                <!--begin::List Widget 2-->
                <div class="card card-xl-stretch mb-xxl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%);">
                        <h3 class="card-title fw-bolder text-dark">Stats</h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body bg-card-kawa 2">
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
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Icon-->
                            <!--begin::Title-->
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">TOTAL VALEUR COLIS :</a>
                                <span class="text-muted fw-bold d-block"></span>
                            </div>
                            <!--end::Title-->
                            <!--begin::Lable-->
                            <span class="fw-bolder text-danger py-1 totalColis" id="totalColis">{{$totalColis}}</span>
                            <!--end::Lable-->
                        </div>
                        {{--                        <div class="d-flex align-items-center bg-light-info rounded p-5 mb-7">--}}
                        {{--                            <!--begin::Icon-->--}}
                        {{--                            <span class="svg-icon svg-icon-info me-5">--}}
                        {{--                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->--}}
                        {{--                                <span class="svg-icon svg-icon-1">--}}
                        {{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
                        {{--                                         height="24" viewBox="0 0 24 24" fill="none">--}}
                        {{--                                    <path opacity="0.3"--}}
                        {{--                                          d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"--}}
                        {{--                                          fill="black"></path>--}}
                        {{--                                    <path--}}
                        {{--                                        d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"--}}
                        {{--                                        fill="black"></path>--}}
                        {{--                                </svg>--}}
                        {{--                            </span>--}}
                        {{--                                <!--end::Svg Icon-->--}}
                        {{--                        </span>--}}
                        {{--                            <!--end::Icon-->--}}
                        {{--                            <!--begin::Title-->--}}
                        {{--                            <div class="flex-grow-1 me-2">--}}
                        {{--                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Total valeur Colis :</a>--}}
                        {{--                                <span class="text-muted fw-bold d-block"></span>--}}
                        {{--                            </div>--}}
                        {{--                            <!--end::Title-->--}}
                        {{--                            <!--begin::Lable-->--}}
                        {{--                            <span class="fw-bolder text-danger py-1">{{$colisArrivees->sum("regulation_arrivee_valeur_colis")}}</span>--}}
                        {{--                            <!--end::Lable-->--}}
                        {{--                        </div>--}}
                        {{--                        <div class="d-flex align-items-center bg-light-info rounded p-5 mb-7">--}}
                        {{--                            <!--begin::Icon-->--}}
                        {{--                            <span class="svg-icon svg-icon-info me-5">--}}
                        {{--                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->--}}
                        {{--                                    <span class="svg-icon svg-icon-1">--}}
                        {{--                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
                        {{--                                             height="24" viewBox="0 0 24 24" fill="none">--}}
                        {{--                                        <path opacity="0.3"--}}
                        {{--                                              d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"--}}
                        {{--                                              fill="black"></path>--}}
                        {{--                                        <path--}}
                        {{--                                            d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"--}}
                        {{--                                            fill="black"></path>--}}
                        {{--                                    </svg>--}}
                        {{--                                </span>--}}
                        {{--                                <!--end::Svg Icon-->--}}
                        {{--                            </span>--}}
                        {{--                            <!--end::Icon-->--}}
                        {{--                            <!--begin::Title-->--}}
                        {{--                            <div class="flex-grow-1 me-2">--}}
                        {{--                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Nombre de colis :</a>--}}
                        {{--                                <span class="text-muted fw-bold d-block"></span>--}}
                        {{--                            </div>--}}
                        {{--                            <!--end::Title-->--}}
                        {{--                            <!--begin::Lable-->--}}
                        {{--                            <span class="fw-bolder text-danger py-1">{{$colisArrivees->sum("nbre_colis_arrivee")}}</span>--}}
                        {{--                            <!--end::Lable-->--}}
                        {{--                        </div>--}}
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::List Widget 2-->
            </div>
            <div class="col-xxl-9">
                <form action="#" method="get">

                    <div class="card card-xl-stretch">
                        <div class="card-header border-0 py-5 bg-warning">
                            <h3 class="card-title fw-bolder">Option de filtre</h3>
                        </div>
                        <div class="card-body bg-card-kawa 5">
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
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="" class="col-5">Date début</label>
                                        <input type="date" name="debut" class="form-control col" value="{{$debut}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="" class="col-5">Date fin</label>
                                        <input type="date" name="fin" class="form-control col" value="{{$fin}}">
                                    </div>
                                </div>
                                <div class="col"></div>
                                <div class="col"></div>

                            </div>
                            <div class="row">
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col text-right"></div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="/regulation-confirmation-liste" class="btn btn-info btn-sm">Effacer</a>
                            <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                            <a href="/regulation-confirmation" class="btn btn-sm btn-primary">Nouveau</a>
                        </div>
                    </div>
                    @csrf

                </form>
            </div>
        </div>

        <br>
        <br>
{{--        <form action="#" method="get">--}}
{{--            @csrf--}}
{{--            <div class="row">--}}
{{--                <div class="col">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="centre" class="col-5">Centre Régional</label>--}}
{{--                        <select name="centre" id="centre" class="form-control col">--}}
{{--                            <option>{{$centre}}</option>--}}
{{--                            @foreach ($centres as $centre)--}}
{{--                                <option value="{{$centre->centre}}">{{ $centre->centre }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="centre_regional" class="col-5">Centre</label>--}}
{{--                        <select id="centre_regional" name="centre_regional" class="form-control col">--}}
{{--                            <option>{{$centre_regional}}</option>--}}
{{--                            @foreach ($centres_regionaux as $centre)--}}
{{--                                <option value="{{$centre->centre_regional}}">{{ $centre->centre_regional }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="client" class="col-5">Clients</label>--}}
{{--                        <select id="client" name="client" class="form-control col">--}}
{{--                            <option>{{$client}}</option>--}}
{{--                            @foreach ($clients_com as $clt)--}}
{{--                                <option value="{{$clt->id}}">{{ $clt->client_nom }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="site" class="col-5">Site</label>--}}
{{--                        <select id="site" name="site" class="form-control col">--}}
{{--                            <option>{{$site}}</option>--}}
{{--                            @foreach ($sites_com as $site)--}}
{{--                                <option value="{{$site->id}}">{{ $site->site }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="" class="col-5">Date début</label>--}}
{{--                        <input type="date" name="debut" class="form-control col-7" value="{{$debut}}">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="" class="col-5">Date fin</label>--}}
{{--                        <input type="date" name="fin" class="form-control col-sm-7" value="{{$fin}}">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col"></div>--}}
{{--                <div class="col text-right">--}}
{{--                    <a href="/regulation-confirmation-liste" class="btn btn-info btn-sm">Effacer</a>--}}
{{--                    <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
        <br>
        <br>
        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
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
