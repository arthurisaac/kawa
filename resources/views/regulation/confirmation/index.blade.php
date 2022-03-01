@extends('bases.regulation')

@section('main')
    @extends('bases.toolbar', ["title" => "Regulation", "subTitle" => "Confirmation reception"])
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

            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <form method="post" action="{{ route('regulation-confirmation.store') }}">
                @csrf
                <div class="card card-xl-stretch">
                    <div class="card-header bg-gradient-kawa border-0 py-3">
                        <div class="card-title fw-folder pt-2">
                            confirmation Clients
                        </div>
                    </div>
                    <div class="card-body bg-card-kawa pt-3">
                        <div class="row">
                            <div class="col">
                                 <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="sites" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">N°Bordereau</label>
                                    <select id="sites" name="bordereau" class="form-select form-select-solid select2-hidden-accessible"
                                            data-control="select2"
                                            data-placeholder="Site"
                                            data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                            data-kt-select2="true"
                                            aria-hidden="true" required>
                                        @foreach($sites as $site)
                                            <option value="{{$site->id}}">{{$site->bordereau}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Numéro tournée</label>
                                    <input type="text" class="form-control col-sm-7" id="numeroTournee" readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="col-sm-5">Centre</label>
                                    <input type="text" class="form-control col-sm-7" id="centre" readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="col-sm-5">Centre régional</label>
                                    <input type="text" class="form-control col-sm-7" id="centre_regional" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="nbre_colis" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Nombre de colis</label>
                                    <input type="text" class="form-control col-sm-7" id="nbre_colis" readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Montant (Valeur Colis)</label>
                                    <input type="number" class="form-control col-sm-7" id="valeur_colis_xof" readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="client" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">CLIENT</label>
                                    <input type="text" name="client" class="form-control col-sm-7" id="client" readonly/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="scelle" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Scellé</label>
                                    <input name="scelle" id="scelle" type="text" class="form-control col-sm-7" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Confirmation</label>
                                    <select name="confirmation" class="form-select form-select-solid select2-hidden-accessible"
                                            data-control="select2"
                                            data-placeholder="Confirmation"
                                            data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                            data-kt-select2="true"
                                            aria-hidden="true">
                                        <option>conforme</option>
                                        <option>non conforme</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Devise</label>
                                    <select id="devise" name="devise" class="form-select form-select-solid select2-hidden-accessible"
                                            data-control="select2"
                                            data-placeholder="Dévise"
                                            data-select2-id="select2-data-10-7w18b" tabindex="-1"
                                            data-kt-select2="true"
                                            aria-hidden="true" required>
                                        <option></option>
                                        <option>XOF</option>
                                        <option>Dollar</option>
                                        <option>Euro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="nomDestinaire" class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Expéditeur (site)</label>
                                    <input type="text" class="form-control col-sm-7" id="nomDestinaire" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="date" class="col-sm-5">Date de reception</label>
                                    <input name="date" id="date" type="date" class="form-control col-sm-7" value="{{date('Y-m-d')}}" readonly/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label for="lieu" class="col-sm-5">Destinataire/Banque</label>
                                    <input name="lieu" type="text" class="form-control col-sm-7" id="lieu" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column mb-7 col-md-12 fv-row fv-plugins-icon-container">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label text-dark mb-2">Remarque</label>
                                    <textarea name="remarque" class="form-control col-sm-7"> </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                        <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
                    </div>
                </div>
        </form>
        </div>
    </div>
    <script>
        let sites = {!! json_encode($sites) !!};
        $(document).ready(function () {
            $("#sites").on("change", function () {
                const site = sites.find(t => t.id === parseInt(this.value ?? 0));
                console.log(site);
                if (site) {
                    $("#numeroTournee").val(site.tournees?.numeroTournee);
                    $("#centre").val(site.tournees?.centre);
                    $("#centre_regional").val(site?.tournees?.centre_regional);
                    $("#valeur_colis_xof").val(site?.regulation_arrivee_valeur_colis);
                    // $("#device_etrangere_dollar").val(site?.device_etrangere_dollar_arrivee);
                    // $("#device_etrangere_euro").val(site?.device_etrangere_euro_arrivee);
                    // $("#pierre_precieuse").val(site?.pierre_precieuse_arrivee);
                    $("#nbre_colis").val(site?.nbre_colis_arrivee);
                    $("#client").val(site?.sites?.clients?.client_nom);
                    $("#expediteur").val(site?.sites?.clients?.client_nom);
                    $("#nomDestinaire").val(site?.sites?.site);
                    $("#scelle").val(site?.numero);
                }
            });
        });
    </script>

@endsection
