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

        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>N°Bordereau</td>
                        <td>Destination</td>
                        <td>Montant</td>
                        <td>Scellé</td>
                        <td>Expéditeur</td>
                        <td>Client</td>
                        <td>Nom destinataire</td>
                        <td>Date de reception</td>
                        <td>Lieu</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($regulations as $regulation)
                        <tr>
                            <td>{{$regulation->id}}</td>
                            <td>{{$regulation->bordereau}}</td>
                            <td>{{$regulation->destination}}</td>
                            <td>{{$regulation->montant}}</td>
                            <td>{{$regulation->scelle}}</td>
                            <td>{{$regulation->expediteur}}</td>
                            <td>{{$regulation->client}}</td>
                            <td>{{$regulation->destinataire}}</td>
                            <td>{{$regulation->dateReception}}</td>
                            <td>{{$regulation->lieu}}</td>
                            <td>
                                <a href="{{ route('regulation-confirmation.edit',$regulation->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('regulation-confirmation.destroy', $regulation->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
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
