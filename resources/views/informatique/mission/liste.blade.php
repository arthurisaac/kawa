@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Mission</h2></div>
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
                    <td>Cenntre</td>
                    <td>Centre régional</td>
                    <td>Service</td>
                    <td>Nombre de jours</td>
                    <td>Objet de la mission</td>
                    <td>Intervention effectuée</td>
                    <td>Rapport sur la mission</td>
                    <td>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($missions as $mission)
                    <tr>
                        <td>{{$mission->id}}</td>
                        <td>{{$mission->centre}}</td>
                        <td>{{$mission->centreRegional}}</td>
                        <td>{{$mission->service}}</td>
                        <td>{{$mission->nombreDeJours}}</td>
                        <td>{{$mission->objetMission}}</td>
                        <td>{{$mission->interventionEffectuee}}</td>
                        <td>{{$mission->rapportMission}}</td>
                        <td>
                            <a href="{{ route('informatique-mission.edit',$mission->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                            <form action="{{ route('informatique-mission.destroy', $mission->id)}}" method="post">
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
