@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Entretien véhicule</h2></div>
        <div class="container">
            <div class="row">
                <div class="col-3">
                        <a class="btn btn-primary btn-block" href="javascript:popupwnd('vidange-generale','no','no','no','yes','yes','no','','','1200','500')"
                           target="_self">Vidange générale</a>
                </div>
                <div class="col-3">
                        <a class="btn btn-primary btn-block" href="javascript:popupwnd('vidange-pont','no','no','no','yes','yes','no','','','1000','600')"
                           target="_self">Vidange huile de pont</a>
                </div>
                <div class="col-3">
                        <a class="btn btn-primary btn-block" href="javascript:popupwnd('vidange-courroie','no','no','no','yes','yes','no','','','1000','600')"
                           target="_self">Courroie</a>
                </div>
                <div class="col-3">
                    <a class="btn btn-primary btn-block"
                       href="javascript:popupwnd('vidange-vignette','no','no','no','yes','yes','no','','','1000','500')"
                       target="_self">Vignette</a>
                </div>
            </div><br />
            <div class="row">
                <div class="col-3">
                    <a class="btn btn-primary btn-block"
                       href="javascript:popupwnd('vidange-transport','no','no','no','yes','yes','no','','','1000','800')"
                       target="_self">Carte de transport</a>
                </div>
                <div class="col-3">
                    <a class="btn btn-primary btn-block"
                       href="javascript:popupwnd('vidange-assurance','no','no','no','yes','yes','no','','','1000','800')"
                       target="_self">Assurance</a>
                </div>
                <div class="col-3">
                    <a class="btn btn-primary btn-block"
                       href="javascript:popupwnd('vidange-patente','no','no','no','yes','yes','no','','','1000','800')">Patente</a>
                </div>
                <div class="col-3">
                    <a class="btn btn-primary btn-block"
                       href="javascript:popupwnd('vidange-visite','no','no','no','yes','yes','no','','','1000','500')"
                       target="_self">Visite technique</a>
                </div>
            </div><br />
            <div class="row">
                <div class="col-3">
                    <a class="btn btn-primary"
                       href="javascript:popupwnd('vidange-stationnement','no','no','no','yes','yes','no','','','1000','500')"
                       target="_self">Carte stationnement</a>
                </div>

            </div>
        </div>
    </div>
@endsection
