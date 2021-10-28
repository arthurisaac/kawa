@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">CTV</h2></div>
        <br/>
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

        <a href="/ctv" class="btn btn-info btn-sm">Nouveau</a>
        <br>
        <form action="#" method="get">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group row">
                        <label for="" class="col-sm-5">Date début</label>
                        <input type="date" name="debut" class="form-control col-sm-7">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="" class="col-sm-5">Date fin</label>
                        <input type="date" name="fin" class="form-control col-sm-7">
                    </div>
                </div>
                <div class="col">
                    <button class="btn btn-primary btn-sm">Rechercher</button>
                </div>
                <div class="col"></div>
            </div>
        </form>
        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                    <tr>
                        <td>date</td>
                        <td>Operatrice</td>
                        <td>Numero de box</td>
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
                        <td>Expediteur</td>
                        <td>Destinataire</td>
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
                            <td>{{$ctv->operatriceCaisse}}</td>
                            <td>{{$ctv->numeroBox}}</td>
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
                            <td>{{$ctv->client}}</td>
                            <td>{{$ctv->site}}</td>
                            <td>{{$ctv->expediteur}}</td>
                            <td>{{$ctv->destinataire}}</td>
                            <td>{{$ctv->montantReconnu}}</td>
                            <td>{{$ctv->ecartConstate}}</td>
                            <td>{{$ctv->montantFinal}}</td>
                            <td>
                                <a href="{{ route('ctv.edit',$ctv->id)}}" class="btn btn-primary btn-sm"></a>
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
