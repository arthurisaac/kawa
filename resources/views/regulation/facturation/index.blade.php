@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Facturation</h2></div>
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

        <form method="post" action="{{ route('regulation-facturation.store') }}">
            @csrf

            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="centre" class="col-4">Centre Régional</label>
                        <select name="centre" id="centre" class="form-control col-8" required>
                            <option></option>
                            @foreach ($centres as $centre)
                                <option value="{{$centre->centre}}">Centre de {{ $centre->centre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="centre_regional" class="col-4">Centre</label>
                        <select id="centre_regional" name="centre_regional" class="form-control col-8" required>
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="date" class="col-4">Date</label>
                        <input type="date" id="date" name="date" value="{{date('Y-m-d')}}"
                               class="form-control col-8" required readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="centre" class="col-4">Numero</label>
                        <input type="text" name="numero" id="numero" value="{{$numero}}" class="form-control col-8  "
                               required/>
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="client" class="col-4">Client</label>
                        <select id="client" name="client" class="form-control col-8" required>
                            <option></option>
                            @foreach($clients as $client)
                                <option value="{{$client->id}}">{{$client->client_nom}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                        <div class="form-group row">
                            <label for="type" class="col-4">Type facture</label>
                            <select id="type" name="type" class="form-control col-8" required>
                                <option>Facture</option>
                                <option>Proforma</option>
                            </select>
                        </div>
                </div>
                <div class="col"></div>
            </div>
            <br/>

            <button type="button" class="btn btn-sm btn-primary" id="add">+</button>
            <br>
            <br>
            <table class="table table-bordered" style="width: 100%" id="table">
                <thead>
                <tr>
                    <th>Libellé</th>
                    <th>Qté</th>
                    <th>Pu</th>
                    <th>Référence</th>
                    <th>N° début</th>
                    <th>N° fin</th>
                    <th>Montant</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><select type="text" class="form-control" name="libelle[]">
                            <option>Securipack grand</option>
                            <option>Securipack moyen</option>
                            <option>Securipack petit</option>
                            <option>Sacs jutes grand</option>
                            <option>Sacs jutes moyen</option>
                            <option>Sacs jutes petit</option>
                            <option>Scellé</option>
                        </select></td>
                    <td><input type="number" min="0" class="form-control" name="qte[]"/></td>
                    <td><input type="number" min="0" class="form-control" name="pu[]"/></td>
                    <td><input type="text" class="form-control" name="reference[]"/></td>
                    <td><input type="text" class="form-control" name="debut[]"/></td>
                    <td><input type="text" class="form-control" name="fin[]"/></td>
                    <td><input type="number" min="0" class="form-control" name="montant[]"/></td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="6">Total</td>
                    <td><input type="number" min="0" class="form-control" name="montantTotal"/></td>
                </tr>
                </tfoot>
            </table>

            <br>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $("#add").on("click", function () {
                $('#table').append('<tr>\n' +
                    '                    <td><input type="text" class="form-control" name="libelle[]"/></td>\n' +
                    '                    <td><input type="number" min="0" class="form-control" name="qte[]"/></td>\n' +
                    '                    <td><input type="number" min="0" class="form-control" name="pu[]"/></td>\n' +
                    '                    <td><input type="text" class="form-control" name="reference[]"/></td>\n' +
                    '                    <td><input type="text" class="form-control" name="debut[]"/></td>\n' +
                    '                    <td><input type="text" class="form-control" name="fin[]"/></td>\n' +
                    '                    <td><input type="number" min="0" class="form-control" name="montant[]"/></td>\n' +
                    '                </tr>');
            });
        })
    </script>
    <script>
        let centres = {!! json_encode($centres) !!};
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
                })
            });
        });
    </script>

@endsection
