@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Virgilométrie</h2></div>
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
                    <td>Date</td>
                    <td>Nom et prénoms</td>
                    <td>Heure d'arrivée</td>
                    <td>Type de pièce</td>
                    <td>Personne visitée</td>
                    <td>Motif</td>
                    <td>Heure de départ</td>
                    <td>Observation</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($virgils as $virgil)
                    <tr>
                        <td>{{$virgil->id}}</td>
                        <td>{{$virgil->date}}</td>
                        <td>{{$virgil->nomPrenoms}}</td>
                        <td>{{$virgil->heureArrivee}}</td>
                        <td>{{$virgil->typePiece}}</td>
                        <td>{{$virgil->personneVisitee}}</td>
                        <td>{{$virgil->motif}}</td>
                        <td>{{$virgil->heureDepart}}</td>
                        <td>{{$virgil->observation}}</td>
                        <td>
                            <a href="{{ route('virgilometrie.edit.edit',$virgil->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                            <form action="{{ route('virgilometrie.destroy', $virgil->id)}}" method="post">
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
