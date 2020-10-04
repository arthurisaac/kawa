@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">SSB</h2></div>
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
                        <td>N°Incident</td>
                        <td>Numéro bordereau</td>
                        <td>Date</td>
                        <td>Site</td>
                        <td>Banque</td>
                        <td>Centre</td>
                        <td>Centre régional</td>
                        <td>Intervention</td>
                        <td>Observation</td>
                        <td>Dabiste1</td>
                        <td>Dabiste2</td>
                        <td>Heure declaration</td>
                        <td>Heure réponse</td>
                        <td>Heure arrivée</td>
                        <td>Date clôture</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($ssb as $item)
                        <tr>
                            <td>{{$item->numeroIncident}}</td>
                            <td>{{$item->numeroBordereau}}</td>
                            <td>{{$item->site}}</td>
                            <td>{{$item->banque}}</td>
                            <td>{{$item->centre}}</td>
                            <td>{{$item->centreRegional}}</td>
                            <td>{{$item->intervention}}</td>
                            <td>{{$item->dabiste1}}</td>
                            <td>{{$item->dabiste2}}</td>
                            <td>{{$item->heureDeclaration}}</td>
                            <td>{{$item->heureReponse}}</td>
                            <td>{{$item->heureArrivee}}</td>
                            <td>{{$item->debutIntervention}}</td>
                            <td>{{$item->finIntervention}}</td>
                            <td>{{$item->dateCloture}}</td>
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
