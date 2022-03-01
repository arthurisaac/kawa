@extends('bases.regulation')

@section('main')
    @extends('bases.toolbar', ["title" => "Regulation", "subTitle" => "Liste Service"])
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br/>contrat_objet
            @endif

            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col">
                    <form action="#" method="get">
                        @csrf
                        <div class="card card-xl-stretch">
                            <div class="card-header border-0 py-5 bg-gradient-kawa">
                                <div class="card-title fw-bolder">
                                    Filtre de recherche service
                                </div>
                            </div>
                            <div class="card-body bg-card-kawa pt-2">
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date début</label>
                                            <input type="date" name="debut" class="form-control col-sm-7">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                            <label for="" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Date fin</label>
                                            <input type="date" name="fin" class="form-control col-sm-7">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="/regulation-service-liste" class="btn btn-danger btn-sm">Effacer</a>
                            <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                            <a href="/regulation-service" class="btn btn-info btn-sm">Nouveau</a>
                        </div>
                    </form>
                </div>
                <br>
                <div class="col pt-8">
                    <table class="table table-bordered" style="width: 100%;" id="liste">
                        <thead>
                        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
    background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                            <td>N°</td>
                            <td>Date</td>
                            <td>Centre</td>
                            <td>Centre Régional</td>
                            <td>Chargée de Caisse</td>
                            <td>Heure prise service</td>
                            <td>Heure fin service</td>
                            <td>Chargée de Caisse adjointe</td>
                            <td>Heure prise service</td>
                            <td>Heure fin service</td>
                            <td>Actions</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{{$service->id}}</td>
                                <td>{{$service->date}}</td>
                                <td>{{$service->centre}}</td>
                                <td>{{$service->centreRegional}}</td>
                                <td>{{$service->chargeRegulations->nomPrenoms ?? ""}}</td>
                                <td>{{$service->chargeeRegulationHPS}}</td>
                                <td>{{$service->chargeeRegulationHFS}}</td>
                                <td>{{$service->chargeRegulationAdjointes->nomPrenoms ?? ""}}</td>
                                <td>{{$service->chargeeRegulationAdjointeHPS}}</td>
                                <td>{{$service->chargeeRegulationAdjointeHFS}}</td>
                                <td>
                                    <a href="{{ route('regulation-service.edit',$service->id)}}" class="btn btn-primary btn-sm"></a>
                                    <form action="{{ route('regulation-service.destroy', $service->id)}}" method="post">
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
    </div>
    <script>
        $(document).ready(function () {
            $('#liste').DataTable({
                "language": {
                    "url": "French.json"
                },
                "order": [ 0, 'desc' ],
            });
        });
    </script>
@endsection
