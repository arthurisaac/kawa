@extends('bases.caisse')

@section('main')
    @extends('bases.toolbar', ["title" => "Caisse Centrale", "subTitle" => "Caisse centrale liste de service"])
    <div class="burval-container">
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
        <br>
        <div class="row gy-5 g-xxl-12">
            <div class="col-xxl-12">
                <form class="form-horizontal" action="#" method="get">
                    <div class="card card-xxl-stretch">
                        <div class="card-header border-0 py-5 bg-warning">
                            <h3 class="card-title fw-bolder">Caisse Centrale Service</h3>
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
                        <a href="/caisse-service-liste" class="btn btn-danger btn-sm">Effacer</a>
                        <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                        <a href="/caisse-service" class="btn btn-info btn-sm">Nouveau</a>
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
                        <td>ID</td>
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
                            <td>{{$service->chargeCaisses->nomPrenoms ?? ""}}</td>
                            <td>{{$service->chargeCaisseHPS}}</td>
                            <td>{{$service->chargeCaisseHFS}}</td>
                            <td>{{$service->chargeCaisseAdjoints->nomPrenoms ?? ""}}</td>
                            <td>{{$service->chargeCaisseAdjointHPS}}</td>
                            <td>{{$service->chargeCaisseAdjointHFS}}</td>
                            <td>
                                <a href="{{ route('caisse-service.edit',$service->id)}}" class="btn btn-primary btn-sm"></a>
                                <form action="{{ route('caisse-service.destroy', $service->id)}}" method="post">
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
                },
                "order": [[ 0, "desc" ]]
            });
        });
    </script>
@endsection
