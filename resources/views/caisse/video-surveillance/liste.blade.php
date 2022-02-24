@extends('bases.caisse')

@section('main')
    @extends('bases.toolbar', ["title" => "Caisse Centrale", "subTitle" => "Vidéo surveillance"])
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
                <div class="col-xxl-12">
                    <form class="form-horizontal" action="#" method="get">
                        <div class="card card-xxl-stretch">
                            <div class="card-header border-0 py-5 bg-warning">
                                <h3 class="card-title fw-bolder">Caisse Centrale CTV Video</h3>
                            </div>
                            <div class="card-body pt-5">
                                <div class="row">
                                    <div class="d-flex flex-column mb-7 col-md-6 fv-row fv-plugins-icon-container">
                                        <label for="debut" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Date début</label>
                                        <input type="date" class="col-sm-6 form-control form-control" id="debut" name="debut" required>
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-6 fv-row fv-plugins-icon-container">
                                        <label for="fin" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Date fin</label>
                                        <input type="date" class="col-sm-6 form-control form-control" name="fin" id="fin" required>
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
        <br>
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
                        <td>Date</td>
                        <td>Centre</td>
                        <td>Centre régionale</td>
                        <td>Opératrice</td>
                        <td>Heure début</td>
                        <td>Heure fin</td>
                        <td>Numéro de box</td>
                        <td>Opératrice</td>
                        <td>Sécuripack</td>
                        <td>Sac jute</td>
                        <td>Numéro scellé</td>
                        <td>Ecart</td>
                        <td>Erreur</td>
                        <td>Absence</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($surveillances as $surveillance)
                        <tr>
                            <td>{{$surveillance->date}}</td>
                            <td>{{$surveillance->centre}}</td>
                            <td>{{$surveillance->centre_regional}}</td>
                            <td>{{$surveillance->operatrices->operatrice->nomPrenoms ?? ''}}</td>
                            <td>{{$surveillance->heureDebut}}</td>
                            <td>{{$surveillance->heureFin}}</td>
                            <td>{{$surveillance->numeroBox}}</td>
                            <td>{{$surveillance->operatrice}}</td>
                            <td>{{$surveillance->securipack}}</td>
                            <td>{{$surveillance->sacjute}}</td>
                            <td>{{$surveillance->numeroScelle}}</td>
                            <td>{{$surveillance->ecart}}</td>
                            <td>{{$surveillance->erreur}}</td>
                            <td>{{$surveillance->commentaire}}</td>
                            <td>
                                <a href="{{ route('caisse-video-surveillance.edit',$surveillance->id)}}" class="btn btn-primary btn-sm"></a>
                                <form action="{{ route('caisse-video-surveillance.destroy', $surveillance->id)}}" method="post">
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

