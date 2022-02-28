@extends('bases.caisse')

@section('main')
    <!--begin::Toolbar-->
@extends('bases.toolbar', ["title" => "Caisse Centrale", "subTitle" => "Caisse centrale nouveau ctv"])
<!--end::Toolbar-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="row gy-5 g-xxl-12">
                <div class="col-xxl-12">
                    <form class="form-horizontal" action="#" method="get">
                        <div class="card card-xxl-stretch">
                            <div class="card-header border-0 py-5 bg-warning">
                                <h3 class="card-title fw-bolder">Caisse Centrale CTV</h3>
                            </div>
                            <div class="card-body bg-card-kawa 5">
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
                            <a href="/ctv-liste" class="btn btn-danger btn-sm">Effacer</a>
                            <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                            <a href="/ctv" class="btn btn-info btn-sm">Nouveau</a>
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
                        <td>date</td>
                        <td>Centre régional</td>
                        <td>Centre</td>
                        <td>Heure prise box</td>
                        <td>Heure fin box</td>
                        {{--<td>Tournee</td>
                        <td>Bordereau</td>
                        <td>Convoyeur de garde</td>
                        <td>Regulatrice</td>
                        <td>Securipack</td>
                        <td>Sac jute</td>
                        <td>Nombre de colis</td>
                        <td>Numero scelle colis</td>--}}
                        <td>Montant annoncé</td>
                        <td>Client</td>
                        <td>Site</td>
                        <td>Montant Reconnu</td>
                        <td>Ecart constaté</td>
                        <td>Montant Final</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($ctvs as $ctv)
                        <tr>
                            <td>{{$ctv->date}}</td>
                            <td>{{$ctv->centre_regional}}</td>
                            <td>{{$ctv->centre}}</td>
                            <td>{{$ctv->heurePriseBox}}</td>
                            <td>{{$ctv->heureFinBox}}</td>
                            {{--<td>{{$ctv->tournee}}</td>
                            <td>{{$ctv->bordereau}}</td>
                            <td>{{$ctv->convoyeurGarde}}</td>
                            <td>{{$ctv->regulatrice}}</td>
                            <td>{{$ctv->securipack}}</td>
                            <td>{{$ctv->sacjute}}</td>
                            <td>{{$ctv->nombreColis}}</td>
                            <td>{{$ctv->numeroScelleColis}}</td>--}}
                            <td>{{$ctv->montantAnnonce}}</td>
                            <td>{{$ctv->clients->client_nom ?? ''}}</td>
                            <td>{{$ctv->sites->site ?? ''}}</td>
                            <td>{{$ctv->montantReconnu}}</td>
                            <td>{{$ctv->ecartConstate}}</td>
                            <td>{{$ctv->montantFinal}}</td>
                            <td>
                                <a href="{{ route('ctv.edit', $ctv->id)}}" class="btn btn-primary btn-sm"></a>
                                <form action="{{ route('ctv.destroy', $ctv->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit"></button>
                                </form>
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
