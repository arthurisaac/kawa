@extends('bases.caisse')

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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Caisse Centrale
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                    <!--end::Separator-->
                    <!--begin::Description-->
                    <small class="text-muted fs-7 fw-bold my-1 ms-1">Liste Sortie colis</small>
                    <!--end::Description--></h1>
                <!--end::Title-->
            </div>
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
        <br>
        <br>
        <div class="row gy-5 g-xxl-12">
                <div class="col-xxl-12">
                    <form class="form-horizontal" action="#" method="get">
                        <div class="card card-xxl-stretch">
                            <div class="card-header border-0 py-5 bg-warning">
                                <h3 class="card-title fw-bolder">Caisse Centrale Liste sortie colis</h3>
                            </div>
                            <div class="card-body pt-5">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="debut" class="col-sm-5">Date début</label>
                                            <input type="date" class="form-control col" id="debut" name="debut" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="fin" class="col-sm-5">Date fin</label>
                                            <input type="date" class="form-control col" name="fin" id="fin" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="/caisse-entree-colis-liste" class="btn btn-danger btn-sm">Effacer</a>
                            <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                            <a href="/caisse-entree-colis" class="btn btn-info btn-sm">Nouveau</a>
                            <br>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
{{--        <form action="#" method="get">--}}
{{--            @csrf--}}
{{--            <div class="row">--}}
{{--                <div class="col-4">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="" class="col-sm-5">Date début</label>--}}
{{--                        <input type="date" name="debut" class="form-control col-sm-7">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col">--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="" class="col-sm-5">Date fin</label>--}}
{{--                        <input type="date" name="fin" class="form-control col-sm-7">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <button class="btn btn-primary btn-sm">Rechercher</button>--}}
{{--                </div>--}}
{{--                <div class="col"></div>--}}
{{--            </div>--}}
{{--        </form>--}}
        <div class="row">
            <div class="col">
                <table class="table table-striped gy-7 gs-7 pt-0" style="width: 100%;" id="liste">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                            <th>No</th>
                            <th>Date</th>
                            <th>Centre régional</th>
                            <th>Centre</th>
                            <th>Nbre Total colis</th>
                            <th>Receveur</th>
                            <th>Total valeur colis</th>
                            <th>No Tournee</th>
                            <th>Equipage</th>
                            {{--<td>Montant total</td>--}}
                            <td style="width: 50px;">Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($colis as $coli)
                        <tr>
                            <td>{{$coli->id}}</td>
                            <td>{{$coli->date}}</td>
                            <td>{{$coli->tournees->centre ?? ""}}</td>
                            <td>{{$coli->tournees->centre_regional ?? ""}}</td>
                            <td>{{$coli->items->sum('nbre_colis')}}</td>
                            <td>{{$coli->receveur}}</td>
                            <td>{{$coli->items->sum("valeur")}}</td>
                            <td>{{$coli->tournees->numeroTournee ?? ''}}</td>
                            <td>{{$coli->tournees->chefDeBords->nomPrenoms ?? ""}} //
                                {{$coli->tournees->agentDeGardes->nomPrenoms ?? ""}} //
                                {{$coli->tournees->chauffeurs->nomPrenoms ?? ""}} //</td>
                            <td>
                                <a href="{{ route('caisse-sortie-colis.edit',$coli->id)}}" class="btn btn-primary btn-sm"></a>
                                <a class="btn btn-danger btn-sm" onclick="supprimer('{{$coli->id}}', this)"></a>
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
                },
                "order": [[ 0, "desc" ]]
            });
        });
    </script>
    <script>
        function supprimer(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "caisse-sortie-colis/" + id,
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
                });


            }

        }
    </script>
@endsection
