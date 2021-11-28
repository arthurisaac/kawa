@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Confirmation clients</h2></div>
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

        <br>
        <a href="/regulation-confirmation" class="btn btn-info btn-sm">Nouveau</a>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>N°Bordereau</td>
                        <td>Device etrangere (XOF)</td>
                        <td>Device etrangere (Dollar)</td>
                        <td>Device etrangere (EURO)</td>
                        <td>Pierre précieuse</td>
                        <td>Scellé</td>
                        <td>Expéditeur</td>
                        <td>Client</td>
                        <td>Nom destinataire</td>
                        <td>Date de reception</td>
                        <td>Lieu</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($regulations as $regulation)
                        <tr>
                            <td>{{$regulation->id}}</td>
                            <td>{{$regulation->site->bordereau ?? ''}}</td>
                            <td>{{$regulation->site->valeur_colis_xof_arrivee ?? ''}}</td>
                            <td>{{$regulation->site->device_etrangere_dollar_arrivee ?? ''}}</td>
                            <td>{{$regulation->site->device_etrangere_euro_arrivee ?? ''}}</td>
                            <td>{{$regulation->site->pierre_precieuse_arrivee ?? ''}}</td>
                            <td>{{$regulation->site->numero ?? ''}}</td>
                            <td>{{$regulation->site->sites->clients->client_nom ?? ''}}</td>
                            <td>{{$regulation->site->sites->clients->client_nom ?? ''}}</td>
                            <td>{{$regulation->site->sites->site ?? 'Destinataire inconnu'}}</td>
                            <td>{{$regulation->dateReception}}</td>
                            <td>{{$regulation->lieu}}</td>
                            <td>
                                <a href="{{ route('regulation-confirmation.edit',$regulation->id)}}" class="btn btn-primary btn-sm"></a>
                                <form action="{{ route('regulation-confirmation.destroy', $regulation->id)}}" method="post">
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
