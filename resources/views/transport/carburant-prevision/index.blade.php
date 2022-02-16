@extends('bases.carburant')

@section('main')
    @extends('bases.toolbar', ["title" => "Carburant", "subTitle" => "Carburant prévision"])
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
{{--        <div class="col-xxl-3">--}}
{{--            <!--begin::List Widget 2-->--}}
{{--            <div class="card card-xl-stretch mb-xxl-8">--}}
{{--                <!--begin::Header-->--}}
{{--                <div class="card-header border-0" style="background: rgb(148,148,152);--}}
{{--background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%);">--}}
{{--                    <h3 class="card-title fw-bolder text-dark">Stats</h3>--}}
{{--                </div>--}}
{{--                <!--end::Header-->--}}
{{--                <!--begin::Body-->--}}
{{--                <div class="card-body pt-2">--}}
{{--                    <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">--}}
{{--                        <!--begin::Icon-->--}}
{{--                        <span class="svg-icon svg-icon-warning me-5">--}}
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
{{--                            <!--end::Svg Icon-->--}}
{{--                            </span>--}}
{{--                        <!--end::Icon-->--}}
{{--                        <!--begin::Title-->--}}
{{--                        <div class="flex-grow-1 me-2">--}}
{{--                            <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Quantité en stock :</a>--}}
{{--                            <span class="text-muted fw-bold d-block"></span>--}}
{{--                        </div>--}}
{{--                        <!--end::Title-->--}}
{{--                        <!--begin::Lable-->--}}
{{--                        <span class="fw-bolder text-danger py-1 quantiteStock" id="quantiteStock">{{$totalQte}}</span>--}}
{{--                        <!--end::Lable-->--}}
{{--                    </div>--}}
{{--                    --}}{{--                        <div class="d-flex align-items-center bg-light-info rounded p-5 mb-7">--}}
{{--                    --}}{{--                            <!--begin::Icon-->--}}
{{--                    --}}{{--                            <span class="svg-icon svg-icon-info me-5">--}}
{{--                    --}}{{--                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->--}}
{{--                    --}}{{--                                <span class="svg-icon svg-icon-1">--}}
{{--                    --}}{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                    --}}{{--                                         height="24" viewBox="0 0 24 24" fill="none">--}}
{{--                    --}}{{--                                    <path opacity="0.3"--}}
{{--                    --}}{{--                                          d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"--}}
{{--                    --}}{{--                                          fill="black"></path>--}}
{{--                    --}}{{--                                    <path--}}
{{--                    --}}{{--                                        d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"--}}
{{--                    --}}{{--                                        fill="black"></path>--}}
{{--                    --}}{{--                                </svg>--}}
{{--                    --}}{{--                            </span>--}}
{{--                    --}}{{--                                <!--end::Svg Icon-->--}}
{{--                    --}}{{--                        </span>--}}
{{--                    --}}{{--                            <!--end::Icon-->--}}
{{--                    --}}{{--                            <!--begin::Title-->--}}
{{--                    --}}{{--                            <div class="flex-grow-1 me-2">--}}
{{--                    --}}{{--                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Total valeur Colis :</a>--}}
{{--                    --}}{{--                                <span class="text-muted fw-bold d-block"></span>--}}
{{--                    --}}{{--                            </div>--}}
{{--                    --}}{{--                            <!--end::Title-->--}}
{{--                    --}}{{--                            <!--begin::Lable-->--}}
{{--                    --}}{{--                            <span class="fw-bolder text-danger py-1">{{$colisArrivees->sum("regulation_arrivee_valeur_colis")}}</span>--}}
{{--                    --}}{{--                            <!--end::Lable-->--}}
{{--                    --}}{{--                        </div>--}}
{{--                    --}}{{--                        <div class="d-flex align-items-center bg-light-info rounded p-5 mb-7">--}}
{{--                    --}}{{--                            <!--begin::Icon-->--}}
{{--                    --}}{{--                            <span class="svg-icon svg-icon-info me-5">--}}
{{--                    --}}{{--                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->--}}
{{--                    --}}{{--                                    <span class="svg-icon svg-icon-1">--}}
{{--                    --}}{{--                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                    --}}{{--                                             height="24" viewBox="0 0 24 24" fill="none">--}}
{{--                    --}}{{--                                        <path opacity="0.3"--}}
{{--                    --}}{{--                                              d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"--}}
{{--                    --}}{{--                                              fill="black"></path>--}}
{{--                    --}}{{--                                        <path--}}
{{--                    --}}{{--                                            d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"--}}
{{--                    --}}{{--                                            fill="black"></path>--}}
{{--                    --}}{{--                                    </svg>--}}
{{--                    --}}{{--                                </span>--}}
{{--                    --}}{{--                                <!--end::Svg Icon-->--}}
{{--                    --}}{{--                            </span>--}}
{{--                    --}}{{--                            <!--end::Icon-->--}}
{{--                    --}}{{--                            <!--begin::Title-->--}}
{{--                    --}}{{--                            <div class="flex-grow-1 me-2">--}}
{{--                    --}}{{--                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Nombre de colis :</a>--}}
{{--                    --}}{{--                                <span class="text-muted fw-bold d-block"></span>--}}
{{--                    --}}{{--                            </div>--}}
{{--                    --}}{{--                            <!--end::Title-->--}}
{{--                    --}}{{--                            <!--begin::Lable-->--}}
{{--                    --}}{{--                            <span class="fw-bolder text-danger py-1">{{$colisArrivees->sum("nbre_colis_arrivee")}}</span>--}}
{{--                    --}}{{--                            <!--end::Lable-->--}}
{{--                    --}}{{--                        </div>--}}
{{--                </div>--}}
{{--                <!--end::Body-->--}}
{{--            </div>--}}
{{--            <!--end::List Widget 2-->--}}
{{--        </div>--}}
        <div class="col-xxl-9">
            <form method="post" action="{{ route('carburant-prevision.store') }}">
                @csrf
                <div class="card card-xl-stretch">
                    <div class="card-header border-0 py-5 bg-warning">
                        <h3 class="card-title fw-bolder">Carburant prévision</h3>
                    </div>
                    <div class="card-body pt-5">
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="dateDu" class="col-5">Du</label>
                                    <input type="date" class="form-control col" id="dateDu" name="dateDu"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="dateAu" class="col-5">Au</label>
                                    <input type="date" class="form-control col" id="dateAu" name="dateAu"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="fournisseur" class="col-5">Axe</label>
                                    <input type="text" class="form-control col" id="axe" name="axe"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="typeVehicule" class="col-5">Type véhicule</label>
                                    <select class="form-control col" id="typeVehicule" name="typeVehicule">
                                        <option type="VL">VL</option>
                                        <option type="VB">VB</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="distance" class="col-5">Distance</label>
                                    <input type="number" class="form-control col" id="distance" name="distance"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="" class="col-5">Conso / 100</label>
                                    <input type="number" class="form-control col" id="conso100" name="conso100"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="litrage" class="col-5">Litrage</label>
                                    <input type="number" class="form-control col" id="litrage" name="litrage"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="coutCarburant" class="col-5">Coût carburant</label>
                                    <input type="number" class="form-control col" name="coutCarburant"/>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="dessSemaine" class="col-5">Dess/Semaine</label>
                                    <input type="number" class="form-control col" id="dessSemaine" name="dessSemaine"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="" class="col-5">Coût/Semaine</label>
                                    <input type="number" class="form-control col" id="coutSemaine" name="coutSemaine"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="litrage" class="col-5">Dess/Mois</label>
                                    <input type="number" class="form-control col" id="dessMois" name="dessMois"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="coutMois" class="col-5">Coût/Mois</label>
                                    <input type="number" class="form-control col" id="coutMois" name="coutMois"/>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col"></div>
                            <div class="col"></div>
                            <div class="col"></div>
                            <div class="col text-right"></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="reset" class="btn btn-info btn-sm">Effacer</button>
                        <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <table class="table table-bordered" style="width: 100%;" id="liste">
                        <thead>
                        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                            <th>Date debut</th>
                            <th>Date fin</th>
                            <th>Axe</th>
                            <th>Type</th>
                            <th>Km</th>
                            <th>Conso/100</th>
                            <th>Litrage</th>
                            <th>Litrage</th>
                            <th>Coût carburant</th>
                            <th>Dess/semaine</th>
                            <th>Cout/semaine</th>
                            <th>Dess/mois</th>
                            <th>Coût/mois</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($carburants as $carburant)
                            <tr>
                                <td>{{$carburant->dateDu}}</td>
                                <td>{{$carburant->dateAu}}</td>
                                <td>{{$carburant->dateAu}}</td>
                                <td>{{$carburant->axe}}</td>
                                <td>{{$carburant->typeVehicule}}</td>
                                <td>{{$carburant->distance}}</td>
                                <td>{{$carburant->conso100}}</td>
                                <td>{{$carburant->litrage}}</td>
                                <td>{{$carburant->coutCarburant}}</td>
                                <td>{{$carburant->dessSemaine}}</td>
                                <td>{{$carburant->coutSemaine}}</td>
                                <td>{{$carburant->dessMois}}</td>
                                <td>{{$carburant->coutMois}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#liste').DataTable({
            "language": {
                "url": "French.json"
            }
        });
    });
</script>
@endsection
