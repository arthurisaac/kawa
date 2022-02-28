@extends('bases.transport')

@section('main')
    @extends('bases.toolbar', ["title" => "Transport", "subTitle" => "Liste Départ tournée"])
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
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
                        <div class="card-header border-0 bg-gradient-kawa">
                            <h3 class="card-title fw-bolder text-dark">Résultats</h3>
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
                                    <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">COUT TOTAL
                                        TOURNES</a>
                                    <span class="text-muted fw-bold d-block"></span>
                                </div>
                                <!--end::Title-->
                                <!--begin::Lable-->
                                <span class="fw-bolder text-danger py-1">{{$departTournee->sum('coutTournee')}}</span>
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
                                    <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">NOMBRE DE
                                        TOURNES</a>
                                    <span class="text-muted fw-bold d-block"></span>
                                </div>
                                <!--end::Title-->
                                <!--begin::Lable-->
                                <span class="fw-bolder text-danger py-1">{{count($departTournee)}}</span>
                                <!--end::Lable-->
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List Widget 2-->
                </div>
                <div class="col-xxl-9">
                    <form action="#" method="get">

                        <div class="card card-xl-stretch">
                            <div class="card-header border-0 py-5 bg-gradient-kawa">
                                <h3 class="card-title fw-bolder">Option de filtre</h3>
                            </div>
                            <div class="card-body bg-card-kawa 5">
                                <div class="row">
                                    <div class="d-flex flex-column mb-4 col-md-4 fv-row fv-plugins-icon-container">
                                        <label for=""
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date
                                            début</label>
                                        <input type="date" name="debut" class="form-control col-sm-7">
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-4 fv-row fv-plugins-icon-container">
                                        <label for=""
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date
                                            fin</label>
                                        <input type="date" name="fin" class="form-control col-sm-7">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-info btn-sm" type="submit">Rechercher</button>
                                <a href="/depart-tournee" class="btn btn-sm btn-primary">Nouveau</a>
                            </div>
                        </div>
                        @csrf

                    </form>
                </div>
            </div>

            <div class="card card-xl-stretch">
                <table class="table table-striped table-row-gray-300 align-middle gs-0 gy-4" id="table" style="width: 100%">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient-kawa">
                        <td>Création</td>
                        <td>Date</td>
                        <td>Centre régional</td>
                        <td>Centre</td>
                        <td>N°Tournée</td>
                        <td>Véhicule</td>
                        <td>Equipage</td>
                        <td>Km départ</td>
                        <td>Heure départ</td>
                        <td>Coût tournée</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($departTournee as $depart)
                        <tr>
                            <td>{{$depart->created_at}}</td>
                            <td>{{$depart->date}}</td>
                            <td>{{$depart->centre}}</td>
                            <td>{{$depart->centre_regional}}</td>
                            <td>{{$depart->numeroTournee}}</td>
                            <td>{{strtoupper($depart->vehicules->immatriculation) ?? 'vehicule supprimé ' . $depart->idVehicule}}</td>
                            <td>{{$depart->chefDeBords->nomPrenoms ?? ""}} //
                                {{$depart->agentDeGardes->nomPrenoms ?? ""}} //
                                {{$depart->chauffeurs->nomPrenoms ?? ""}} //
                            </td>
                            <td>{{$depart->kmDepart}}</td>
                            <td>{{$depart->heureDepart}}</td>
                            <td>{{$depart->coutTournee}}</td>
                            <td style="width: 100px;">
                                    <a href="{{ route('depart-tournee.edit',$depart->id)}}"
                                       class="btn btn-primary btn-sm"></a>
                                    <button class="btn btn-danger btn-sm"
                                            onclick="supprimer('{{$depart->id}}', this)"></button>
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
            $('#table').DataTable({
                "language": {
                    "url": "French.json"
                },
                "order": [[0, "desc"]]
            });
        });
    </script>
    <script>
        function supprimer(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "depart-tournee/" + id,
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
                        document.getElementById("table").deleteRow(indexLigne);
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
