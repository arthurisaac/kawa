@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Matériel</h2></div>
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
    <div class="row">
        <div class="col">
            <table class="table table-bordered" style="width: 100%;" id="listeMateriels">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Véhicule VB</th>
                    <th>Véhicule VL</th>
                    <th>Tournée N°</th>
                    <th>Equipe CB Nom</th>
                    <th>Equipe CB Prenom</th>
                    <th>Equipe CB Fonction</th>
                    <th>Equipe CB Matricule</th>
                    <th>Equipe CC Nom</th>
                    <th>Equipe CC Prenom</th>
                    <th>Equipe CC Fonction</th>
                    <th>Equipe CC Matricule</th>
                    <th>Equipe CG Nom</th>
                    <th>Equipe CG Prenom</th>
                    <th>Equipe CG Fonction</th>
                    <th>Equipe CG Matricule</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($materiels as $materiel)
                <tr>
                    <td>{{$materiel->date}}</td>
                    <td>{{$materiel->vehiculeVB}}</td>
                    <td>{{$materiel->vehiculeVL}}</td>
                    <td>{{$materiel->noTournee}}</td>
                    <td>{{$materiel->cbNom}}</td>
                    <td>{{$materiel->cbPrenom}}</td>
                    <td>{{$materiel->cbFonction}}</td>
                    <td>{{$materiel->cbMatricule}}</td>
                    <td>{{$materiel->ccNom}}</td>
                    <td>{{$materiel->ccPrenom}}</td>
                    <td>{{$materiel->ccFonction}}</td>
                    <td>{{$materiel->ccMatricule}}</td>
                    <td>{{$materiel->ccNom}}</td>
                    <td>{{$materiel->ccPrenom}}</td>
                    <td>{{$materiel->ccFonction}}</td>
                    <td>{{$materiel->ccMatricule}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div><br /><br />

    <p>REMETTANTS</p>
    <div class="row">
        <div class="col">
            <table class="table table-bordered" style="width: 100%;" id="listeRemettants">
                <thead>
                <tr>
                    <th>Opérateur radio</th>
                    <th>OR Nom</th>
                    <th>OR Prénom</th>
                    <th>OR Fonction</th>
                    <th>OR Matricule</th>
                    <th>OR HPS</th>
                    <th>OR HFS</th>
                    <th>Pièce de véhicule</th>
                    <th>Pièce de véhicule qté</th>
                    <th>Pièce de véhicule HR</th>
                    <th>Pièce de véhicule Conv.</th>
                    <th>Clés véhicules</th>
                    <th>Clés véhicules qté</th>
                    <th>Clés véhicules HR</th>
                    <th>Clés véhicules Conv.</th>
                    <th>Tel.</th>
                    <th>Tel. qté</th>
                    <th>Tel. HR</th>
                    <th>Tel. Conv.</th>
                    <th>Radio portative</th>
                    <th>Radio portative qté</th>
                    <th>Radio portative HR</th>
                    <th>Radio portative Conv.</th>
                    <th>GBP</th>
                    <th>GBP qté</th>
                    <th>GBP HR</th>
                    <th>GBP Conv.</th>
                    <th>PA</th>
                    <th>PA qté</th>
                    <th>PA HR</th>
                    <th>PA Conv.</th>
                    <th>FP</th>
                    <th>FP qté</th>
                    <th>FP HR</th>
                    <th>FP Conv.</th>
                    <th>PM</th>
                    <th>PM qté</th>
                    <th>PM HR</th>
                    <th>PM conv.</th>
                    <th>Minutions</th>
                    <th>Minutions Qté</th>
                    <th>Minutions HR</th>
                    <th>Minutions Conv.</th>
                    <th>TAG</th>
                    <th>TAG qté</th>
                    <th>TAG HR</th>
                    <th>TAG Conv.</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($remettants as $remettant)
                    <tr>
                        <td>{{$remettant->materiels->operateurRadio}}</td>
                        <td>{{$remettant->materiels->operateurRadioNom}}</td>
                        <td>{{$remettant->materiels->operateurRadioPrenom}}</td>
                        <td>{{$remettant->materiels->operateurRadioFonction}}</td>
                        <td>{{$remettant->materiels->operateurRadioMatricule}}</td>
                        <td>{{$remettant->materiels->operateurRadioHeurePrise}}</td>
                        <td>{{$remettant->materiels->operateurRadioHeureFin}}</td>
                        <td>{{$remettant->remettantPieceVehicule}}</td>
                        <td>{{$remettant->remettantPieceVehiculeQuantite}}</td>
                        <td>{{$remettant->remettantPieceVehiculeHeureRetour}}</td>
                        <td>{{$remettant->remettantPieceVehiculeConvoyeur}}</td>
                        <td>{{$remettant->remettantCleVehicule}}</td>
                        <td>{{$remettant->remettantCleVehiculeQuantite}}</td>
                        <td>{{$remettant->remettantCleVehiculeHeureRetour}}</td>
                        <td>{{$remettant->remettantCleVehiculeConvoyeur}}</td>
                        <td>{{$remettant->remettantTelephone}}</td>
                        <td>{{$remettant->remettantTelephoneQuantite}}</td>
                        <td>{{$remettant->remettantTelephoneHeureRetour}}</td>
                        <td>{{$remettant->remettantTelephoneConvoyeur}}</td>
                        <td>{{$remettant->remettantRadio}}</td>
                        <td>{{$remettant->remettantRadioQuantite}}</td>
                        <td>{{$remettant->remettantRadioHeureRetour}}</td>
                        <td>{{$remettant->remettantRadioConvoyeur}}</td>
                        <td>{{$remettant->remettantGBP}}</td>
                        <td>{{$remettant->remettantGBPQuantite}}</td>
                        <td>{{$remettant->remettantGBPHeureRetour}}</td>
                        <td>{{$remettant->remettantGBPConvoyeur}}</td>
                        <td>{{$remettant->remettantPA}}</td>
                        <td>{{$remettant->remettantPAQuantite}}</td>
                        <td>{{$remettant->remettantPAHeureRetour}}</td>
                        <td>{{$remettant->remettantPAConvoyeur}}</td>
                        <td>{{$remettant->remettantFP}}</td>
                        <td>{{$remettant->remettantFPQuantite}}</td>
                        <td>{{$remettant->remettantFPHeureRetour}}</td>
                        <td>{{$remettant->remettantFPConvoyeur}}</td>
                        <td>{{$remettant->remettantPM}}</td>
                        <td>{{$remettant->remettantPMQuantite}}</td>
                        <td>{{$remettant->remettantPMHeureRetour}}</td>
                        <td>{{$remettant->remettantPMConvoyeur}}</td>
                        <td>{{$remettant->remettantMunition}}</td>
                        <td>{{$remettant->remettantMunitionQuantite}}</td>
                        <td>{{$remettant->remettantMunitionHeureRetour}}</td>
                        <td>{{$remettant->remettantMunitionConvoyeur}}</td>
                        <td>{{$remettant->remettantTAG}}</td>
                        <td>{{$remettant->remettantTAGQuanite}}</td>
                        <td>{{$remettant->remettantTAGHeureRetour}}</td>
                        <td>{{$remettant->remettantTAGConvoyeur}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div><br />

    <p>BENEFICIAIRES</p>
    <div class="row">
        <div class="col">
            <table class="table table-bordered" style="width: 100%;" id="listeBeneficiaires">
                <thead>
                <tr>
                    <th>Opérateur radio</th>
                    <th>OR Nom</th>
                    <th>OR Prénom</th>
                    <th>OR Fonction</th>
                    <th>OR Matricule</th>
                    <th>OR HPS</th>
                    <th>OR HFS</th>
                    <th>Pièce de véhicule</th>
                    <th>Pièce de véhicule qté</th>
                    <th>Pièce de véhicule HR</th>
                    <th>Pièce de véhicule Conv.</th>
                    <th>Clés véhicules</th>
                    <th>Clés véhicules qté</th>
                    <th>Clés véhicules HR</th>
                    <th>Clés véhicules Conv.</th>
                    <th>Tel.</th>
                    <th>Tel. qté</th>
                    <th>Tel. HR</th>
                    <th>Tel. Conv.</th>
                    <th>Radio portative</th>
                    <th>Radio portative qté</th>
                    <th>Radio portative HR</th>
                    <th>Radio portative Conv.</th>
                    <th>GBP</th>
                    <th>GBP qté</th>
                    <th>GBP HR</th>
                    <th>GBP Conv.</th>
                    <th>PA</th>
                    <th>PA qté</th>
                    <th>PA HR</th>
                    <th>PA Conv.</th>
                    <th>FP</th>
                    <th>FP qté</th>
                    <th>FP HR</th>
                    <th>FP Conv.</th>
                    <th>PM</th>
                    <th>PM qté</th>
                    <th>PM HR</th>
                    <th>PM conv.</th>
                    <th>Minutions</th>
                    <th>Minutions Qté</th>
                    <th>Minutions HR</th>
                    <th>Minutions Conv.</th>
                    <th>TAG</th>
                    <th>TAG qté</th>
                    <th>TAG HR</th>
                    <th>TAG Conv.</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($beneficiaires as $beneficiaire)
                    <tr>
                        <td>{{$beneficiaire}}</td>
                        <td>{{$beneficiaire->materiels->operateurRadioNom}}</td>
                        <td>{{$beneficiaire->materiels->operateurRadioPrenom}}</td>
                        <td>{{$beneficiaire->materiels->operateurRadioFonction}}</td>
                        <td>{{$beneficiaire->materiels->operateurRadioMatricule}}</td>
                        <td>{{$beneficiaire->materiels->operateurRadioHeurePrise}}</td>
                        <td>{{$beneficiaire->materiels->operateurRadioHeureFin}}</td>
                        <td>{{$beneficiaire->beneficiairePieceVehicule}}</td>
                        <td>{{$beneficiaire->beneficiairePieceVehiculeQuantite}}</td>
                        <td>{{$beneficiaire->beneficiairePieceVehiculeHeureRetour}}</td>
                        <td>{{$beneficiaire->beneficiairePieceVehiculeConvoyeur}}</td>
                        <td>{{$beneficiaire->beneficiaireCleVehicule}}</td>
                        <td>{{$beneficiaire->beneficiaireCleVehiculeQuantite}}</td>
                        <td>{{$beneficiaire->beneficiaireCleVehiculeHeureRetour}}</td>
                        <td>{{$beneficiaire->beneficiaireCleVehiculeConvoyeur}}</td>
                        <td>{{$beneficiaire->beneficiaireTelephone}}</td>
                        <td>{{$beneficiaire->beneficiaireTelephoneQuantite}}</td>
                        <td>{{$beneficiaire->beneficiaireTelephoneHeureRetour}}</td>
                        <td>{{$beneficiaire->beneficiaireTelephoneConvoyeur}}</td>
                        <td>{{$beneficiaire->beneficiaireRadio}}</td>
                        <td>{{$beneficiaire->beneficiaireRadioQuantite}}</td>
                        <td>{{$beneficiaire->beneficiaireRadioHeureRetour}}</td>
                        <td>{{$beneficiaire->beneficiaireRadioConvoyeur}}</td>
                        <td>{{$beneficiaire->beneficiaireGBP}}</td>
                        <td>{{$beneficiaire->beneficiaireGBPQuantite}}</td>
                        <td>{{$beneficiaire->beneficiaireGBPHeureRetour}}</td>
                        <td>{{$beneficiaire->beneficiaireGBPConvoyeur}}</td>
                        <td>{{$beneficiaire->beneficiairePA}}</td>
                        <td>{{$beneficiaire->beneficiairePAQuantite}}</td>
                        <td>{{$beneficiaire->beneficiairePAHeureRetour}}</td>
                        <td>{{$beneficiaire->beneficiairePAConvoyeur}}</td>
                        <td>{{$beneficiaire->beneficiaireFP}}</td>
                        <td>{{$beneficiaire->beneficiaireFPQuantite}}</td>
                        <td>{{$beneficiaire->beneficiaireFPHeureRetour}}</td>
                        <td>{{$beneficiaire->beneficiaireFPConvoyeur}}</td>
                        <td>{{$beneficiaire->beneficiairePM}}</td>
                        <td>{{$beneficiaire->beneficiairePMQuantite}}</td>
                        <td>{{$beneficiaire->beneficiairePMHeureRetour}}</td>
                        <td>{{$beneficiaire->beneficiairePMConvoyeur}}</td>
                        <td>{{$beneficiaire->beneficiaireMunition}}</td>
                        <td>{{$beneficiaire->beneficiaireMunitionQuantite}}</td>
                        <td>{{$beneficiaire->beneficiaireMunitionHeureRetour}}</td>
                        <td>{{$beneficiaire->beneficiaireMunitionConvoyeur}}</td>
                        <td>{{$beneficiaire->beneficiaireTAG}}</td>
                        <td>{{$beneficiaire->beneficiaireTAGQuanite}}</td>
                        <td>{{$beneficiaire->beneficiaireTAGHeureRetour}}</td>
                        <td>{{$beneficiaire->beneficiaireTAGConvoyeur}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>
<script>
    $(document).ready( function () {
        $('#listeMateriels').DataTable({
            "language": {
                "url": "French.json"
            }
        });
        $('#listeRemettants').DataTable({
            "language": {
                "url": "French.json"
            }
        });
        $('#listeBeneficiaires').DataTable({
            "language": {
                "url": "French.json"
            }
        });
    });
</script>
@endsection
