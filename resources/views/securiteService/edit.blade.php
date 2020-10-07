@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Service</h2></div><br />
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

        <form method="post" action="{{ route('securite-service.update', $securiteService->id) }}">
            @csrf
            @method('PATCH')

            <div class="form-group row">
                <label class="col-md-2">Date</label>
                <input type="date" class="editbox col-md-4" name="date" value="{{$securiteService->date}}" required/>
            </div>
            <div class="form-group row">
                <label class="col-md-2">Centre</label>
                <select class="Combobox col-md-4" name="centre" id="centre" required>
                    <option>{{$securiteService->centre}}</option>
                    @foreach ($centres as $centre)
                        <option value="{{$centre->centre}}">{{$centre->centre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group row">
                <label class="col-md-2">Centre régional</label>
                <select class="Combobox col-md-4" name="centreRegional" id="centre_regional" required>
                    <option>{{$securiteService->centreRegional}}</option>
                </select>
            </div><br />
            <div class="row" style="align-items: center;">
                <div class="col-2">
                    <label>Chargé de sécurité</label>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-3">Nom </label>
                        <input type="text" class="editbox col-md-4" name="nomChargeDeSecurite" value="{{$securiteService->nomChargeDeSecurite}}" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Prénom</label>
                        <input type="text" class="editbox col-md-4" name="prenomChargeDeSecurite" value="{{$securiteService->prenomChargeDeSecurite}}" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Fonction</label>
                        <input type="text" class="editbox col-md-4" name="fonctionChargeDeSecurite" value="{{$securiteService->fonctionChargeDeSecurite}}" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Matricule</label>
                        <input type="text" class="editbox col-md-4" name="matriculeChargeDeSecurite" value="{{$securiteService->matriculeChargeDeSecurite}}" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Heure de prise de service</label>
                        <input type="time" class="editbox col-md-4" name="heureDePriseServiceCs" value="{{$securiteService->heureDePriseServiceCs}}" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Heure de fin de service</label>
                        <input type="time" class="editbox col-md-4" name="csHeureDeFinDeService" value="{{$securiteService->csHeureDeFinDeService}}" required/>
                    </div>
                </div>
            </div><br />

            <h3>EQUIPE 1</h3>

            <div class="row" style="align-items: center;">
                <div class="col-2">
                    <label>Opérateur radio n° 1</label>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-3">Nom </label>
                        <input type="text" class="editbox col-md-4" name="eop11Nom" value="{{$securiteService->eop11Nom}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Prénom</label>
                        <input type="text" class="editbox col-md-4" name="eop11Prenom" value="{{$securiteService->eop11Prenom}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Fonction</label>
                        <input type="text" class="editbox col-md-4" name="eop11Fonction" value="{{$securiteService->eop11Fonction}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Matricule</label>
                        <input type="text" class="editbox col-md-4" name="eop11Matricule" value="{{$securiteService->eop11Matricule}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Heure de prise de service</label>
                        <input type="time" class="editbox col-md-4" name="eop11HeurePriseServ" value="{{$securiteService->eop11HeurePriseServ}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Heure de fin de service</label>
                        <input type="time" class="editbox col-md-4" name="eop11HeureFinService" value="{{$securiteService->eop11HeureFinService}}"/>
                    </div>
                </div>
            </div><br />

            <div class="row" style="align-items: center;">
                <div class="col-2">
                    <label>Opérateur radio n° 2</label>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-3">Nom </label>
                        <input type="text" class="editbox col-md-4" name="eop112Nom" value="{{$securiteService->eop112Nom}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Prénom</label>
                        <input type="text" class="editbox col-md-4" name="eop12Prenom" value="{{$securiteService->eop12Prenom}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Fonction</label>
                        <input type="text" class="editbox col-md-4" name="eop12Fonction" value="{{$securiteService->eop12Fonction}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Matricule</label>
                        <input type="text" class="editbox col-md-4" name="eop12Matricule" value="{{$securiteService->eop12Matricule}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Heure de prise de service</label>
                        <input type="time" class="editbox col-md-4" name="eop12HeurePriseServ" value="{{$securiteService->eop12HeurePriseServ}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Heure de fin de service</label>
                        <input type="time" class="editbox col-md-4" name="eop12HeureFinService" value="{{$securiteService->eop12HeureFinService}}"/>
                    </div>
                </div>
            </div><br />

            <h3>EQUIPE 2</h3>
            <div class="row" style="align-items: center;">
                <div class="col-2">
                    <label>Opérateur radio n° 1</label>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-3">Nom </label>
                        <input type="text" class="editbox col-md-4" name="eop21Nom" value="{{$securiteService->eop21Nom}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Prénom</label>
                        <input type="text" class="editbox col-md-4" name="eop21Prenom" value="{{$securiteService->eop21Prenom}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Fonction</label>
                        <input type="text" class="editbox col-md-4" name="eop21Fonction" value="{{$securiteService->eop21Fonction}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Matricule</label>
                        <input type="text" class="editbox col-md-4" name="eop21Matricule"  value="{{$securiteService->eop21Matricule}}" />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Heure de prise de service</label>
                        <input type="time" class="editbox col-md-4" name="eop21HeurePriseServ" value="{{$securiteService->eop21HeurePriseServ}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Heure de fin de service</label>
                        <input type="time" class="editbox col-md-4" name="eop21HeureFinService" value="{{$securiteService->eop21HeureFinService}}"/>
                    </div>
                </div>
            </div><br />

            <div class="row" style="align-items: center;">
                <div class="col-2">
                    <label>Opérateur radio n° 2</label>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-3">Nom </label>
                        <input type="text" class="editbox col-md-4" name="eop22Nom" value="{{$securiteService->eop22Nom}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Prénom</label>
                        <input type="text" class="editbox col-md-4" name="eop22Prenom" value="{{$securiteService->eop22Prenom}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Fonction</label>
                        <input type="text" class="editbox col-md-4" name="eop22Fonction" value="{{$securiteService->eop22Fonction}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Matricule</label>
                        <input type="text" class="editbox col-md-4" name="eop22Matricule" value="{{$securiteService->eop22Matricule}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Heure de prise de service</label>
                        <input type="time" class="editbox col-md-4" name="eop22HeurePriseServ" value="{{$securiteService->eop22HeurePriseServ}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Heure de fin de service</label>
                        <input type="time" class="editbox col-md-4" name="eop22HeureFinService" value="{{$securiteService->eop22HeureFinService}}"/>
                    </div>
                </div>
            </div><br />

            <h3>EQUIPE 3</h3>

            <div class="row" style="align-items: center;">
                <div class="col-2">
                    <label>Opérateur radio n° 1</label>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-3">Nom </label>
                        <input type="text" class="editbox col-md-4" name="eop31Nom" value="{{$securiteService->eop31Nom}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Prénom</label>
                        <input type="text" class="editbox col-md-4" name="eop31Prenom" value="{{$securiteService->eop31Prenom}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Fonction</label>
                        <input type="text" class="editbox col-md-4" name="eop31Fonction" value="{{$securiteService->eop31Fonction}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Matricule</label>
                        <input type="text" class="editbox col-md-4" name="eop31Matricule" value="{{$securiteService->eop31Matricule}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Heure de prise de service</label>
                        <input type="time" class="editbox col-md-4" name="eop31HeurePriseServ" value="{{$securiteService->eop31HeurePriseServ}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Heure de fin de service</label>
                        <input type="time" class="editbox col-md-4" name="eop31HeureFinService" value="{{$securiteService->eop31HeureFinService}}"/>
                    </div>
                </div>
            </div><br />

            <div class="row" style="align-items: center;">
                <div class="col-2">
                    <label>Opérateur radio n° 2</label>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-3">Nom </label>
                        <input type="text" class="editbox col-md-4" name="eop32Nom" value="{{$securiteService->eop32Nom}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Prénom</label>
                        <input type="text" class="editbox col-md-4" name="eop32Prenom" value="{{$securiteService->eop32Prenom}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Fonction</label>
                        <input type="text" class="editbox col-md-4" name="eop32Fonction" value="{{$securiteService->eop32Fonction}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Matricule</label>
                        <input type="text" class="editbox col-md-4" name="eop32Matricule" value="{{$securiteService->eop32Matricule}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Heure de prise de service</label>
                        <input type="time" class="editbox col-md-4" name="eop32HeurePriseServ" value="{{$securiteService->eop32HeurePriseServ}}"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Heure de fin de service</label>
                        <input type="time" class="editbox col-md-4" name="eop32HeureFinService" value="{{$securiteService->eop32HeureFinService}}"/>
                    </div>
                </div>
            </div><br />

            <button type="submit" class="btn btn-primary button btn-sm">Valider</button>
            <button type="reset" class="btn btn-danger button btn-sm">Annuler</button>
        </form>
    </div>
    <script>
        let centres =  {!! json_encode($centres) !!};
        let centres_regionaux = {!! json_encode($centres_regionaux) !!};

        $(document).ready( function () {
            $("#centre").on("change", function () {
                $("#centre_regional option").remove();
                //$('#centre_regional').append($('<option>', { text: "Choisir centre régional" }));

                const centre = centres.find(c => c.centre === this.value);
                const regions = centres_regionaux.filter( region => {
                    return region.id_centre === centre.id;
                });
                regions.map( ({centre_regional}) => {
                    $('#centre_regional').append($('<option>', {
                        value: centre_regional,
                        text: centre_regional
                    }));
                })
            });
        });
    </script>
@endsection
