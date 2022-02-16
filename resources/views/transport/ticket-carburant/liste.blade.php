@extends('bases.carburant')

@section('main')
    @extends('bases.toolbar', ["title" => "Carburant", "subTitle" => "Liste appro carburant"])
    <style>
        .dataTables_filter, .dataTables_info {
            display: none;
        }
    </style>
    <div class="burval-container">
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
                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Total :</a>
                                <span class="text-muted fw-bold d-block"></span>
                            </div>
                            <!--end::Title-->
                            <!--begin::Lable-->
                            <span class="fw-bolder text-danger py-1 montantTotal" id="montantTotal">{{$carburants->sum('soldePrecedent')}}</span>
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
                        <div class="card-body pt-5">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="" class="col-3">Date début</label>
                                        <input type="date" name="debut" class="form-control col" value="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="" class="col-3">Date fin</label>
                                        <input type="date" name="fin" class="form-control col" value="">
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
                            <a href="/ticket-carburant-liste" class="btn btn-info btn-sm">Effacer</a>
                            <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                            <a href="/ticket-carburant" class="btn btn-sm btn-primary">Nouveau</a>
                        </div>
                    </div>
                    @csrf

                </form>
            </div>
        </div>
        <br>
        <br>
        <form action="#" method="get">
            @csrf
            <div class="row">
                <div class="col"></div>
                <div class="col-4">
                    <div class="form-group row">
                        <label class="col">Rechercher</label>
                        <input type="text" name="q" id="searchInput" class="form-control col-sm-8">
                    </div>
                </div>
                <div class="col-2 pt-7">
                    <button class="btn btn-primary btn-sm">Rechercher</button>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col">
                <table class="table table-striped gy-7 gs-7 pt-0" style="width: 100%" id="liste">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Centre</th>
                        <th>Centre régional</th>
                        <th>Numero Ticket</th>
                        <th>N° Carte Carburant</th>
                        <th>Immatriculation</th>
                        <th>Montant</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($carburants as $carburant)
                        <tr>
                            <td>{{$carburant->date}}</td>
                            <td>{{$carburant->heure}}</td>
                            <td>{{$carburant->centre}}</td>
                            <td>{{$carburant->centre_regional}}</td>
                            <td>{{$carburant->numeroTicket}}</td>
                            <td>{{$carburant->numeroCarteCarburant}}</td>
                            <td>{{$carburant->vehicules->immatriculation ?? ''}}</td>
                            <td class="montant">{{$carburant->soldePrecedent}}</td>
                            <td><a href="{{route('ticket-carburant.edit', $carburant->id)}}"
                                   class="btn btn-primary btn-sm"></a>
                                <button class="btn btn-danger btn-sm"
                                        onclick="supprimer('{{$carburant->id}}', this)"></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            const table = $('#liste').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
            /*$('#searchInput').keyup(function () {
                table.search($(this).val()).draw();
            })*/

        });
    </script>
    <script>
        function supprimer(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "/ticket-carburant/" + id,
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
                    error: function (err) {
                        console.error(err.responseJSON.message);
                        alert(err.responseJSON.message ?? "Une erreur s'est produite");
                    }
                });
            }
        }
    </script>
@endsection
