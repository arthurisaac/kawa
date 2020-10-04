@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">SSB site</h2></div>
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
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Libelle Site</label>
                        <input type="text" class="form-control col-sm-7" required />
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
                        <label class="col-md-5">Etrags</label>
                        <input type="text" class="form-control col-md-7" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Banque</label>
                        <input type="text" class="form-control col-md-7" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Filiale</label>
                        <input type="text" class="form-control col-md-7" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Client</label>
                        <select class="form-control col-md-7" name="centre" id="centre" required>
                            <option></option>
                            @foreach ($clients as $client)
                                <option value="{{$client->id}}">{{$client->client_nom}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">Site</label>
                        <select class="form-control col-md-7" name="centre" id="centre" required>
                            <option></option>
                            @foreach ($sites as $site)
                                <option value="{{$site->id}}">{{$site->site}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Nom contact du site</label>
                        <input class="col-sm-7 form-control" type="text" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Fonction du contact</label>
                        <input class="col-sm-7 form-control" type="text" required />
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Intra-muros">
                        <label class="form-check-label">
                            Intra-muros
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Extra-muros">
                        <label class="form-check-label">
                            Extra-muros
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Tel</label>
                        <input class="col-sm-7 form-control" type="tel" required />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Nombre de GAB</label>
                        <input class="col-sm-7 form-control" type="number" required />
                    </div>
                </div>
            </div>
            <br />
            <br />
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary btn-sm button" type="submit">Valider</button>
                    <button class="btn btn-danger btn-sm button" type="reset">Annuler</button>
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
