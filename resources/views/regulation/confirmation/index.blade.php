@extends('bases.regulation')

@section('main')
    @extends('bases.toolbar', ["title" => "Regulation", "subTitle" => "Confirmation reception"])
    <div class="burval-container">
        <div><h2 class="heading">Confirmation reception</h2></div>
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

        <form method="post" action="{{ route('regulation-confirmation.store') }}">
            @csrf

            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="sites" class="col-sm-5">N°Bordereau</label>
                        <select id="sites" name="bordereau" class="form-control col-sm-7" required>
                            @foreach($sites as $site)
                                <option value="{{$site->id}}">{{$site->bordereau}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Numéro tournée</label>
                        <input type="text" class="form-control col-sm-7" id="numeroTournee" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Centre</label>
                        <input type="text" class="form-control col-sm-7" id="centre" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Centre régional</label>
                        <input type="text" class="form-control col-sm-7" id="centre_regional" readonly>
                    </div>
                    <div class="form-group row">
                        <label for="nbre_colis" class="col-sm-5">Nombre de colis</label>
                        <input type="text" class="form-control col-sm-7" id="nbre_colis" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Montant (Valeur Colis)</label>
                        <input type="number" class="form-control col-sm-7" id="valeur_colis_xof" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Devise</label>
                        <select id="devise" name="devise" class="form-control col-sm-7" required>
                                <option></option>
                                <option>XOF</option>
                                <option>Dollar</option>
                                <option>Euro</option>
                        </select>
                    </div>
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Device etrangere (EURO)</label>--}}
{{--                        <input type="number" class="form-control col-sm-7" id="device_etrangere_euro" readonly>--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-5">Pierre précieuse</label>--}}
{{--                        <input type="number" class="form-control col-sm-7" id="pierre_precieuse" readonly>--}}
{{--                    </div>--}}
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="scelle" class="col-sm-5">Scellé</label>
                        <input name="scelle" id="scelle" type="text" class="form-control col-sm-7" readonly>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Confirmation</label>
                        <select name="confirmation" class="form-control col-sm-7">
                            <option>conforme</option>
                            <option>non conforme</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Remarque</label>
                        <textarea name="remarque" class="form-control col-sm-7"> </textarea>
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="client" class="col-sm-5">CLIENT</label>
                        <input type="text" name="client" class="form-control col-sm-7" id="client" readonly/>
                    </div>
                    <div class="form-group row">
                        <label for="nomDestinaire" class="col-sm-5">Expéditeur (site)</label>
                        <input type="text" class="form-control col-sm-7" id="nomDestinaire" readonly/>
                    </div>
                    <div class="form-group row">
                        <label for="date" class="col-sm-5">Date de reception</label>
                        <input name="date" id="date" type="date" class="form-control col-sm-7" value="{{date('Y-m-d')}}" readonly/>
                    </div>
                    <div class="form-group row">
                        <label for="lieu" class="col-sm-5">Destinataire/Banque</label>
                        <input name="lieu" type="text" class="form-control col-sm-7" id="lieu" required/>
                    </div>
                </div>
                <div class="col"></div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col-4">
                    <br/>
                    <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                    <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
                </div>
            </div>
        </form>
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
