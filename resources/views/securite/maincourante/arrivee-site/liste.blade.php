@extends('bases.securite')

@section("main")
    @extends('bases.toolbar', ["title" => "Sécurité", "subTitle" => "Main Courante | Liste Arrivée Site"])
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="row gy-5 g-xxl-12">
                <div class="col-xxl-3">
                    <!--begin::List Widget 2-->
                    <div class="card card-xl-stretch mb-xxl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 bg-gradient-kawa">
                            <h3 class="card-title fw-bolder text-dark">Résultats</h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-2">
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
                                    <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Total OP:</a>
                                    <span class="text-muted fw-bold d-block"></span>
                                </div>
                                <!--end::Title-->
                                <!--begin::Lable-->
                                <span class="fw-bolder text-danger py-1">{{$arriveeSites->sum("tempsOperation")}}</span>
                                <!--end::Lable-->
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
                                    <!--end::Svg Icon-->
                            </span>
                                <!--end::Icon-->
                                <!--begin::Title-->
                                <div class="flex-grow-1 me-2">
                                    <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Total colis:</a>
                                    <span class="text-muted fw-bold d-block"></span>
                                </div>
                                <!--end::Title-->
                                <!--begin::Lable-->
                                <span class="fw-bolder text-danger py-1">
                                    @php
                                        $totalNbreColis = 0;
                                        foreach ($arriveeSites as $arrivee) {
                                            $totalNbreColis += $arrivee->ArriveeColis->sum('nombre_colis');
                                        }
                                    echo $totalNbreColis;
                                    @endphp
                                </span>
                                <!--end::Lable-->
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List Widget 2-->
                </div>
                <div class="col-xxl-9">
                    <form method="get" action="#" class="card card-xxl-stretch">
                        <div class="card-header border-0 py-5 bg-gradient-kawa">
                            <h3 class="card-title fw-bolder">Filtre de recherche</h3>
                        </div>
                        <div class="card-body pt-5">
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="debut" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">Date début</label>
                                        <input type="date" name="debut" id="debut" class="form-control col editbox"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="fin" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">Date
                                            fin</label>
                                        <input type="date" name="fin" id="fin" class="form-control col editbox"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="centre" class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span>Centre régional</span>
                                        </label>
                                        <select name="centre" id="centre"
                                                class="form-select form-select-solid select2-hidden-accessible"
                                                data-control="select2" data-hide-search="true"
                                                data-placeholder="{{$centre ?? 'Centre régional'}}"
                                                data-select2-id="select2-data-10-7w10b" tabindex="-1"
                                                aria-hidden="true">
                                            <option data-select2-id="select2-data-12-ubbm">{{$centre}}</option>
                                            @foreach ($centres as $centre)
                                                <option value="{{$centre->centre}}">{{ $centre->centre }}</option>
                                            @endforeach
                                        </select>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label for="centre_regional"
                                               class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span>Centre</span>
                                        </label>
                                        <select name="centre_regional" id="centre_regional"
                                                class="form-select form-select-solid select2-hidden-accessible"
                                                data-control="select2" data-hide-search="true"
                                                data-placeholder="{{$centre_regional ?? 'Centre'}}"
                                                data-select2-id="select2-data-10-7w9b" tabindex="-1" aria-hidden="true">
                                            <option data-select2-id="select2-data-12-ubbm">{{$centre_regional}}</option>
                                            @foreach ($centres_regionaux as $centre)
                                                <option
                                                    value="{{$centre->centre_regional}}">{{ $centre->centre_regional }}</option>
                                            @endforeach
                                        </select>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="/maincourante-arriveesiteliste" class="btn btn-info btn-sm">Effacer</a>
                            <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                            <a href="/maincourante" class="btn btn-sm btn-primary">Nouveau</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card card-xl-stretch">
                <div class="table-responsive">
                    <table class="table table-striped gy-7 gs-7 pt-0" style="width: 100%" id="liste">
                        <thead>
                        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient-kawa">
                            <td>N°</td>
                            <td>Centre régional</td>
                            <td>Centre</td>
                            <td>Date</td>
                            <td>N° Tournée</td>
                            <td>Heure</td>
                            <td>Site</td>
                            <td>Client</td>
                            <td>Type op</td>
                            <td>Véhicule</td>
                            <td>Equipage</td>
                            <td>Temps op.</td>
                            <td>Nbre colis pris</td>
                            <td>Actions</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($arriveeSites as $arriveeSite)
                            <tr>
                                <td style="width: 20px; text-align: center">{{$arriveeSite->id}}</td>
                                <td>{{$arriveeSite->tournees->centre_regional ?? "Donnée indisponible"}}</td>
                                <td>{{$arriveeSite->tournees->centre ?? "Donnée indisponible"}}</td>
                                <td>{{$arriveeSite->tournees->date ?? "Donnée indisponible"}}</td>
                                <td>{{$arriveeSite->tournees->numeroTournee ?? "Donnée indisponible"}}</td>
                                <td>{{$arriveeSite->finOperation ?? "Donnée indisponible"}}</td>
                                <td>{{$arriveeSite->sites->site ?? "Non précisé"}}</td>
                                <td>{{$arriveeSite->sites->clients->client_nom ?? ""}}</td>
                                <td>{{$arriveeSite->operation ?? ""}}</td>
                                <td>{{$arriveeSite->tournees->vehicules->immatriculation ?? "Donnée indisponible"}}</td>
                                <td>{{$arriveeSite->tournees->chefDeBords->nomPrenoms ?? "Donnée indisponible"}}
                                    // {{$arriveeSite->tournees->agentDeGardes->nomPrenoms ?? "Donnée indisponible"}}
                                    // {{$arriveeSite->tournees->chauffeurs->nomPrenoms ?? "Donnée indisponible"}}</td>
                                <td>{{$arriveeSite->tempsOperation}}</td>
                                <td>{{$arriveeSite->ArriveeColis->sum('nombre_colis')}}</td>
                                <td style="width: 30px; text-align: center;">
                                    <a href="/maincourante-arriveesiteliste/{{$arriveeSite->id}}/edit"
                                       class="btn btn-sm btn-primary"></a>
                                    <button class="btn btn-sm btn-danger"
                                            onclick="supprimer('{{$arriveeSite->id}}', this)"></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


    <script>
        $(document).ready(function () {
            $('#liste').DataTable({
                "order": [[0, "desc"]],
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
                    url: "maincourante-arriveesiteliste/" + id,
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
                }).done(function () {
                    // TODO hide loader
                });


            }

        }
    </script>
@endsection
