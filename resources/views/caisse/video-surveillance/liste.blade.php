@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Vidéo surveillance</h2></div>
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
                        <td>Date</td>
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
                                <a href="{{ route('caisse-video-surveillance.edit',$surveillance->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('caisse-video-surveillance.destroy', $surveillance->id)}}" method="post">
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

