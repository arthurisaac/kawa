@extends('bases.securite')

@section('main')
    @extends('bases.toolbar', ["title" => "Sécurité", "subTitle" => "Matériel | Liste de matériel"])
<div class="burval-container">
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
            {{--            <div class="col-xxl-3">--}}
            {{--                <!--begin::List Widget 2-->--}}
            {{--                <div class="card card-xl-stretch mb-xxl-8">--}}
            {{--                    <!--begin::Header-->--}}
            {{--                    <div class="card-header border-0" style="background: rgb(148,148,152);--}}
            {{--background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%);">--}}
            {{--                        <h3 class="card-title fw-bolder text-dark">Stats</h3>--}}
            {{--                    </div>--}}
            {{--                    <!--end::Header-->--}}
            {{--                    <!--begin::Body-->--}}
            {{--                    <div class="card-body pt-2">--}}
            {{--                        <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">--}}
            {{--                            <!--begin::Icon-->--}}
            {{--                            <span class="svg-icon svg-icon-warning me-5">--}}
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
            {{--                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Total tournée :</a>--}}
            {{--                                <span class="text-muted fw-bold d-block"></span>--}}
            {{--                            </div>--}}
            {{--                            <!--end::Title-->--}}
            {{--                            <!--begin::Lable-->--}}
            {{--                            <span class="fw-bolder text-danger py-1 totalVb" id="totalVb">{{count($tournees)}}</span>--}}
            {{--                            <!--end::Lable-->--}}
            {{--                        </div>--}}

            {{--                        <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">--}}
            {{--                            <!--begin::Icon-->--}}
            {{--                            <span class="svg-icon svg-icon-warning me-5">--}}
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
            {{--                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Temps parcouru :</a>--}}
            {{--                                <span class="text-muted fw-bold d-block"></span>--}}
            {{--                            </div>--}}
            {{--                            <!--end::Title-->--}}
            {{--                            <!--begin::Lable-->--}}
            {{--                            <span class="fw-bolder text-danger py-1 totalVl" id="tempsTotal"></span>--}}
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
            {{--                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Km parcouru :</a>--}}
            {{--                                <span class="text-muted fw-bold d-block"></span>--}}
            {{--                            </div>--}}
            {{--                            <!--end::Title-->--}}
            {{--                            <!--begin::Lable-->--}}
            {{--                            <span class="fw-bolder text-danger py-1" id="kmTotal"></span>--}}
            {{--                            <!--end::Lable-->--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <!--end::Body-->--}}
            {{--                </div>--}}
            {{--                <!--end::List Widget 2-->--}}
            {{--            </div>--}}
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
                        <a href="/materiel-liste" class="btn btn-info btn-sm">Effacer</a>
                        <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                        <a href="/materiel" class="btn btn-primary btn-sm">Nouveau</a>
                    </div>
            </div>
            @csrf
            </form>
        </div>
    <br>
{{--    <form action="materiel-liste" method="get">--}}
{{--        @csrf--}}
{{--        <div class="row">--}}
{{--            <div class="col-4">--}}
{{--                <div class="form-group row">--}}
{{--                    <label for="" class="col-sm-5">Date début</label>--}}
{{--                    <input type="date" name="debut" class="form-control col-sm-7">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col">--}}
{{--                <div class="form-group row">--}}
{{--                    <label for="" class="col-sm-5">Date fin</label>--}}
{{--                    <input type="date" name="fin" class="form-control col-sm-7">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col">--}}
{{--                <button class="btn btn-primary btn-sm">Rechercher</button>--}}
{{--            </div>--}}
{{--            <div class="col"></div>--}}
{{--        </div>--}}
{{--    </form>--}}
        <br>
    <div class="row">
        <div class="col">
            <table class="table table-striped gy-7 gs-7 pt-0" style="width: 100%" id="listeMateriels">
                <thead>
                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                    <th>Tournée N°</th>
                    <th>Date</th>
                    <th>Centre régional</th>
                    <th>Centre</th>
                    <th>Véhicule</th>
                    <th>Opérateur radio</th>
                    <th>Chef de bord</th>
                    <th>Opération Ajout/Modif</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($materiels as $materiel)
                <tr>
                    <td>{{$materiel->tournees->numeroTournee ?? 'Donnée indisponible'}}</td>
                    <td>{{$materiel->date}}</td>
                    <td>{{$materiel->tournees->centre ?? 'Donnée indisponible'}}</td>
                    <td>{{$materiel->tournees->vehicules->immatriculation ?? 'Donnée indisponible'}}</td>
                    <td>{{$materiel->tournees->centre_regional ?? 'Donnée indisponible'}}</td>
                    <td>{{$materiel->operateurRadios->nomPrenoms ?? ""}}</td>
                    <td>{{$materiel->cbs->nomPrenoms ?? 'Donnée indisponible'}}</td>
                    <td>
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('materiel.edit',$materiel->id)}}" class="btn btn-primary btn-sm"></a>
                            </div>
                            <div class="col">
                                <form action="{{ route('materiel.destroy', $materiel->id)}}" method="post">
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
    </div><br /><br />


</div>
<script>
    $(document).ready( function () {
        $('#listeMateriels').DataTable({
            "language": {
                "url": "French.json"
            }
        });
    });
</script>
@endsection
