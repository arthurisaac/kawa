@extends('bases.securite')

@section('main')
    @extends('bases.toolbar', ["title" => "Sécurité", "subTitle" => "Main Courante | Synthèse des Tournées"])
    <div class="container-fluid">
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
                                    <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Total tournée :</a>
                                    <span class="text-muted fw-bold d-block"></span>
                                </div>
                                <!--end::Title-->
                                <!--begin::Lable-->
                                <span class="fw-bolder text-danger py-1 totalVb" id="totalVb">{{count($tournees)}}</span>
                                <!--end::Lable-->
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
                                    <!--end::Svg Icon-->
                            </span>
                                <!--end::Icon-->
                                <!--begin::Title-->
                                <div class="flex-grow-1 me-2">
                                    <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Temps parcouru :</a>
                                    <span class="text-muted fw-bold d-block"></span>
                                </div>
                                <!--end::Title-->
                                <!--begin::Lable-->
                                <span class="fw-bolder text-danger py-1 totalVl" id="tempsTotal"></span>
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
                                    <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Km parcouru :</a>
                                    <span class="text-muted fw-bold d-block"></span>
                                </div>
                                <!--end::Title-->
                                <!--begin::Lable-->
                                <span class="fw-bolder text-danger py-1" id="kmTotal"></span>
                                <!--end::Lable-->
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List Widget 2-->
                </div>
                <div class="col-xxl-9">
                    <form action="#" method="get">
                        <div class="card card-xxl-stretch">
                            <div class="card-header border-0 py-5 bg-warning">
                                <h3 class="card-title fw-bolder">Option de filtre</h3>
                            </div>
                                <div class="card-body pt-5">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label for="debut" class="col-3">Date début</label>
                                                <input type="date" name="debut" id="debut" class="form-control col "/>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label for="fin" class="col-3">Date fin</label>
                                                <input type="date" name="fin" id="fin" class="form-control col" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                            <div class="card-footer">
                                <a href="/maincourante-synthese" class="btn btn-info btn-sm">Effacer</a>
                                <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                            </div>
                        </div>
                        @csrf

                    </form>
                </div>
            </div>

        <br/>
        <div class="container-fluid">
{{--            <form action="#" method="get">--}}
{{--                @csrf--}}
{{--                <div class="row">--}}
{{--                    <div class="col"></div>--}}
{{--                    <div class="col"></div>--}}
{{--                    <div class="col">--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="" class="col-4">Date début</label>--}}
{{--                            <input type="date" name="debut" class="form-control col" value="{{$debut}}">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="" class="col-4">Date fin</label>--}}
{{--                            <input type="date" name="fin" class="form-control col" value="{{$fin}}">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-1">--}}
{{--                        <button class="btn btn-primary btn-sm">Rechercher</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}

            <br>
            <table  class="table table-striped gy-7 gs-7 pt-0" style="width: 100%"  id="listeMaincourante">
                <thead>
                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                    <td style="display: none;">ID</td>
                    <td>Centre Régional</td>
                    <td>Centre</td>
                    <td>Date</td>
                    <td>N°Tournée</td>
                    <td>Véhicule</td>
                    <td>Km départ</td>
                    <td>Km arrivée</td>
                    <td>Départ centre</td>
                    <td>Arrivée centre</td>
                    <td>Km parcouru</td>
                    <td>Temps tournée</td>
                    <td>Carburant départ</td>
                    <td>Carburant arrivée</td>
                    <td>Convoyeur</td>
                </tr>
                </thead>
                <tbody>
                @foreach($tournees as $tournee)
                    <tr>
                        <td style="display: none;">{{$tournee->id}}</td>
                        <td>{{$tournee->centre_regional}}</td>
                        <td>{{$tournee->centre}}</td>
                        <td>{{$tournee->date}}</td>
                        <td>{{$tournee->numeroTournee}}</td>
                        <td>{{$tournee->vehicules->immatriculation ?? "Donnée indisponible"}}</td>
                        <td>{{$tournee->departCentre->kmDepart ?? "Pas de données"}}</td>{{--<td>{{$tournee->departCentre ?? $tournee->departCentre[0]->kmDepart ?? ""}}</td>--}}
                        <td>{{$tournee->arriveeCentre->kmArrive ?? "Donnée indisponible"}}</td>
                        <td>{{$tournee->departCentre->heureDepart ?? ""}}</td>
                        <td>{{$tournee->arriveeCentre->heureArrivee ?? "Donnée indisponible"}}</td>
                        <td class="km">{{($tournee->arriveeCentre->kmArrive ?? 0) - ($tournee->departCentre->kmDepart ?? 0)}}</td>{{--<td>{{$tournee->departCentre[0]->kmDepart - $tournee->arriveeCentre[0]->kmArrive}}</td>--}}
                        <td class="temps">
                            <?php
                            /*$date1 = new DateTime($tournee->arriveeCentre->dateArrivee ?? date('Y/m/d'));
                            $date2 = new DateTime($tournee->date);
                            $interval = $date1->diff($date2);
                            echo $interval->days;*/
                            $date = $tournee->date ?? "2021-12-01";
                            $depart = $tournee->departCentre->heureDepart ?? "00:00:00";
                            $arrivee = $tournee->arriveeCentre->heureArrivee ?? "00:00:00";
                            $start = date_create("$date $depart");
                            $end = date_create("$date $arrivee");
                            $diff=date_diff($end,$start);
                            echo str_pad($diff->h, 2, '0', STR_PAD_LEFT) . ":" . str_pad($diff->i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($diff->s, 2, '0', STR_PAD_LEFT);
                            ?>
                        </td>
                        <td>{{$tournee->departCentre->niveauCarburant ?? ""}}</td>
                        <td>{{$tournee->arriveeCentre->niveauCarburant ?? "Donnée indisponible"}}</td>
                        <td>{{$tournee->chauffeurs->nomPrenoms ?? ''}} // {{$tournee->chefDeBords->nomPrenoms ?? ''}} // {{$tournee->agentDeGardes->nomPrenoms ?? ''}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


    </div>
    <script>
        const pad = function (num) {
            return ("0" + num).slice(-2);
        };

        function calculerTotal() {
            $('tr').each(function () {
                /*let sum = 0
                //find the combat elements in the current row and sum it
                $(this).find('.combat').each(function () {
                    var combat = $(this).text();
                    if (!isNaN(combat) && combat.length !== 0) {
                        sum += parseFloat(combat);
                    }
                });*/
                const rowCount = $('#listeMaincourante tr').length;
                $("#montantTotal").html(+rowCount - 1);
            });
        }

        function calculerTempsTotal() {
            let totalSeconds = 0;
            $('tr').each(function () {
                //find the combat elements in the current row and sum it
                $(this).find('.temps').each(function () {
                    let currentDuration = $(this).text();
                    currentDuration = currentDuration.split(":");
                    const hrs = parseInt(currentDuration[0], 10);
                    const min = parseInt(currentDuration[1], 10);
                    const sec = parseInt(currentDuration[2], 10);
                    const currDurationSec = sec + (60 * min) + (60 * 60 * hrs);
                    totalSeconds +=currDurationSec;
                });
            });
            const hours = Math.floor(totalSeconds / 3600);
            totalSeconds %= 3600;
            const minutes = Math.floor(totalSeconds / 60);
            const seconds = totalSeconds % 60;
            $("#tempsTotal").html(pad(hours)+":"+pad(minutes)+":"+pad(seconds));
        }

        function calculerKmTotal() {
            let sum = 0;
            $('tr').each(function () {
                //find the combat elements in the current row and sum it
                $(this).find('.km').each(function () {
                    const temps = $(this).text();
                    if (!isNaN(temps) && temps.length !== 0) {
                        sum += parseFloat(temps);
                    }
                });
            });
            $("#kmTotal").html(sum);
        }

        $(document).ready(function () {
            $('#listeMaincourante').DataTable({
                "language": {
                    "url": "French.json"
                }
            }).on( 'search.dt', function () {
                calculerTotal();
                calculerTempsTotal();
                calculerKmTotal()
            } );
        });
    </script>
    <script>
        function supprimer(id, e) {
            if (confirm("Confirmer la suppression? Cela entrainera la suppression de départ tournée.")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "maincourante/" + id,
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
                        document.getElementById("listeMaincourante").deleteRow(indexLigne);
                    },
                    error: function () {
                        alert("Une erreur s'est produite");
                    }
                })
            }
        }
    </script>
@endsection
