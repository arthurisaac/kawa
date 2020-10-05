@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Mission</h2></div>
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

        <form class="form-horizontal" method="post" action="{{ route('informatique-mission.update', $mission->id) }}">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-5">Centre</label>
                        <select class="form-control col-md-7" name="centre" id="centre" required>
                            <option>{{$mission->centre}}</option>
                            @foreach ($centres as $centre)
                                <option value="{{$centre->centre}}">{{$centre->centre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Centre régional</label>
                        <select class="form-control col-md-7" name="centreRegional" id="centre_regional"
                                required>
                            <option>{{$mission->centreRegional}}</option>
                        </select>
                    </div>
                    <div class="row">
                        <label class="col-md-4">Service</label>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-5">Du</label>
                                <input type="date" class="form-control col-sm-7" name="debut" id="debut" value="{{$mission->debut}}" required/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-5">Au</label>
                                <input type="date" class="form-control col-sm-7" name="fin" id="fin" value="{{$mission->fin}}" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Service</label>
                        <input type="text" class="form-control col-md-7" name="service" value="{{$mission->service}}" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Nbre de jours</label>
                        <input type="number" class="form-control col-md-7" name="nombreDeJours" id="nombreDeJours" value="{{$mission->nombreDeJours}}" readonly required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Objet de la mission</label>
                        <input type="text" class="form-control col-md-7" name="objetMission" value="{{$mission->objetMission}}" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Intervention effectuée</label>
                        <textarea class="form-control col-md-7" name="interventionEffectuee" required>{{$mission->interventionEffectuee}}</textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Rapport sur la mission</label>
                        <textarea class="form-control col-md-7" name="rapportMission" required>{{$mission->rapportMission}}</textarea>
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

        $(document).ready(function () {
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
                });
            });

            $("#fin").on("change", function() {
                const debut = $('#debut').val();
                const fin = $('#fin').val();
                const dateDebut = new Date(debut);
                const dateFin = new Date(fin);
                const Difference_In_Days = ( dateFin.getTime() - dateDebut.getTime() ) / (1000 * 3600 * 24);
                $("#nombreDeJours").val(Difference_In_Days);
            })
        });
    </script>
@endsection
