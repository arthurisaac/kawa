@extends('bases.informatique')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Opération maintenance</h2></div>
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

        <form class="form-horizontal" method="post" action="{{ route('informatique-maintenance.update', $informatique->id) }}">
            @method('PATCH')
            @csrf

            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-5">Centre</label>
                        <select class="form-control col-md-7" name="centre" id="centre" required>
                            <option>{{$informatique->centre}}</option>
                            @foreach ($centres as $centre)
                                <option value="{{$centre->centre}}">{{$centre->centre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Centre régional</label>
                        <select class="form-control col-md-7" name="centreRegional" id="centre_regional"
                                required>
                            <option>{{$informatique->centreRegional}}</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Service</label>
                        <input class="form-control col-md-7" type="text" name="service" value="{{$informatique->service}}" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Date</label>
                        <input class="form-control col-md-7" type="date" name="date" value="{{$informatique->date}}" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Matériels défectueux</label>
                        <input class="form-control col-md-7" type="text" name="materielDefectueux" value="{{$informatique->materielDefectueux}}" required/>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-5">Rapport sur le matériel</label>
                        <textarea class="form-control col-md-7" name="rapportMateriel" required>{{$informatique->rapportMateriel}}</textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Date début intervention</label>
                        <input class="form-control col-md-7" type="date" name="dateDebut" value="{{$informatique->dateDebut}}" required>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-5">Date fin intervention</label>
                        <input class="form-control col-md-7" type="date" name="dateFin" value="{{$informatique->dateFin}}" required>
                    </div>

                    <div lass="form-group">
                        <label>Opération effectuée après rapport</label>
                        <div class="form-check offset-5">
                            <input class="form-check-input" type="radio" name="operationEffectuee" value="Maintenance effectuée et réparée">
                            <label class="form-check-label">
                                Maintenance effectuée et réparée
                            </label>
                        </div>
                        <div class="form-check offset-5">
                            <input class="form-check-input" name="operationEffectuee" type="radio" value="Nouveau matériel">
                            <label class="form-check-label">
                                Nouveau matériel
                            </label>
                        </div>
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
        let informatique = {!! json_encode($informatique) !!};

        $(document).ready(function () {
            $("#centre").on("change", function () {
                $("#centre_regional option").remove();
                // $('#centre_regional').append($('<option>', {text: "Choisir centre régional"}));

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

            const operationEffectuee = informatique.operationEffectuee + "";
            const operationEffectuee_array = operationEffectuee.split(',');

            $("input[name='operationEffectuee']").map(function () {
                const value = $(this).val();
                if (operationEffectuee_array.includes(value)) $(this).prop("checked", true);
            });
        });
    </script>

@endsection
