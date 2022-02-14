@extends('bases.informatique')

@section('main')
    @extends('bases.toolbar', ["title" => "Informatique", "subTitle" => "Liste Mission"])
    <div class="burval-container">
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
            <table class="table table-bordered table-hover"  style="width: 100%" id="liste">
                <thead>
                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
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
