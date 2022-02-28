@extends('bases.commercial')

@section('main')
    <link rel="stylesheet" href="{{ asset('css/tabstyles.css') }}">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">

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

            <form method="post" action="{{ route('commercial-site.update', $site->id) }}">
                @method('PATCH')
                @csrf

                <div class="card card-xxl-stretch">
                    <div class="card-body bg-card-kawa">
                        <div class="row">
                            <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                <label for="client"
                                       class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Client</label>
                                <select name="client" id="client" class="form-control col-sm-7" required>
                                    <option value="{{$site->clients->id}}">{{$site->clients->client_nom}}</option>
                                    @foreach ($clients as $client)
                                        <option value="{{$client->id}}"> {{$client->client_nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                <label for="site"
                                       class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Site</label>
                                <input id="site" type="text" name="site" class="form-control col-sm-7"
                                       value="{{$site->site}}"
                                       required/>
                            </div>
                            <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                <label for="nom_contact"
                                       class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Nom
                                    contact du site</label>
                                <input id="nom_contact" type="text" name="nom_contact_site"
                                       value="{{$site->nom_contact_site}}"
                                       class="form-control col-sm-7"/>
                            </div>
                            <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                <label for="fonction_contact"
                                       class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Fonction
                                    du contact</label>
                                <input id="fonction_contact" type="text" name="fonction_contact"
                                       value="{{$site->fonction_contact}}" class="form-control col-sm-7"/>
                            </div>

                        </div>
                        <div class="row">
                            <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                <label for="centre"
                                       class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Centre</label>
                                <select name="centre" id="centre" class="form-control col-sm-7" required>
                                    <option>{{$site->centre}}</option>
                                    @foreach ($centres as $centre)
                                        <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                <label for="centre_regional"
                                       class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Centre
                                    régional</label>
                                <select id="centre_regional" name="centre_regional" class="form-control col-sm-7"
                                        required>
                                    <option>{{$site->centre_regional}}</option>
                                </select>
                            </div>
                            <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                <label for="telephone"
                                       class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Telephone</label>
                                <input type="tel" id="telephone" name="telephone" value="{{$site->telephone}}"
                                       class="form-control col-sm-7"/>
                            </div>
                            <div class="d-flex flex-column mb-7 col-md-3 fv-row fv-plugins-icon-container">
                                <label for="numero_de_carte"
                                       class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Numéro
                                    de carte</label>
                                <input id="numero_de_carte" name="no_carte" type="text" value="{{$site->no_carte}}"
                                       class="form-control col-sm-7"/>
                            </div>
                        </div>
                    </div>
                </div>

                <br/>
                <ul class="nav nav-tabs tabs-dark bg-dark" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="transport-c-tab" data-toggle="tab" href="#transport-c" role="tab"
                           aria-controls="transport" aria-selected="true">Transport</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="atm-tab" data-toggle="tab" href="#atm-c" role="tab"
                           aria-controls="atm-c" aria-selected="false">ATM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="caisse-tab" data-toggle="tab" href="#caisse-c" role="tab"
                           aria-controls="caisse-c" aria-selected="false">Caisse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="materiel-c-tab" data-toggle="tab" href="#materiel-c" role="tab"
                           aria-controls="materiel" aria-selected="false">Petit matériel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="regime-c-tab" data-toggle="tab" href="#regime-c" role="tab"
                           aria-controls="regime" aria-selected="false">Régime</a>
                    </li>
                </ul>
                <br>
                <div class="card card-xxl-stretch">
                    <div class="card-body bg-card-kawa pt-3">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="transport-c" role="tabpanel"
                                 aria-labelledby="transport-c-tab">
                                <div class="col-6">
                                    <h6>Transport</h6>
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="cb_tdf_vb"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">VB
                                            extramuros bitume</label>
                                        <input type="number" class="col-sm-6 form-control form-control-sm"
                                               name="oo_vb_extamuros_bitume"
                                               id="oo_tdf_vb"
                                               value="{{$site->oo_vb_extamuros_bitume}}">
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="cb_tdf_vb"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">VB
                                            extramuros piste</label>
                                        <input type="number" class="col-sm-6 form-control form-control-sm"
                                               name="oo_vb_extramuros_piste"
                                               id="oo_tdf_vl"
                                               value="{{$site->oo_vb_extramuros_piste}}">
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="cb_tdf_vb"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">VL
                                            extramuros bitume</label>
                                        <input type="number" class="col-sm-6 form-control form-control-sm"
                                               name="oo_vl_extramuros_bitume"
                                               value="{{$site->oo_vl_extramuros_bitume}}">
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="cb_tdf_vb"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">VL
                                            extramuros piste</label>
                                        <input type="number" class="col-sm-6 form-control form-control-sm"
                                               name="oo_vl_extramuros_piste"
                                               value="{{$site->oo_vl_extramuros_piste}}">
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="cb_tdf_vb"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">VB
                                            (INTRAMUROS)</label>
                                        <input type="number" class="col-sm-6 form-control form-control-sm"
                                               name="oo_vb_intramuros"
                                               value="{{$site->oo_vb_intramuros}}">
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="cb_tdf_vb"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">VL
                                            (INTRAMUROS)</label>
                                        <input type="number" class="col-sm-6 form-control form-control-sm"
                                               name="oo_vl_intramuros"
                                               id="oo_tdf_vl"
                                               value="{{$site->oo_vl_intramuros}}">
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="oo_ass_appro"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Assistance
                                            appro dab</label>
                                        <input type="number" class="col-sm-6 form-control form-control-sm"
                                               name="oo_ass_appro" value="{{$site->oo_ass_appro}}" id="oo_ass_appro">
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="oo_dnf"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Dépôt
                                            non facturé</label>
                                        <input type="number" class="col-sm-6 form-control form-control-sm"
                                               name="oo_dnf" id="oo_dnf" value="{{$site->oo_dnf}}">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="atm-c" role="tabpanel" aria-labelledby="atm-tab">
                                <div class="col">
                                    <h6>ATM</h6>
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="cb_tdf_vb"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Borne
                                            chèque</label>
                                        <input type="number" class="col-sm-6 form-control form-control-sm"
                                               name="oo_borne_cheque"
                                               value="{{$site->oo_borne_cheque}}">
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="cb_tdf_vb"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Borne
                                            des opérations</label>
                                        <input type="number" class="col-sm-6 form-control form-control-sm"
                                               name="oo_borne_operation"
                                               value="{{$site->oo_borne_operation}}">
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label
                                            class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Gestion
                                            des GAB</label>
                                        <input type="text" class="col-sm-6 form-control form-control-sm"
                                               name="oo_gestion_gab" value="{{$site->oo_gestion_gab}}">
                                    </div>

                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="cb_tdf_vb"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Maintenance
                                            N2\N3</label>
                                        <input type="number" class="col-sm-6 form-control form-control-sm"
                                               name="oo_maintenance_n2"
                                               id="oo_garde_fond"
                                               value="{{$site->oo_maintenance_n2}}">
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="cb_tdf_vb"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Vente\location
                                            ATM</label>
                                        <input type="number" class="col-sm-6 form-control form-control-sm"
                                               name="oo_vente_location"
                                               id="oo_garde_fond"
                                               value="{{$site->oo_vente_location}}">
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="cb_tdf_vb"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Vente
                                            consommables</label>
                                        <input type="number" class="col-sm-6 form-control form-control-sm"
                                               name="oo_vente_consommables"
                                               id="oo_garde_fond"
                                               value="{{$site->oo_vente_consommables}}">
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="cb_tdf_vb"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Vente
                                            pièces détachées</label>
                                        <input type="number" class="col-sm-6 form-control form-control-sm"
                                               name="oo_vente_pieces_detachees"
                                               id="oo_garde_fond"
                                               value="{{$site->oo_vente_pieces_detachees}}">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="caisse-c" role="tabpanel" aria-labelledby="caisse-tab">
                                <div class="col">
                                    <h6>CAISSIERES</h6>
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label
                                            class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Garde
                                            de fond</label>
                                        <input type="text" class="col-sm-6 form-control form-control-sm"
                                               name="oo_garde_fond" value="{{$site->oo_garde_fond}}">
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label
                                            class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Opération
                                            comptage BCEAO</label>
                                        <input type="text" class="col-sm-6 form-control form-control-sm"
                                               name="oo_comptage" value="{{$site->oo_comptage}}">
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label
                                            class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Opération
                                            dispatching</label>
                                        <input type="text" class="col-sm-6 form-control form-control-sm"
                                               name="oo_dispatching" value="{{$site->oo_dispatching}}">
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="cb_tdf_vb"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">MAD</label>
                                        <input type="number" class="col-sm-6 form-control form-control-sm" name="oo_mad"
                                               value="{{$site->oo_mad}}">
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="cb_tdf_vb"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Collecte</label>
                                        <input type="number" class="col-sm-6 form-control form-control-sm"
                                               name="oo_collecte"
                                               value="{{$site->oo_collecte}}">
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="cb_tdf_vb"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">CCTV</label>
                                        <input type="number" class="col-sm-6 form-control form-control-sm"
                                               name="oo_cctv"
                                               value="{{$site->oo_cctv}}">
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="cb_tdf_vb"
                                               class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Collecte
                                            caisse</label>
                                        <input type="number" class="col-sm-6 form-control form-control-sm"
                                               name="oo_collecte_caisse"
                                               value="{{$site->oo_collecte_caisse}}">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="materiel-c" role="tabpanel" aria-labelledby="materiel-tab">
                                <div class="container-fluid">
                                    <h5>PETIT MATERIEL</h5>
                                    <h6>Sécuripack</h6>
                                    <div class="row">
                                        <div class="col">
                                            <div
                                                class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label
                                                    class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Extra
                                                    grand</label>
                                                <input type="number" min="0"
                                                       class="col-sm-6 form-control form-control-sm"
                                                       name="oo_securipack_extra_grand"
                                                       value="{{$site->oo_securipack_extra_grand}}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div
                                                class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label
                                                    class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Grand</label>
                                                <input type="number" min="0"
                                                       class="col-sm-6 form-control form-control-sm"
                                                       name="oo_securipack_grand"
                                                       value="{{$site->oo_securipack_grand}}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div
                                                class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label
                                                    class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Moyen</label>
                                                <input type="number" min="0"
                                                       class="col-sm-6 form-control form-control-sm"
                                                       name="oo_securipack_moyen"
                                                       value="{{$site->oo_securipack_moyen}}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div
                                                class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label
                                                    class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Petit</label>
                                                <input type="number" min="0"
                                                       class="col-sm-6 form-control form-control-sm"
                                                       name="oo_securipack_petit"
                                                       value="{{$site->oo_securipack_petit}}">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h6>Sac jute</h6>
                                    <div class="row">
                                        <div class="col">
                                            <div
                                                class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label
                                                    class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Extra
                                                    grand</label>
                                                <input type="number" min="0"
                                                       class="col-sm-6 form-control form-control-sm"
                                                       name="oo_sacjuste_extra_grand"
                                                       value="{{$site->oo_sacjuste_extra_grand}}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div
                                                class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label
                                                    class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Grand</label>
                                                <input type="number" min="0"
                                                       class="col-sm-6 form-control form-control-sm"
                                                       name="oo_sacjuste_grand" value="{{$site->oo_sacjuste_grand}}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div
                                                class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label
                                                    class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Moyen</label>
                                                <input type="number" min="0"
                                                       class="col-sm-6 form-control form-control-sm"
                                                       name="oo_sacjuste_moyen" value="{{$site->oo_sacjuste_moyen}}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div
                                                class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label
                                                    class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Petit</label>
                                                <input type="number" min="0"
                                                       class="col-sm-6 form-control form-control-sm"
                                                       name="oo_sacjuste_petit" value="{{$site->oo_sacjuste_petit}}">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    {{--<div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="cb_tdf_vb" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Sécuripacks</label>
                                        <select class="col-sm-6 form-control form-control-sm" name="oo_securipack">
                                            <option></option>
                                            <option value="Extra grand">Extra grand</option>
                                            <option value="Grand">Grand</option>
                                            <option value="Moyen">Moyen</option>
                                            <option value="Petit">Petit</option>
                                        </select>
                                        <input type="number" min="0" class="offset-6 col-sm-6 form-control form-control-sm"
                                               name="oo_securipack_prix">
                                    </div>
                                    <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                        <label for="cb_tdf_vb" class="d-flex align-items-center fs-6 fw-bold form-label text-black-50 mb-2">Sac jute</label>
                                        <select class="col-sm-6 form-control form-control-sm" name="oo_sac_juste">
                                            <option></option>
                                            <option value="Extra grand">Extra grand</option>
                                            <option value="Grand">Grand</option>
                                            <option value="Moyen">Moyen</option>
                                            <option value="Petit">Petit</option>
                                        </select>
                                        <input type="number" min="0" class="offset-6 col-sm-6 form-control form-control-sm"
                                               name="oo_sac_juste_prix">
                                    </div>--}}
                                    <h6>Scellé</h6>
                                    <div class="row">
                                        <div class="col-3">
                                            <div
                                                class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label for="cb_tdf_vb"
                                                       class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Extra
                                                    Grand</label>
                                                <input type="number" class="col-sm-6 form-control form-control-sm"
                                                       name="oo_scelle_extra_grand"
                                                       value="{{$site->oo_scelle_extra_grand}}">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div
                                                class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label for="cb_tdf_vb"
                                                       class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Grand</label>
                                                <input type="number" class="col-sm-6 form-control form-control-sm"
                                                       name="oo_scelle_grand" value="{{$site->oo_scelle_grand}}">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div
                                                class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label for="cb_tdf_vb"
                                                       class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Moyen</label>
                                                <input type="number" class="col-sm-6 form-control form-control-sm"
                                                       name="oo_scelle_moyen" value="{{$site->oo_scelle_moyen}}">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div
                                                class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                                <label for="cb_tdf_vb"
                                                       class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Petit</label>
                                                <input type="number" class="col-sm-6 form-control form-control-sm"
                                                       name="oo_scelle_petit" value="{{$site->oo_scelle_petit}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="regime-c" role="tabpanel" aria-labelledby="regime-tab">
                                <div class="col">
                                    <div>Régime</div>
                                    <br/>
                                    <br/>
                                    <div class="checkbox">
                                        <input type="checkbox" id="cb_intra_muros" name="regime" value="Intra muros">
                                        <label for="cb_intra_muros">Intra muros</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="cb_intra_muros" name="regime" value="Extra muros">
                                        <label for="cb_extra_muros">Extra muros</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary button btn-sm">Valider</button>
                        <button type="reset" class="btn btn-danger button btn-sm">Annuler</button>
                    </div>
                </div>
                <br/>
                <div class="row" style="display: none;">
                    <div class="form-group row col-3">
                        <label class="col-sm-4">Coût</label>
                        <input type="number" class="form-control col-sm-8" id="oo_total" name="oo_total"
                               value="{{$site->oo_total}}" readonly/>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        let centres =  {!! json_encode($centres) !!};
        let centres_regionaux = {!! json_encode($centres_regionaux) !!};

        $(document).ready(function () {
            $("#centre").on("change", function () {
                $("#centre_regional option").remove();
                $('#centre_regional').append($('<option>', {text: "Choisir centre régional"}));

                const centre = centres.find(c => c.centre === this.value);
                const regions = centres_regionaux.filter(region => {
                    return region.id_centre === centre.id;
                });
                regions.map(({centre_regional}) => {
                    $('#centre_regional').append($('<option>', {
                        value: centre_regional,
                        text: centre_regional
                    }));
                })
            });
        });
    </script>
    <script>
        let site =  {!! json_encode($site) !!};
        let total = 0;

        $(document).ready(function () {
            $("#oo_total").val(total);
            $("#centre").on("change", function () {
                $("#centre_regional option").remove();
                //$('#centre_regional').append($('<option>', {text: "Choisir centre régional"}));

                const centre = centres.find(c => c.centre === this.value);
                const regions = centres_regionaux.filter(region => {
                    return region.id_centre === centre.id;
                });
                regions.map(({centre_regional}) => {
                    $('#centre_regional').append($('<option>', {
                        value: centre_regional,
                        text: centre_regional
                    }));
                })
            });

            $("#oo_tdf_vb").on("change", function () {
                total = parseInt(this.value);
                $("#oo_total").val(total);
            });
            $("#oo_tdf_vl").on("change", function () {
                total = parseInt(this.value);
                $("#oo_total").val(total);
            });
            $("#oo_mad_caisse").on("change", function () {
                total = parseInt(this.value);
                $("#oo_total").val(total);
            });
            $("#oo_collecte").on("change", function () {
                total = parseInt(this.value);
                $("#oo_total").val(total);
            });
        });
        $(document).ready(function () {

            const objet_operation = site.objet_operation + "";
            const objet_operation_array = objet_operation.split(',');

            $("input[name='objet_operation[]']").map(function () {
                const value = $(this).val();
                if (objet_operation_array.includes(value)) $(this).prop("checked", true);
            });

            $("input[name='regime']").map(function () {
                const value = $(this).val();
                if (site.regime === value) $(this).prop("checked", true);
            });
        });

    </script>
@endsection
