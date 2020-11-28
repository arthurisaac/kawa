@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Liste personnel</h2></div><br />
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
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
                    <td>N°</td>
                    <td>Nom et prénom</td>
                    <td>Date de naissance</td>
                    <td>Date d'entrée société</td>
                    <td>Date de sortie</td>
                    <td>Transport</td>
                    <td>Fonction</td>
                    <td>Service</td>
                    <td>Nature contrat</td>
                    <td>Numéro CNPS</td>
                    <td>Situation matrimoniale</td>
                    <td>Nombre d'enfants</td>
                    <td>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($personnels as $personnel)
                <tr>
                    <td>{{$personnel->id}}</td>
                    <td>{{$personnel->nomPrenoms}}</td>
                    <td>{{$personnel->dateNaissance}}</td>
                    <td>{{$personnel->dateEntreeSociete}}</td>
                    <td>{{$personnel->dateSortie}}</td>
                    <td>{{$personnel->transport}}</td>
                    <td>{{$personnel->fonction}}</td>
                    <td>{{$personnel->service}}</td>
                    <td>{{$personnel->natureContrat}}</td>
                    <td>{{$personnel->numeroCNPS}}</td>
                    <td>{{$personnel->situationMatrimoniale}}</td>
                    <td>{{$personnel->nombreEnfants}}</td>
                    <td>
                        <a href="{{ route('personnel.edit',$personnel->id)}}" class="btn btn-primary btn-sm"></a>
                        <form action="{{ route('personnel.destroy', $personnel->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit"></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table><br /><br />

            {{--<table class="table table-bordered" id="liste2">
                <thead>
                <tr>
                    <td>N°</td>
                    <td>Date dernier départ congés</td>
                    <td>Date prochain départ congés</td>
                    <td>Nombre jours pris</td>
                    <td>Nombre jours restant</td>
                    <td>Avertissement</td>
                    <td>Mise à pied</td>
                    <td>Licenciement</td>
                    <td>Adresse géographique</td>
                    <td>Contact personnels</td>
                    <td>Nom du père</td>
                    <td>Nom de la mère</td>
                    <td>Nom de conjoint</td>
                    <td>Personnes à contacter</td>
                    <td>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($personnels as $personnel)
                <tr>
                    <td>{{$personnel->id}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{$personnel->adresseGeographique}}</td>
                    <td>{{$personnel->contactPersonnel}}</td>
                    <td>{{$personnel->nomPere}}</td>
                    <td>{{$personnel->nomMere}}</td>
                    <td>{{$personnel->nomConjoint}}</td>
                    <td>{{$personnel->personneContacter}}</td>
                    <td>
                        <a href="{{ route('personnel.edit',$personnel->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                        <form action="{{ route('personnel.destroy', $personnel->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                        </form>
                    </td>
                    @endforeach
                </tr>
                </tbody>
            </table>--}}
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
    $(document).ready( function () {
        $('#liste2').DataTable({
            "language": {
                "url": "French.json"
            }
        });
    });
</script>
@endsection
