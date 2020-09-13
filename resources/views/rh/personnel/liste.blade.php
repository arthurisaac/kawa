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
                    <td>Motif</td>
                    <td>Fonction</td>
                    <td>Service</td>
                    <td>Nature contrat</td>
                    <td>Numéro CNPS</td>
                    <td>Situation matrimoniale</td>
                    <td>Nombre d'enfants</td>
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
                    <td>{{$personnel->typeSortie}}</td>
                    <td>{{$personnel->fonction}}</td>
                    <td>{{$personnel->service}}</td>
                    <td>{{$personnel->natureContrat}}</td>
                    <td>{{$personnel->numeroCNPS}}</td>
                    <td>{{$personnel->situationMatrimoniale}}</td>
                    <td>{{$personnel->nombreEnfants}}</td>
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
