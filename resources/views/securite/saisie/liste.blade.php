@extends('bases.securite')

@section('main')
    @extends('bases.toolbar', ["title" => "Sécurité", "subTitle" => "Saisie | Liste Saisie"])
@section("nouveau")
    <a href="/saisie" class="btn btn-sm btn-primary">Nouveau</a>
@endsection
<div class="burval-container">
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
