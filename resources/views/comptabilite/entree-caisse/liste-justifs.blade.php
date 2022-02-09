@extends('bases.caisse')

@section('main')

    @extends('bases.toolbar', ["title" => "Comptabilité", "subTitle" => "Liste des justificatifs"])
    @section("nouveau")
        <a href="/comptabilite-entree-caisse" class="btn btn-sm btn-info">Ajouter</a>
    @endsection

    <div class="post d-flex flex-column-fluid">
        <div id="kt_content_container" class="container-xxl">

            <div class="row">
                <div class="col-xl-3">
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0">
                            <h3 class="card-title fw-bolder text-dark">Statistiques</h3>
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
                                    <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Total sortie</a>
                                    <span class="text-muted fw-bold d-block"></span>
                                </div>
                                <!--end::Title-->
                                <!--begin::Lable-->
                                <span class="fw-bolder text-warning py-1">{{$entreeCaisses->sum('somme')}}</span>
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
                                    <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Total montant justifié</a>
                                    <span class="text-muted fw-bold d-block"></span>
                                </div>
                                <!--end::Title-->
                                <!--begin::Lable-->
                                <span class="fw-bolder text-info py-1">{{$entreeCaisses->sum('montant_justifie')}}</span>
                                <!--end::Lable-->
                            </div>
                            <div class="d-flex align-items-center bg-light-danger rounded p-5 mb-7">
                                <!--begin::Icon-->
                                <span class="svg-icon svg-icon-danger me-5">
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
                                    <a href="#" class="fw-bolder text-gray-800 text-hover-danger fs-6">Total montant non justifié</a>
                                    <span class="text-muted fw-bold d-block"></span>
                                </div>
                                <!--end::Title-->
                                <!--begin::Lable-->
                                <span class="fw-bolder text-danger py-1">{{$entreeCaisses->sum('montant_non_justifie')}}</span>
                                <!--end::Lable-->
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    
                </div>
                <div class="col-xl-9">
                    <form action="#" method="get">
                        @csrf

                        <div class="card card-xl-stretch">
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title fw-bolder">Option de filtre</h3>
                            </div>
                            <div class="card-body pt-5">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="" class="col">Date début</label>
                                            <input type="date" name="debut" class="form-control col">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="" class="col">Date fin</label>
                                            <input type="date" name="fin" class="form-control col">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label class="col" for="service">Service</label>
                                            <input id="service" name="service" class="form-control col" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label class="col" for="deposant">Receveur</label>
                                            <input id="deposant" name="deposant" class="form-control col" />
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary btn-sm text-end" type="submit">Rechercher</button>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
            
            <div class="card card-xl-stretch">
                <table class="table table-striped gy-7 gs-7" style="width: 100%;" id="liste">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Centre</td>
                            <td>Centre régional</td>
                            <td>Date</td>
                            <td>Receveur</td>
                            <td>Somme sortie</td>
                            <td>Montant justifié</td>
                            <td>Montant non justifié</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($entreeCaisses as $entreeCaisse)
                        <tr>
                            <td>{{$entreeCaisse->id}}</td>
                            <td>{{$entreeCaisse->centre}}</td>
                            <td>{{$entreeCaisse->centre_regional}}</td>
                            <td>{{$entreeCaisse->date}}</td>
                            <td>{{$entreeCaisse->deposant}}</td>
                            <td class="somme">{{$entreeCaisse->somme}}</td>
                            <td>{{$entreeCaisse->montant_justifie}}</td>
                            <td>{{$entreeCaisse->montant_non_justifie}}</td>
                            <td>
                                <div class="two-columns">
                                    <div>
                                        <a href="{{ route('comptabilite-entree-caisse.edit', $entreeCaisse->id)}}" class="btn btn-primary btn-sm"></a>
                                    </div>
                                    <div>
                                        <form action="{{ route('comptabilite-entree-caisse.destroy', $entreeCaisse->id)}}" method="post">
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
        function totalEntree(){
            let entree = 0;
            let sortie = 0;
            $('tr').each(function () {
                const row = $(this);
                row.find('.somme').each(function () {
                    const somme = $(this).text();
                    console.log('somme', somme);
                    row.find('.mouvement').each(function () {
                        console.log('mouvement', $(this).text());
                        if ($(this).text() === 'Entrée') {
                            if (!isNaN(somme) && somme.length !== 0) {
                                entree += parseFloat(somme);
                            }
                        } else if ($(this).text() === 'Sortie') {
                            if (!isNaN(somme) && somme.length !== 0) {
                                sortie += parseFloat(somme);
                            }
                        }
                    });
                });
            });
            $("#totalEntree").html(entree);
            $("#totalSortie").html(sortie);
        }
        $(document).ready(function () {
            $('#liste').DataTable({
                "language": {
                    "url": "French.json"
                },
                "order": [[ 0, "desc" ]]
            });
        });
    </script>
@endsection
