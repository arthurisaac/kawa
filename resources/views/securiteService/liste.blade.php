@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                <td>Date</td>
                <td>Centre</td>
                <td>Cs Nom</td>
                <td>Cs Prénom</td>
                <td>Cs Fonction</td>
                <td>Cs Matricule</td>
                <td>Cs HPS</td>
                <td>Cs HFS</td>
                <td>EQ1 OR1 Nom</td>
                <td>EQ1 OR1 Prénom</td>
                <td>EQ1 OR1 Fonction</td>
                <td>EQ1 OR1 Matricule</td>
                <td>EQ1 OR1 HPS</td>
                <td>EQ1 OR1 HFS</td>
                <td>EQ1 OR2 Nom</td>
                <td>EQ1 OR2 Prénom</td>
                <td>EQ1 OR2 Fonction</td>
                <td>EQ1 OR2 Matricule</td>
                <td>EQ1 OR2 HPS</td>
                <td>EQ1 OR2 HFS</td>
                <td>EQ2 OR1 Nom</td>
                <td>EQ2 OR1 Prénom</td>
                <td>EQ2 OR1 Fonction</td>
                <td>EQ2 OR1 Matricule</td>
                <td>EQ2 OR1 HPS</td>
                <td>EQ2 OR1 HFS</td>
                <td>EQ2 OR2 Nom</td>
                <td>EQ2 OR2 Prénom</td>
                <td>EQ2 OR2 Fonction</td>
                <td>EQ2 OR2 Matricule</td>
                <td>EQ2 OR2 HPS</td>
                <td>EQ2 OR2 HFS</td>
                <td>EQ3 OR1 Nom</td>
                <td>EQ3 OR1 Prénom</td>
                <td>EQ3 OR1 Fonction</td>
                <td>EQ3 OR1 Matricule</td>
                <td>EQ3 OR1 HPS</td>
                <td>EQ3 OR1 HFS</td>
                <td>EQ3 OR2 Nom</td>
                <td>EQ3 OR2 Prénom</td>
                <td>EQ3 OR2 Fonction</td>
                <td>EQ3 OR2 Matricule</td>
                <td>EQ3 OR2 HPS</td>
                <td>EQ3 OR2 HFS</td>
            </tr>
            </thead>
            <tbody>
            @foreach($securiteServices as $service)
                <tr>
                <td>{{$service->date}}</td>
                <td>{{$service->centre}}</td>
                <td>{{$service->nomChargeDeSecurite}}</td>
                <td>{{$service->prenomChargeDeSecurite}}</td>
                <td>{{$service->fonctionChargeDeSecurite}}</td>
                <td>{{$service->matriculeChargeDeSecurite}}</td>
                <td>{{$service->heureDePriseServiceCs}}</td>
                <td>{{$service->csHeureDeFinDeService}}</td>
                <td>{{$service->eop11Nom}}</td>
                <td>{{$service->eop11Prenom}}</td>
                <td>{{$service->eop11Fonction}}</td>
                <td>{{$service->eop11Matricule}}</td>
                <td>{{$service->eop11HeurePriseServ}}</td>
                <td>{{$service->eop11HeureFinService}}</td>
                <td>{{$service->eop112Nom}}</td>
                <td>{{$service->eop12Prenom}}</td>
                <td>{{$service->eop12Fonction}}</td>
                <td>{{$service->eop12Matricule}}</td>
                <td>{{$service->eop12HeurePriseServ}}</td>
                <td>{{$service->eop12HeureFinService}}</td>
                <td>{{$service->eop21Nom}}</td>
                <td>{{$service->eop21Prenom}}</td>
                <td>{{$service->eop21Fonction}}</td>
                <td>{{$service->eop21Matricule}}</td>
                <td>{{$service->eop21HeurePriseServ}}</td>
                <td>{{$service->eop21HeureFinService}}</td>
                <td>{{$service->eop22Nom}}</td>
                <td>{{$service->eop22Prenom}}</td>
                <td>{{$service->eop22Fonction}}</td>
                <td>{{$service->eop22Matricule}}</td>
                <td>{{$service->eop22HeurePriseServ}}</td>
                <td>{{$service->eop22HeureFinService}}</td>
                <td>{{$service->eop31Nom}}</td>
                <td>{{$service->eop31Prenom}}</td>
                <td>{{$service->eop31Fonction}}</td>
                <td>{{$service->eop31Matricule}}</td>
                <td>{{$service->eop31HeurePriseServ}}</td>
                <td>{{$service->eop31HeureFinService}}</td>
                <td>{{$service->eop32Nom}}</td>
                <td>{{$service->eop32Prenom}}</td>
                <td>{{$service->eop32Fonction}}</td>
                <td>{{$service->eop32Matricule}}</td>
                <td>{{$service->eop32HeurePriseServ}}</td>
                <td>{{$service->eop32HeureFinService}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
