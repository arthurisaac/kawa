@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Commercial</h2></div>
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

        <form class="form-horizontal" method="post" action="{{ route('ssb-commercial.update', $commercial->id) }}">
            @csrf
            @method('PATCH')

            <p>INFORMATIONS GENERALES</p>
            <hr class="title-separator"/>
            <br/>

            <input type="hidden" name="id_client" id="id_client"/>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="client_nom" class="col-sm-5">Nom du client</label>
                        <input type="text" name="nomClient" value="{{$commercial->nomClient}}" id="client_nom" class="editbox col-sm-7" required/>
                        <div>
                            <ul id="list-clients"></ul>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="client_situation_geographique" class="col-sm-5">Situation géographique</label>
                        <input type="text" name="situationGeographique" value="{{$commercial->situationGeographique}}" id="client_situation_geographique"
                               class="editbox col-sm-7"/>
                    </div>
                    <div class="form-group row">
                        <label for="client_tel" class="col-sm-5">TEL/FAX</label>
                        <input type="text" name="telephoneClient" value="{{$commercial->telephoneClient}}" id="client_tel" class="editbox col-sm-7"/>
                    </div>
                    <div class="form-group row">
                        <label for="client_regime" class="col-sm-5">Régime impot</label>
                        <input type="text" name="regimeImpot" value="{{$commercial->regimeImpot}}" id="client_regime_impot" class="editbox col-sm-7"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="client_boite_postale" class="col-sm-5">Boîte postale</label>
                        <input type="text" name="boitePostale" value="{{$commercial->boitePostale}}" id="client_boite_postale" class="editbox col-sm-7"/>
                    </div>
                    <div class="form-group row">
                        <label for="client_ville" class="col-sm-5">Ville</label>
                        <input type="text" name="ville" value="{{$commercial->ville}}" id="client_ville" class="editbox col-sm-7"/>
                    </div>
                    <div class="form-group row">
                        <label for="client_rc" class="col-sm-5">RC</label>
                        <input type="text" name="rc" value="{{$commercial->rc}}" id="client_rc" class="editbox col-sm-7"/>
                    </div>
                    <div class="form-group row">
                        <label for="client_ncc" class="col-sm-5">NCC</label>
                        <input type="text" name="ncc" value="{{$commercial->ncc}}" id="client_ncc" class="editbox col-sm-7"/>
                    </div>
                </div>
                <div class="col">
                    <div>
                        <button class="btn btn-primary btn-sm button" type="submit">Valider</button>
                    </div>
                    <br/>
                    <div>
                        <button class="btn btn-danger btn-sm button" type="reset">Annuler</button>
                    </div>
                    <br/>
                    <br/>
                    <div>
                        <a href="javascript:popupwnd('ssb-site','no','no','no','no','no','no','','','1200','600')"
                           target="_self" class="btn btn-sm btn-outline-info" type="button" style="min-width: 150px">Site</a>
                        {{--<a href="javascript:popupwnd('ssb-site-liste','no','no','no','no','no','no','','','1200','600')"
                           target="_self" class="btn btn-sm btn-outline-info" type="button" style="min-width: 150px">Site</a>--}}
                    </div>
                </div>
            </div>

            <!-- CONTACT -->
            <br/>
            <p>CONTACT</p>
            <hr class="title-separator"/>
            <br/>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="contact_nom" class="col-sm-5">Nom contact</label>
                        <input type="text" name="nomContact" value="{{$commercial->nomContact}}" id="contact_nom" class="editbox col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label for="contact_email" class="col-sm-5">Email</label>
                        <input type="email" name="emailContact"  value="{{$commercial->emailContact}}" id="contact_email" class="editbox col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label for="contact_portefeuille" class="col-sm-5">Porte feuille client</label>
                        <input type="text" name="portefeuilleClient" value="{{$commercial->portefeuilleClient}}" id="contact_portefeuille" class="editbox col-sm-7">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="contact_fonction" class="col-sm-5">Fonction</label>
                        <input type="text" name="fonction" value="{{$commercial->fonction}}" id="contact_fonction" class="editbox col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label for="contact_portable" class="col-sm-5">Tel portable</label>
                        <input type="tel" name="telephoneContact" value="{{$commercial->telephoneContact}}" id="contact_portable" class="editbox col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label for="contact_secteur_activite" class="col-sm-5">Secteur d'activité</label>
                        <input type="text" name="secteurActivite" value="{{$commercial->secteurActivite}}" id="contact_secteur_activite"
                               class="editbox col-sm-7">
                    </div>
                </div>
                <div class="col"></div>
            </div>

            <!-- CONTRAT -->
            <br/>
            <p>CONTRAT</p>
            <hr class="title-separator"/>
            <br/>
            <div class="row">
                <div class="col">
                    <br />
                    <div class="form-group row">
                        <label for="contrat_numero" class="col-sm-5">N° Contrat</label>
                        <input type="text" name="numeroContrat" value="{{$commercial->numeroContrat}}" id="numeroContrat" class="editbox col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label for="contrat_date_effet" class="col-sm-5">Date effet</label>
                        <input type="date" name="dateEffet" value="{{$commercial->dateEffet}}" id="contrat_date_effet" class="editbox col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label for="contrat_duree" class="col-sm-5">Durée</label>
                        <input type="number" name="dureeContrat" value="{{$commercial->dureeContrat}}" id="contrat_duree" class="editbox col-sm-7">
                    </div>
                </div>
                <div class="col">
                    <label>Objet</label>
                    <div class="form-group row">
                        <label class="col-sm-5">Arrêté physique</label>
                        <input type="text" name="objetArretePhysique" value="{{$commercial->objetArretePhysique}}" class="form-control col-sm-7" />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Arrêté comptable</label>
                        <input type="text" name="objetArreteComptable" value="{{$commercial->objetArreteComptable}}" class="form-control col-sm-7" />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Approvisionnement</label>
                        <input type="text" name="objetApprovisionnement" value="{{$commercial->objetApprovisionnement}}" class="form-control col-sm-7" />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Niveau 1</label>
                        <input type="text" name="objetNiveau1" value="{{$commercial->objetNiveau1}}" class="form-control col-sm-7" />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Niveau 2</label>
                        <input type="text" name="objetNiveau2" value="{{$commercial->objetNiveau2}}" class="form-control col-sm-7" />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Niveau 3</label>
                        <input type="text" name="objetNiveau3" value="{{$commercial->objetNiveau3}}" class="form-control col-sm-7" />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Accompagnement</label>
                        <input type="text" name="objetAccompagnement" value="{{$commercial->objetAccompagnement}}" class="form-control col-sm-7" />
                    </div>

                </div>
                <div class="col">
                    <label>Base tarifaire</label>
                    <div class="form-group row">
                        <label class="col-sm-5">Arrêté physique</label>
                        <input type="text" name="baseArretePhysique" value="{{$commercial->baseArretePhysique}}" class="form-control col-sm-7" />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Arrêté comptable</label>
                        <input type="text" name="baseArreteComptable" value="{{$commercial->baseArreteComptable}}" class="form-control col-sm-7" />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Approvisionnement</label>
                        <input type="text" name="baseApprovisionnement" value="{{$commercial->baseApprovisionnement}}" class="form-control col-sm-7" />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Niveau 1</label>
                        <input type="text" name="baseNiveau1" value="{{$commercial->baseNiveau1}}" class="form-control col-sm-7" />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Niveau 2</label>
                        <input type="text" name="baseNiveau2" value="{{$commercial->baseNiveau2}}" class="form-control col-sm-7" />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Niveau 3</label>
                        <input type="text" name="baseNiveau3" value="{{$commercial->baseNiveau3}}" class="form-control col-sm-7" />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Accompagnement</label>
                        <input type="text" name="baseAccompagnement" value="{{$commercial->baseAccompagnement}}" class="form-control col-sm-7" />
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        {{--<input type="checkbox" name="coutUnitaire" value="Coût unitaire">--}}
                        <label class="col-sm-5">Coût unitaire</label>
                        <input type="number" name="coutUnitaire" class="form-control col-sm-7" value="Coût unitaire">
                    </div>
                    <div class="form-group row">
                        {{--<input type="checkbox" id="cb_fo_permanent" name="coutForfaitaire" value="Coût forfetaire">--}}
                        <label class="col-sm-5" for="cb_fo_permanent">Coût forfetaire</label>
                        <input type="number" id="cb_fo_permanent" name="coutForfaitaire" value="Coût forfetaire" class="form-control col-sm-7">
                    </div>
                    <br />
                    <div class="form-group row">
                        <label class="col-sm-3">Montant</label>
                        <input type="number" min="0" value="{{$commercial->montant}}" name="montant" class="form-control col-sm-9" >
                    </div>
                    <br/>
                </div>
            </div>

        </form>
    </div>

@endsection
