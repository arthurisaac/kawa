@extends('base-v1')

@section('main')
    <link rel="stylesheet" href="{{ asset('css/burval.css') }}">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Comptabilite
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                    <!--end::Separator-->
                    <!--begin::Description-->
                    <small class="text-muted fs-7 fw-bold my-1 ms-1">Nouvelle facture</small>
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
                                <label class="form-label fw-bold">Bordereau:</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div>
                                    <select id="client" class="form-select form-select-solid" data-kt-select2="true"
                                            data-placeholder="Selectionner un bordereau"
                                            data-dropdown-parent="#kt_menu_61484bf44d957" data-allow-clear="true">
                                        {{--                                       --}}
                                        {{--                                        @foreach ($clients as $clt)--}}
                                        {{--                                            <option value="{{$clt->id}}">{{ $clt->client_nom }}</option>--}}
                                        {{--                                        @endforeach--}}
                                    </select>
                                </div>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Menu 1-->
                    <!--end::Menu-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Button-->
                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app"
                   id="kt_toolbar_primary_button">Nouveau</a>
                <!--end::Button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            {{--<div class="titre"><span class="titre">Chiffre d'affaire</span> : <span id="chiffreAffaire"
                                                                                    class="text-danger chiffreAffaire"></span>
                <span
                    style="margin-left: 10px;">Nombre de passage : <span
                        class="text-danger">{{count($sites)}}</span></span>
            </div>--}}
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

        <a href="/comptabilite-entree-caisse" class="btn btn-sm btn-info">Ajouter</a>
        <br>
        <br>
        <div class="titre">
            <div class="row">
                <div class="col">
                    <span class="text-left">Total entrée: <span class="text-danger" id="totalEntree"></span></span><br>
                    <span class="text-left">Total sortie: <span class="text-danger" id="totalSortie"></span></span><br>
                </div>
                <div class="col"></div>
            </div>
        </div>
        <br>

        <form action="#" method="get">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="" class="col-sm-5">Date début</label>
                        <input type="date" name="debut" class="form-control col-sm-7">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="" class="col-sm-5">Date fin</label>
                        <input type="date" name="fin" class="form-control col-sm-7">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5" for="mouvement">Mouvement</label>
                        <select id="mouvement" name="mouvement" class="form-control col-sm-7">
                            <option></option>
                            <option>Entrée</option>
                            <option>Sortie</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5" for="service">Service</label>
                        <input id="service" name="service" class="form-control col-sm-7" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5" for="deposant">Déposant</label>
                        <input id="deposant" name="deposant" class="form-control col-sm-7" />
                    </div>
                </div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col text-right">
                    <button class="btn btn-primary btn-sm text-right mt-8 text-lg-end" style="margin-left: 10px;">Rechercher</button>
                </div>
            </div>
            <br>
        </form>
        <br>

        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Mouvement</td>
                            <td>Date</td>
                            <td>Centre</td>
                            <td>Centre régional</td>
                            <td>Somme</td>
                            <td>Motif</td>
                            <td>Déposant</td>
                            <td>Service</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($entreeCaisses as $entreeCaisse)
                        <tr>
                            <td>{{$entreeCaisse->id}}</td>
                            <td class="mouvement">{{$entreeCaisse->mouvement}}</td>
                            <td>{{$entreeCaisse->date}}</td>
                            <td>{{$entreeCaisse->centre}}</td>
                            <td>{{$entreeCaisse->centre_regional}}</td>
                            <td class="somme">{{$entreeCaisse->somme}}</td>
                            <td>{{$entreeCaisse->motif}}</td>
                            <td>{{$entreeCaisse->deposant}}</td>
                            <td>{{$entreeCaisse->service}}</td>
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
                }
            });

            totalEntree();
        });
    </script>
@endsection
