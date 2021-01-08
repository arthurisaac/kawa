@extends('base')

@section('main')
    <script src="{{ asset('js/written-number.js') }}"></script>
    <div class="burval-container">
        <div><h2 class="heading">Bon de commande</h2></div>
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

        <form class="form-horizontal" method="post" action="{{ route('achat-bon.update', $bon->id) }}">
            @method('PATCH')
            @csrf

            <div class="form-group row">
                <label class="col-sm-5">Numero bon</label>
                <input type="text" name="numero" value="{{$bon->numero}}" class="form-control col-sm-7" required
                       readonly>
            </div>
            <div class="form-group row">
                <label class="col-sm-5">Date</label>
                <input type="date" name="date" class="form-control col-sm-7" value="{{$bon->date}}" required>
            </div>
            <div class="form-group row">
                <label class="col-sm-5">Fournisseur</label>
                <select class="form-control col-sm-7" name="fournisseur_fk">
                    <option
                        value="{{$bon->fournisseur_fk}}">{{$bon->fournisseurs->denomination ?? $bon->fournisseur_fk}}</option>
                    @foreach($fournisseurs as $fournisseur)
                        <option value="{{$fournisseur->id}}">{{$fournisseur->denomination}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group row">
                <label class="col-sm-5">Proforma</label>
                <input type="text" name="proforma" value="{{$bon->proforma}}" class="form-control col-sm-7" required>
            </div>
            <div class="form-group row">
                <label class="col-sm-5">Tel</label>
                <input type="text" name="telephone" value="{{$bon->telephone}}" class="form-control col-sm-7" required>
            </div>
            <div class="form-group row">
                <label class="col-sm-5">Note</label>
                <input type="text" name="operation" value="{{$bon->operation}}" class="form-control col-sm-7">
            </div>
            <div class="form-group row">
                <label class="col-sm-5">Objet</label>
                <input type="text" name="objet" value="{{$bon->objet}}" class="form-control col-sm-7" required>
            </div>
            <br />
            <div class="form-group row">
                <label class="col-sm-1">Total</label>
                <input type="text" name="total" class="form-control form-control-bordeless col-sm-4" value="{{$bon->total}}" readonly>
            </div>
            <p>
                <i id="totalWritten"></i>
            </p>

            <table id="bonItem">
                <thead>
                <tr>
                    <th>Désignation</th>
                    <th>Quantitté</th>
                    <th>Prix unitaire TTC</th>
                    <th>Montant TTC</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bonItems as $bonItem)
                    <tr>
                        <td>
                            <input type="hidden" class="form-control" name="ids[]" placeholder="Désignation" value="{{$bonItem->id}}"/>
                            <input type="text" class="form-control" name="designation[]" placeholder="Désignation" value="{{$bonItem->designation}}"/>
                        </td>
                        <td>
                            <input type="number" class="form-control" name="quantite[]" placeholder="Quantité" value="{{$bonItem->quantite}}"/>
                        </td>
                        <td>
                            <input type="number" class="form-control" name="pu[]" placeholder="Prix unitaite TTC" value="{{$bonItem->prix}}"/>
                        </td>
                        <td>
                            <input type="number" class="form-control" name="montant[]" placeholder="Montant TTC" value="{{$bonItem->montant}}"
                                   readonly/>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <br/>
            <br/>
            <div class="row">
                <div class="col-2">
                    <button class="btn btn-block btn-primary btn-sm" type="submit">Valider</button>
                    <button class="btn btn-block btn-danger btn-sm" type="button" onclick="window.history.back()">
                        Annuler
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script>
        writtenNumber.defaults.lang = 'fr';

        $(document).ready(function () {
            $("#addRow").on("click", function () {
                $('#bonItem').append('<tr>\n' +
                    '                    <td>\n' +
                    '                        <input type="text" class="form-control" name="designation[]" placeholder="Désignation" />\n' +
                    '                    </td>\n' +
                    '                    <td>\n' +
                    '                        <input type="number" class="form-control" name="quantite[]" placeholder="Quantité" />\n' +
                    '                    </td>\n' +
                    '                    <td>\n' +
                    '                        <input type="number" class="form-control" name="pu[]" placeholder="Prix unitaite TTC" />\n' +
                    '                    </td>\n' +
                    '                    <td>\n' +
                    '                        <input type="number" class="form-control" name="montant[]" placeholder="Montant TTC" readonly />\n' +
                    '                    </td>\n' +
                    '                </tr>');

            });
            $("input[name='pu[]']").on("change", function () {
                let i = -1;
                if (!isNaN(parseInt(this.value))) {
                    $.each($("input[name='quantite[]']"), function () {
                        i++;
                        const quantite = $("input[name='quantite[]']").get(i);
                        const pu = $("input[name='pu[]']").get(i);
                        if (!isNaN(parseInt(quantite.value))) {
                            $("input[name='montant[]']").eq(i).val(parseInt(quantite.value) * parseInt(pu.value));
                            updateTotal();
                        } else {
                            console.log('quantite', !isNaN(parseInt(quantite)))
                        }

                    });
                } else {
                    console.log('pu', !isNaN(parseInt(this.value)))
                }
            });

            const totalWritten = writtenNumber(parseInt($("input[name='total']").val()));
            $("#totalWritten").text(totalWritten + ' francs CFA');
        });

        $(document).on('DOMNodeInserted', function() {
            $("input[name='montant[]']").on("change", function () {
                let total = 0;
                $.each($("input[name='montant[]']"), function () {
                    if (!isNaN(parseInt(this.value))) total += parseInt(this.value);
                });
                $("input[name='total']").val(total);
            });
            $("input[name='pu[]']").on("change", function () {
                let i = -1;
                if (!isNaN(parseInt(this.value))) {
                    $.each($("input[name='quantite[]']"), function () {
                        i++;
                        const quantite = $("input[name='quantite[]']").get(i);
                        const pu = $("input[name='pu[]']").get(i);
                        if (!isNaN(parseInt(quantite.value))) {
                            $("input[name='montant[]']").eq(i).val(parseInt(quantite.value) * parseInt(pu.value));
                            updateTotal();
                        } else {
                            console.log('quantite', !isNaN(parseInt(quantite)))
                        }

                    });
                } else {
                    console.log('pu', !isNaN(parseInt(this.value)))
                }
            });
        });

        function updateTotal() {
            let total = 0;
            $.each($("input[name='montant[]']"), function () {
                if (!isNaN(parseInt(this.value))) total += parseInt(this.value);
            });
            $("input[name='total']").val(total);
            const totalWritten = writtenNumber(total);
            $("#totalWritten").text(totalWritten + ' francs CFA');

            console.log();
        }
    </script>
@endsection
