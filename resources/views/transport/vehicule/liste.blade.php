@extends('bases.transport')

@section('main')
    @extends('bases.toolbar', ["title" => "Transport", "subTitle" => "Véhicule Liste"])
@section("filter")
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
            <!--end::Svg Icon-->Filtrer
        </a>
        <!--begin::Menu 1-->
        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_61484bf44d957">
            <!--begin::Header-->
            <div class="px-7 py-5">
                <div class="fs-5 text-dark fw-bolder">Options de filtre</div>
            </div>
            <!--end::Header-->
            <!--begin::Menu separator-->
            <div class="separator border-gray-200"></div>
            <!--end::Menu separator-->
            <!--begin::Form-->
            <form action="#" method="GET">
                <div class="px-7 py-5">
                    <!--begin::Input group-->
                    <div class="mb-10">
                        <!--begin::Label-->
                        <label class="form-label fw-bold">N°Immatriculation:</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div>
                            <select id="client" class="form-select form-select-solid" data-kt-select2="true"
                                    data-placeholder="Selectionner un N°Immatriculation"
                                    data-dropdown-parent="#kt_menu_61484bf44d957" data-allow-clear="true">
                                <option></option>
                                @foreach ($vehicules as $vehicule)
                                    <option value="{{$vehicule->immatriculation}}">{{ $vehicule->immatriculation }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--end::Input-->
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Menu 1-->
        <!--end::Menu-->
    </div>
@endsection
<div class="burval-container">
    <br />
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
                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Total de VB</a>
                                <span class="text-muted fw-bold d-block"></span>
                            </div>
                            <!--end::Title-->
                            <!--begin::Lable-->
                            <span class="fw-bolder text-danger py-1 totalVb" id="totalVb">{{count($vbs)}}</span>
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
                            <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Total VL</a>
                            <span class="text-muted fw-bold d-block"></span>
                        </div>
                        <!--end::Title-->
                        <!--begin::Lable-->
                        <span class="fw-bolder text-danger py-1 totalVl" id="totalVl">{{count($vls)}}</span>
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
                            <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Total moto</a>
                            <span class="text-muted fw-bold d-block"></span>
                        </div>
                        <!--end::Title-->
                        <!--begin::Lable-->
                        <span class="fw-bolder text-danger py-1">{{count($motos)}}</span>
                        <!--end::Lable-->
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget 2-->
        </div>
        <div class="col-xl-9">
            <form action="#" method="get">

                <div class="card card-xl-stretch">
                    <div class="card-header border-0 py-5 bg-warning">
                        <h3 class="card-title fw-bolder">Option de filtre</h3>
                    </div>
                    <div class="card-body pt-5">
                        <div class="row">
                            <div class="col">
                                <div class="form-group row">
                                    <label for="centre_regional" class="col-5">Centre Régional</label>
                                    <select name="centre_regional" id="centre_regional" class="form-select col">
                                        <option></option>
                                        @foreach ($centres_regionaux as $centre)
                                            <option value="{{$centre->centre_regional}}">{{ $centre->centre_regional }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="centre" class="col-5">Centre</label>
                                    <select id="centre" name="centre" class="form-select col">
                                        <option></option>
                                        @foreach ($centres as $centre)
                                            <option value="{{$centre->centre}}">{{ $centre->centre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="type" class="col-5">Type</label>
                                    <select id="type" name="type" class="form-select col">
                                        <option></option>
                                        @foreach ($types as $type)
                                            <option value="{{$type->type}}">{{ $type->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="marque" class="col-5">Marque</label>
                                    <select id="marque" name="marque" class="form-select col">
                                        <option></option>
                                        @foreach ($marques as $marque)
                                            <option value="{{$marque->marque}}">{{ $marque->marque }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col"></div>
                            <div class="col"></div>
                            <div class="col text-right">

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="/vehicule-liste" class="btn btn-info btn-sm">Effacer</a>
                        <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                        <a href="/vehicule" class="btn btn-sm btn-primary">Nouveau</a>
                    </div>
                </div>
                @csrf

            </form>
        </div>
    </div>
    <br>
    <br />
    <br>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered table-hover" style="width: 100%" id="liste">
                <thead>
                <tr>
                    <td>Immatriculation</td>
                    <td>Marque</td>
                    <td>Type</td>
                    <td>Code</td>
                    <td>N°Chassis</td>
                    <td>DPMC</td>
                    <td>Date acquisition</td>
                    <td>centre</td>
                    <td>Centre Régional</td>
                    <td>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($vehicules as $vehicule)
                <tr>
                    <td>{{strtoupper($vehicule->immatriculation)}}</td>
                    <td>{{$vehicule->marque}}</td>
                    <td>{{$vehicule->type}}</td>
                    <td>{{$vehicule->code}}</td>
                    <td>{{$vehicule->num_chassis}}</td>
                    <td>{{date('d/m/Y', strtotime($vehicule->DPMC))}}</td>
                    <td>{{date('d/m/Y', strtotime($vehicule->dateAcquisition))}}</td>
                    <td>{{$vehicule->centre}}</td>
                    <td>{{$vehicule->centreRegional}}</td>
                    <td>
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('vehicule.edit',$vehicule->id)}}" class="btn btn-primary btn-sm"></a>
                            </div>
                            <div class="col">
                                <form action="{{ route('vehicule.destroy', $vehicule->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit"></button>
                                </form>
                            </div>
                        </div>
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
        $('#liste').DataTable({
            "language": {
                "url": "French.json"
            }
        });
    });
</script>
@endsection
