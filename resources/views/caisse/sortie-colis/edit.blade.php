@extends('bases.caisse')

@section('main')
    <link rel="stylesheet" href="{{ asset('css/burval.css') }}">
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                     data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                     class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Caisse Centrale
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">Caisse sortie colis</small>
                        <!--end::Description--></h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center py-1">
                    <!--begin::Wrapper-->
                    <div class="me-4">
                        <!--begin::Menu-->
                        <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder"
                           data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                            <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                                        fill="black"/>
                                                </svg>
                                            </span>
                            <!--end::Svg Icon-->Filtrer</a>
                        <!--begin::Menu 1-->
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                             id="kt_menu_61484bf44d957">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bolder">Options de filtre</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Menu separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Menu separator-->
                            <!--begin::Form-->
                            <div class="px-7 py-5">
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bold">Client:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <div>
                                        <select id="client" class="form-select form-select-solid" data-kt-select2="true"
                                                data-placeholder="Selectionner un client"
                                                data-dropdown-parent="#kt_menu_61484bf44d957" data-allow-clear="true">
                                            {{--                                        <option>{{$client}}</option>--}}
                                            {{--                                        @foreach ($clients_com as $client)--}}
                                            {{--                                            <option value="{{$client->id}}">{{ $client->client_nom }}</option>--}}
                                            {{--                                        @endforeach--}}
                                        </select>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Form-->
                        </div>
                    </div>
                </div>
                <!--end::Actions-->
            </div>
        </div>
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
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
        <div class="row gy-5 g-xxl-12">
                <div class="col-xxl-12">
                    <form class="form-horizontal" action="{{ route('caisse-sortie-colis.update', $colis->id) }}" id="target" method="post">
                        @csrf
                        @method("PATCH")
                        <div class="card card-xxl-stretch">
                            <div class="card-header border-0 py-5 bg-warning">
                                <h3 class="card-title fw-bolder">Caisse centrale Sortie de colis</h3>
                            </div>
                            <div class="card-body bg-card-kawa 5">
                                <div class="row">
                                    <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                        <label for="date"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2"
                                        >Date</label>
                                        <input type="date" class="col-sm-6 form-control form-control" id="date" name="date" value="{{$colis->date ?? ''}}"  required>
                                    </div>

                                    <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                        <label for="heure"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Heure
                                        </label>
                                        <input type="time" class="col-sm-6 form-control form-control" name="heure" id="heure" value="{{$colis->heure}}" readonly>
                                    </div>

                                    <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                        <label for="noTournee"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">N°Tournée
                                        </label>
                                        <select
                                            class="form-select form-select-solid select2-hidden-accessible"
                                            data-control="select2"
                                            data-placeholder="Centre"
                                            data-select2-id="select2-data-10-7w15b" tabindex="-1"
                                            data-kt-select2="true"
                                            aria-hidden="true"
                                            name="noTournee" id="noTournee" required>
                                            <option value="{{$colis->noTournee}}">{{$colis->tournees->numeroTournee ?? ''}}</option>
                                            @foreach($tournees as $tournee)
                                                <option value="{{$tournee->id}}">{{$tournee->numeroTournee}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                        <label for="vehicule"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Véhicule</label>
                                        <input type="text" class="col-sm-6 form-control form-control" value="{{$colis->tournees->vehicules->immatriculation?? "Donnée indisponible"}}" name="vehicule" id="vehicule" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                        <label for="agentDeGarde"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Agent de garde</label>
                                        <input type="text" class="col-sm-6 form-control form-control" name="agentDeGarde" id="agentDeGarde" value="{{$colis->tournees->agentDeGarde->nomPrenoms ?? "Données indisponible"}}" readonly>
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                        <label for="chefDeBord"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Chef de bord</label>
                                        <input type="text" class="col-sm-6 form-control form-control" name="chefDeBord" id="chefDeBord" value="{{$colis->tournees->chefDeBords->nomPrenoms ?? "Données indisponible"}}" readonly>
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                        <label for="chauffeur"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Chauffeur</label>
                                        <input type="text" class="col-sm-6 form-control form-control" name="chauffeur" id="chauffeur" value="{{$colis->tournees->chauffeurs->nomPrenoms ?? "Données indisponible"}}"  readonly>
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                        <label for="centre"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Centre régional</label>
                                        <input type="text" class="col-sm-6 form-control form-control" name="centre" id="centre" value="{{$colis->tournees->centre ?? ''}}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                        <label for="centre_regional" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Centre</label>
                                        <input type="text" class="col-sm-6 form-control form-control" name="centre_regional" id="centre_regional" value="{{$colis->tournees->centre ?? ''}}" required>
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                        <label for="receveur" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Receveur</label>
                                        <input type="text" class="col-sm-6 form-control form-control" name="receveur" id="receveur" value="{{$colis->receveur}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @csrf
                        <div class="container-xl-fluid">
                            <br>
                            <button type="button" id="add" class="btn btn-sm btn-dark">Ajouter</button>
                            <br>
                            <br>
                            <table class="table table-striped gy-7 gs-7 pt-0" style="width: 100%;" id="table">
                                <thead>
                                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                                    <th>Colis</th>
                                    <th>Devise</th>
                                    <th>Valeur colis</th>
                                    <th>Numéros scellé (Réference)</th>
                                    <th>Nbre total colis</th>
                                    <th>Site</th>
                                    <th>Client</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                    <td><select name="colis[]" class="form-control">
                                            <option>{{$item->colis}}</option>
                                            <option>Sac jute</option>
                                            <option>Keep safe</option>
                                            <option>Caisse</option>
                                            <option>Conteneur</option>
                                        </select></td>
                                    <td><select name="devise[]" class="form-control">
                                            <option>{{$item->devise}}</option>
                                            @foreach($devises as $devise)
                                                <option>{{$devise->devise}}</option>
                                            @endforeach
                                        </select></td>
                                    <td><input type="number" name="valeur[]" value="{{$item->valeur ?? 0}}" class="form-control"></td>
                                    <td><textarea name="scelle[]" value="{{$item->scelle}}" class="form-control"></textarea></td>
                                    <td><input type="number" name="nbre_colis[]" value="{{$item->nbre_colis ?? 0}}" class="form-control"></td>
                                    <td>
                                        <select name="site[]" class="form-control">
                                            <option value="{{$item->site}}">{{$item->sites->site ?? "Donnée indisponible"}}</option>
                                            @foreach($sites as $site)
                                                <option value="{{$site->id}}">{{$site->site}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="text" name="client[]" value="{{$item->sites->clients->client_nom ?? "Donnée indisponible"}}"  class="form-control"></td>
                                    <td class="pt-10"><a class="btn btn-sm btn-danger" onclick="supprimer(this)"></a></td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td style="vertical-align: center;">TOTAL</td>
                                    <td></td>
                                    <td><input type="number" name="totalValeurXOF" id="totalValeurXOF" class="form-control"
                                               readonly></td>
                                    <td></td>
                                    <td><input type="number" name="totalColis" id="totalColis" class="form-control" readonly></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tfoot>
                            </table>
                            <br>
                            <div class="card-footer">
                                <button class="btn btn-primary btn-sm" type="submit">Enregistrer</button>
                                <br>
                            </div>
                        </div>
                    </form>
                </div>
            </div></div>

{{--        <form action="{{ route('caisse-sortie-colis.update', $colis->id) }}" method="post">--}}
{{--            @csrf--}}
{{--            @method("PATCH")--}}

{{--            <div class="container-fluid">--}}
{{--                <div class="row">--}}
{{--                    <div class="col">--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="date" class="col-sm-4">Date</label>--}}
{{--                            <input type="date" name="date" id="date" value="{{$colis->date ?? ''}}" class="form-control col-sm-8"/>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="heure" class="col-sm-4">Heure</label>--}}
{{--                            <input type="text" name="heure" id="heure" value="{{$colis->heure}}"--}}
{{--                                   class="form-control col-sm-8" readonly/>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="no_tournee" class="col-sm-4">N°Tournée</label>--}}
{{--                            <select class="form-control col-sm-8" name="noTournee" id="noTournee">--}}
{{--                                <option value="{{$colis->noTournee}}">{{$colis->tournees->numeroTournee ?? ''}}</option>--}}
{{--                                @foreach($tournees as $tournee)--}}
{{--                                    <option value="{{$tournee->id}}">{{$tournee->numeroTournee}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}
{{--                        <div class="form-group row" >--}}
{{--                            <label class="col-sm-4">Véhicule</label>--}}
{{--                            <input class="form-control col-sm-8" name="vehicule" id="vehicule" value="{{$colis->tournees->vehicules->immatriculation?? "Donnée indisponible"}}" readonly/>--}}
{{--                            --}}{{--<select class="form-control col-sm-8" name="vehicule" id="vehicule">--}}
{{--                                <option></option>--}}
{{--                                @foreach($vehicules as $vehicule)--}}
{{--                                    <option value="{{$vehicule->id}}">{{$vehicule->immatriculation}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col">--}}
{{--                        <div class="form-group row">--}}
{{--                            <label class="col-sm-4">Chef de bord</label>--}}
{{--                            <input class="form-control col-sm-8" name="chefDeBord" id="chefDeBord" value="{{$colis->tournees->chefDeBords->nomPrenoms ?? "Données indisponible"}}" readonly/>--}}
{{--                            --}}{{--<select class="form-control col-sm-8" name="chefDeBord">--}}
{{--                                <option></option>--}}
{{--                                @foreach($chefBords as $chef)--}}
{{--                                    <option value="{{$chef->id}}">{{$chef->nomPrenoms}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}
{{--                        <div class="form-group row">--}}
{{--                            <label class="col-sm-4">Agent garde</label>--}}
{{--                            <input class="form-control col-sm-8" name="agentDeGarde" id="agentDeGarde" value="{{$colis->tournees->agentDeGarde->nomPrenoms ?? "Données indisponible"}}" readonly/>--}}
{{--                            --}}{{--<select class="form-control col-sm-8" name="agentDeGarde">--}}
{{--                                <option></option>--}}
{{--                                @foreach($agents as $agent)--}}
{{--                                    <option value="{{$agent->id}}">{{$agent->nomPrenoms}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}
{{--                        <div class="form-group row">--}}
{{--                            <label class="col-sm-4">Chauffeur:</label>--}}
{{--                            <input class="form-control col-sm-8" name="chauffeur" id="chauffeur"  value="{{$colis->tournees->chauffeurs->nomPrenoms ?? "Données indisponible"}}" readonly/>--}}
{{--                            --}}{{--<select class="form-control col-sm-8" name="chauffeur" id="chauffeur">--}}
{{--                                <option></option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col"></div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col">--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="centre" class="col-sm-4">Centre regional</label>--}}
{{--                            <input name="centre" id="centre" class="form-control col-sm-8" value="{{$colis->tournees->centre ?? ''}}" readonly/>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="centre_regional" class="col-sm-4">Centre</label>--}}
{{--                            <input id="centre_regional" name="centre_regional" class="form-control col-sm-8" value="{{$colis->tournees->centre ?? ''}}" readonly/>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col"></div>--}}
{{--                    <div class="col"></div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col">--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="date" class="col-sm-4">Receveur</label>--}}
{{--                            <input type="text" name="receveur" id="receveur" value="{{$colis->receveur}}" class="form-control col-sm-8"/>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col"></div>--}}
{{--                    <div class="col"></div>--}}
{{--                    <div class="col"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="container-fluid">--}}
{{--                <br>--}}
{{--                <button type="button" id="add" class="btn btn-sm btn-dark">Ajouter</button>--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                <table class="table table-bordered" id="table">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th>Colis</th>--}}
{{--                        <th>Devise</th>--}}
{{--                        <th>Valeur</th>--}}
{{--                        <th>Numéros scellé (Réference)</th>--}}
{{--                        <th>Nbre colis</th>--}}
{{--                        <th>Site</th>--}}
{{--                        <th>Client</th>--}}
{{--                        <th></th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @foreach($items as $item)--}}
{{--                        <tr>--}}
{{--                            <td><select name="colis[]" class="form-control">--}}
{{--                                    <option>{{$item->colis}}</option>--}}
{{--                                    <option>Sac jute</option>--}}
{{--                                    <option>Keep safe</option>--}}
{{--                                    <option>Caisse</option>--}}
{{--                                    <option>Conteneur</option>--}}
{{--                                </select></td>--}}
{{--                            <td><select name="devise[]" class="form-control">--}}
{{--                                    <option>{{$item->devise}}</option>--}}
{{--                                    @foreach($devises as $devise)--}}
{{--                                        <option>{{$devise->devise}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select></td>--}}
{{--                            <td><input type="number" name="valeur[]" value="{{$item->valeur ?? 0}}" class="form-control"></td>--}}
{{--                            <td><input type="text" name="scelle[]" value="{{$item->scelle}}" class="form-control"></td>--}}
{{--                            <td><input type="number" name="nbre_colis[]" value="{{$item->nbre_colis ?? 0}}" class="form-control"></td>--}}
{{--                            <td>--}}
{{--                                <input type="hidden" name="ids[]" value="{{$item->id}}">--}}
{{--                                <select name="site[]" class="form-control">--}}
{{--                                    <option value="{{$item->site}}">{{$item->sites->site ?? "Donnée indisponible"}}</option>--}}
{{--                                    @foreach($sites as $site)--}}
{{--                                        <option value="{{$site->id}}">{{$site->site}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </td>--}}
{{--                            <td><input type="text" name="client[]" value="{{$item->sites->clients->client_nom ?? "Donnée indisponible"}}" class="form-control"></td>--}}
{{--                            <td><a class="btn btn-danger btn-sm" onclick="supprimerItem('{{$item->id}}',this)"></a></td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                    <tfoot>--}}
{{--                    <tr>--}}
{{--                        <td style="vertical-align: center;">TOTAL</td>--}}
{{--                        <td></td>--}}
{{--                        <td><input type="number" name="totalValeurXOF" id="totalValeurXOF" class="form-control"--}}
{{--                                   readonly></td>--}}
{{--                        <td></td>--}}
{{--                        <td><input type="number" name="totalColis" id="totalColis" class="form-control" readonly></td>--}}
{{--                        <td></td>--}}
{{--                        <td></td>--}}
{{--                        <td></td>--}}
{{--                    </tr>--}}
{{--                    </tfoot>--}}
{{--                </table>--}}
{{--                <br>--}}
{{--                <a href="/caisse-sortie-colis-liste-detaillee" class="btn btn-sm btn-info" style="margin-left: 20px">Ouvrir la liste</a>--}}
{{--                <button type="submit" class="btn btn-sm btn-primary">Enregistrer</button>--}}
{{--            </div>--}}
{{--        </form>--}}

    </div>

    <script>
        function changeXOF() {
            let total = 0;
            $.each($("input[name='valeur[]']"), function (i) {
                const nbre = $("input[name='valeur[]'").get(i).value;
                total += parseFloat(nbre) ?? 0;
            });
            $("#totalValeurXOF").val(total);
        }

        function changeNombreColis() {
            let totalColis = 0;
            $.each($("input[name='nbre_colis[]']"), function (i) {
                const nbre = $("input[name='nbre_colis[]'").get(i).value;
                totalColis += parseFloat(nbre) ?? 0;
            });
            $("#totalColis").val(totalColis);
        }

        function supprimer(e) {
            const indexLigne = $(e).closest('tr').get(0).rowIndex;
            document.getElementById("table").deleteRow(indexLigne);
            changeXOF();
            changeDollar();
            changeEuro();
            changePierre();
            changeNombreColis();
        }
        function supprimerItem(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "/caisse-sortie-colis-item/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        _token: token,
                    },
                    success: function (response) {
                        console.log(response);
                        supprimer(e);
                    },
                    error: function (err) {
                        console.error(err.responseJSON.message);
                        alert(err.responseJSON.message ?? "Une erreur s'est produite");
                    }
                }).done(function () {
                    // TODO hide loader
                });
            }
        }
    </script>
    <script>
        let centres = {!! json_encode($centres) !!};
        let centres_regionaux = {!! json_encode($centres_regionaux) !!};
        let sites = {!! json_encode($sites) !!};
        let tournees = {!! json_encode($tournees) !!};
        $(document).ready(function () {
            changeNombreColis();
            changeXOF();
            $("#centre").on("change", function () {
                $("#centre_regional option").remove();
                //$('#centre_regional').append($('<option>', {text: "Choisir centre régional"}));

                const centre = centres.find(c => c.centre === this.value);
                const regions = centres_regionaux.filter(region => {
                    return region.id_centre === centre.id;
                });
                regions.map(({centre_regional}) => {
                    $('#centre_regional').append($('<option>', {
                        value: centre_regional,
                        text: centre_regional
                    }));
                })
            });
            $("#noTournee").on("change", function () {
                $("#vehicule").val("");
                $("#chauffeur").val("");
                $("#chefDeBord").val("");
                $("#agentDeGarde").val("");
                $("#centre_regional option").remove();

                const tournee = tournees.find(t => t.id === parseInt(this.value ?? 0));
                if (tournee) {
                    $("#vehicule").val(tournee?.vehicules?.immatriculation ?? "");
                    $("#chauffeur").val(tournee?.chauffeurs?.nomPrenoms ?? "");
                    $("#chefDeBord").val(tournee?.chef_de_bords?.nomPrenoms ?? "");
                    $("#agentDeGarde").val(tournee?.agent_de_gardes?.nomPrenoms ?? "");
                    $("#centre").val(tournee.centre);
                    $("#centre_regional").val(tournee.centre_regional);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#add").on("click", function () {
                $('#table').append('<tr>\n' +
                    '                        <input type="hidden" name="ids[]">\n' +
                    '                        <td><select name="colis[]" class="form-control">\n' +
                    '                                <option></option>\n' +
                    '                                <option>Sac jute</option>\n' +
                    '                                <option>Keep safe</option>\n' +
                    '                                <option>Caisse</option>\n' +
                    '                                <option>Conteneur</option>\n' +
                    '                            </select></td>\n' +
                    '                        <td><select name="devise[]" class="form-control">\n' +
                    '                                @foreach($devises as $devise)\n' +
                    '                                    <option>{{$devise->devise}}</option>\n' +
                    '                                @endforeach\n' +
                    '                            </select></td>\n' +
                    '                        <td><input type="number" name="valeur[]" class="form-control"></td>\n' +
                    '                        <td><textarea name="scelle[]" class="form-control"></textarea></td>\n' +
                    '                        <td><input type="number" name="nbre_colis[]" class="form-control"></td>\n' +
                    '                        <td>\n' +
                    '                            <select name="site[]" class="form-control">\n' +
                    '                                <option></option>\n' +
                    '                                @foreach($sites as $site)\n' +
                    '                                    <option value="{{$site->id}}">{{$site->site}}</option>\n' +
                    '                                @endforeach\n' +
                    '                            </select>\n' +
                    '                        </td>\n' +
                    '                        <td><input type="text" name="client[]" class="form-control"></td>\n' +
                    '                        <td><a class="btn btn-sm btn-danger" onclick="supprimer(this)"></a></td>\n' +
                    '                        {{--<td><input type="text" name="montant[]" class="form-control"></td>--}}\n' +
                    '                    </tr>');
            });
        })
    </script>
    <script>
        $(document).on('DOMNodeInserted', function () {
            $("input[name='montant[]']").on("change", function () {
                let montantTotal = 0;
                $.each($("input[name='montant[]']"), function (i) {
                    const montant = $("input[name='montant[]'").get(i).value;
                    montantTotal += parseFloat(montant) ?? 0;
                });
                $("#totalMontant").val(montantTotal);

            });
            $("input[name='nbre_colis[]']").on("change", function () {
                let totalColis = 0;
                $.each($("input[name='nbre_colis[]']"), function (i) {
                    const nbre = $("input[name='nbre_colis[]'").get(i).value;
                    totalColis += parseFloat(nbre) ?? 0;
                });
                $("#totalColis").val(totalColis);

            });

            $("select[name='site[]']").on("change", function () {
                let index = 0;
                const thisSite = this;
                $.each($("select[name='site[]']"), function (i) {
                    const site = $("select[name='site[]']").get(i);
                    if (thisSite === site) {
                        index = i;
                    }
                });
                const site = sites.find(s => s.id === parseInt(this.value));
                if (site) {
                    console.log(site);
                    $("input[name='client[]']").eq(index).val(site.clients.client_nom);
                } else {
                    console.log("Site non trouvé :-(");
                }
            });
            $("input[name='valeur[]']").on("change", changeXOF);
        });
    </script>

@endsection
