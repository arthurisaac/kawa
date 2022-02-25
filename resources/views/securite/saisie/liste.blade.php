@extends('bases.securite')

@section('main')
    @extends('bases.toolbar', ["title" => "Sécurité", "subTitle" => "Saisie | Liste Saisie"])
    <link rel="stylesheet" href="{{ asset('css/tabstyles.css') }}">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
@section("nouveau")
    <a href="/saisie" class="btn btn-sm btn-primary">Nouveau</a>
@endsection

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col">
            <table class="table table-striped gy-7 gs-7 pt-0" style="width: 100%" id="liste">
                <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                        <th>Date</th>
                        <th>Type jour</th>
                        <th>Nom et prénoms</th>
                        <th>Heure arrivée</th>
                        <th>Heure départ</th>
                        <th>Heure arrivée 1</th>
                        <th>Heure depart 1</th>
                        <th>Heure arrivée 2</th>
                        <th>Heure départ 2</th>
                        <th>Heure arrivée 3</th>
                        <th>Heure départ 3</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saisies as $saisie)
                        <tr>
                            <td>{{$saisie->date}}</td>
                            <td>{{$saisie->typeDate}}</td>
                            <td>{{$saisie->personnels->nomPrenoms}}</td>
                            <td>{{$saisie->heureArrivee}}</td>
                            <td>{{$saisie->heureDepart}}</td>
                            <td>{{$saisie->heureArrivee1}}</td>
                            <td>{{$saisie->heureDepart1}}</td>
                            <td>{{$saisie->heureArrivee2}}</td>
                            <td>{{$saisie->heureDepart2}}</td>
                            <td>{{$saisie->heureArrivee3}}</td>
                            <td>{{$saisie->heureDepart3}}</td>
                            <td>
                                <a href="{{ route('saisie.edit',$saisie->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('saisie.destroy', $saisie->id)}}" method="post">
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
    $(document).ready( function () {
        $('#liste').DataTable({
            "language": {
                "url": "French.json"
            }
        });
    });
</script>
@endsection
