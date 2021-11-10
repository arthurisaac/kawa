@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Caisse</h2></div>
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

        <form class="form-horizontal" method="post" action="{{ route('comptabilite-entree-caisse.store') }}">
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="form-group row">
                        <label class="col-sm-5" for="mouvement">Mouvement</label>
                        <select id="mouvement" name="mouvement" class="form-control col-sm-7" required>
                            <option>Entrée</option>
                            <option>Sortie</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5" for="centre">Centre régional</label>
                        <select name="centre" id="centre" class="form-control col-sm-7" required>
                            <option></option>
                            @foreach ($centres as $centre)
                                <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5" for="centre_regional">Centre</label>
                        <select id="centre_regional" name="centre_regional" class="form-control col-sm-7" required>
                            <option></option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Date</label>
                        <input type="date" class="form-control col-sm-7" name="date" value="{{date('Y-m-d')}}" required />
                    </div>
                    <div class="form-group row">
                        <label for="somme" class="col-sm-5">Somme</label>
                        <input type="number" min="0" value="0" class="form-control col-sm-7" name="somme" id="somme" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Motif</label>
                        <textarea class="form-control col-sm-7" name="motif" required ></textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Déposant / Receveur</label>
                        <input class="form-control col-sm-7" name="deposant" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Service</label>
                        <input class="form-control col-sm-7" name="service" required />
                    </div>
                    <div class="form-group row">
                        <label for="justification" class="col-sm-5">Justification</label>
                        <select class="form-control col-sm-7" name="justification" id="justification" disabled>
                            <option>Justifié</option>
                            <option>Non justifié</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="montant_justifie" class="col-sm-5">Montant justifié</label>
                        <input type="number" class="form-control col-sm-7" name="montant_justifie" id="montant_justifie" disabled  />
                    </div>
                    <div class="form-group row">
                        <label for="montant_non_justifie" class="col-sm-5">Montant non justifié</label>
                        <input type="number" value="0" class="form-control col-sm-7" name="montant_non_justifie" id="montant_non_justifie" disabled />
                    </div>

                </div>
                <div class="col-4">
                    <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                    <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
                </div>
            </div>
        </form>

    </div>
    <script>
        $(document).ready(function() {
            let centres = {!! json_encode($centres) !!};
            let centres_regionaux = {!! json_encode($centres_regionaux) !!};

            $("#centre").on("change", function () {
                $("#centre_regional option").remove();
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

            $("#mouvement").on("change", function () {
                console.log(this.value);
                if (this.value === 'Entrée') {
                    console.log('disable');
                    $("#justification").attr('disabled', true);
                    $("#montant_justifie").attr('disabled', true);
                    $("#montant_non_justifie").attr('disabled', true);
                } else {
                    $("#justification").removeAttr('disabled');
                    $("#montant_justifie").removeAttr('disabled');
                    $("#montant_non_justifie").removeAttr('disabled');
                }

            });

            $("#montant_justifie").on("change", function () {
                const somme = $('input[name=somme]').val();
                console.log(somme);
                const total = parseFloat(somme ?? 0) - parseFloat(this.value ?? 0);
                $("#montant_non_justifie").val(total)

            });
        })
    </script>
@endsection
