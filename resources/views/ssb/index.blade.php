@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">SSB</h2></div>
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

        <form class="form-horizontal" method="post" action="{{ route('ssb.store') }}">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group row">
                        <label class="col-sm-5">Numéro incident</label>
                        <input type="number" class="form-control col-sm-7" name="numeroIncident" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Numéro bordereau</label>
                        <input type="number" class="form-control col-sm-7" name="numeroBordereau" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Site</label>
                        <select class="form-control col-sm-7" name="site" required>
                            <option></option>
                            <option>1</option>
                            @foreach($sites as $site)
                                <option value="{{$site->id}}">{{$site->libelle}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Banque</label>
                        <input type="text" class="form-control col-sm-7" name="banque" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Centre</label>
                        <select class="form-control col-md-7" name="centre" id="centre" required>
                            <option></option>
                            @foreach ($centres as $centre)
                                <option value="{{$centre->centre}}">{{$centre->centre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Centre régional</label>
                        <select class="form-control col-md-7" name="centreRegional" id="centre_regional" required></select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Intervention</label>
                        <input class="form-control col-md-7" name="intervention" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Dabiste1</label>
                        <input type="text" class="form-control col-md-7" name="dabiste1" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Dabiste2</label>
                        <input type="text" class="form-control col-md-7" name="dabiste2" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Heure de réponse</label>
                        <input type="time" class="form-control col-md-7" name="heureReponse" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Heure déclaration</label>
                        <input type="time" class="form-control col-md-7" name="heureDeclaration" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Heure d'arrivée</label>
                        <input type="time" class="form-control col-md-7" name="heureArrivee" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Début d’intervention</label>
                        <input type="time" class="form-control col-md-7" name="debutIntervention" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Fin d’intervention</label>
                        <input type="time" class="form-control col-md-7" name="finIntervention" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Date clôture</label>
                        <input type="date" class="form-control col-md-7" name="dateCloture" required />
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                    <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        let centres =  {!! json_encode($centres) !!};
        let centres_regionaux = {!! json_encode($centres_regionaux) !!};

        $(document).ready( function () {
            $("#centre").on("change", function () {
                $("#centre_regional option").remove();
                // $('#centre_regional').append($('<option>', { text: "Choisir centre régional" }));

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
