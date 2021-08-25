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

        <form class="form-horizontal" method="post" action="{{ route('achat-bon.store') }}">
            @csrf

            <div class="form-group row">
                <label class="col-sm-5">Numero bon</label>
                <input type="text" name="numero" value="{{$numeroBon}}" class="form-control col-sm-7" required readonly>
            </div>
            <div class="form-group row">
                <label class="col-sm-5">Numero DA</label>
                <select name="numero_da" id="numero_da" class="form-control col-sm-7" required>
                    <option></option>
                    @foreach($demandes as $demande)
                        <option value="{{$demande->id}}">{{$demande->numero_da}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group row">
                <label class="col-sm-5">Date</label>
                <input type="date" name="date" class="form-control col-sm-7" value="{{$currentDate}}" required>
            </div>
            <div class="form-group row">
                <label class="col-sm-5">Fournisseur</label>
                <select class="form-control col-sm-7" name="fournisseur_fk">
                    <option></option>
                    @foreach($fournisseurs as $fournisseur)
                        <option value="{{$fournisseur->id}}">{{$fournisseur->denomination}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group row">
                <label class="col-sm-5">Proforma</label>
                <input type="text" name="proforma" class="form-control col-sm-7" required>
            </div>
            <div class="form-group row">
                <label class="col-sm-5">Tel</label>
                <input type="text" name="telephone" id="telephone" class="form-control col-sm-7" required>
            </div>
            <div class="form-group row">
                <label class="col-sm-5">Note</label>
                <input type="text" name="operation" class="form-control col-sm-7">
            </div>
            <div class="form-group row">
                <label class="col-sm-5">Objet</label>
                <input type="text" name="objet" id="objet" class="form-control col-sm-7" required>
            </div>
            <div class="form-group row">
                <label class="col-sm-5">Livraison</label>
                <input type="text" name="livraison" class="form-control col-sm-7" required>
            </div>

            <br>
            <table id="bonItem">
                <thead>
                <tr>
                    <th>Désignation</th>
                    <th>Quantitté</th>
                    <th>Prix unitaire</th>
                    <th>TVA</th>
                    <th>Montant Total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <input type="text" class="form-control" name="designation[]" placeholder="Désignation"/>
                    </td>
                    <td>
                        <input type="number" class="form-control" name="quantite[]" placeholder="Quantité"/>
                    </td>
                    <td>
                        <input type="number" class="form-control" name="pu[]" placeholder="Prix unitaite TTC"/>
                    </td>
                    <td>
                        <select class="form-control" name="tva[]">
                            <option value="18">18%</option>
                            <option value="0">0%</option>
                        </select>
                    </td>
                    <td>
                        <input type="number" class="form-control" name="montant[]" placeholder="Montant TTC" readonly/>
                    </td>
                </tr>
                </tbody>
            </table>
            <br/>
            <button class="btn btn-primary btn-sm" type="button" id="addRow">Ajouter +</button>
            <br>
            <br>

            <div class="form-group row">
                <label class="col-sm-1">Total</label>
                <input type="text" name="total" class="form-control form-control-bordeless col-sm-4" readonly required>
            </div>
            <p>
                <i id="totalWritten"></i>
            </p>
            <div class="row">
                <div class="col-2">
                    <button class="btn btn-block btn-primary btn-sm" type="submit">Valider</button>
                    <button class="btn btn-block btn-danger btn-sm" type="reset">Annuler</button>
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
                    '                        <input type="text" class="form-control" name="designation[]" placeholder="Désignation" required />\n' +
                    '                    </td>\n' +
                    '                    <td>\n' +
                    '                        <input type="number" class="form-control" name="quantite[]" placeholder="Quantité" required/>\n' +
                    '                    </td>\n' +
                    '                    <td>\n' +
                    '                        <input type="number" class="form-control" name="pu[]" placeholder="Prix unitaite TTC" required />\n' +
                    '                    </td>\n' +
                    '                    <td>\n' +
                    '                        <select class="form-control" name="tva[]" required>\n' +
                    '                            <option value="18">18%</option>\n' +
                    '                            <option value="0">0%</option>\n' +
                    '                        </select>\n' +
                    '                    </td>'+
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
                        const tva = $("select[name='tva[]'] option:selected").get(i);
                        if (!isNaN(parseInt(quantite.value))) {
                            const total = parseInt(quantite.value) * parseInt(pu.value);
                            const ht = total * parseInt(tva.value) / 100;
                            $("input[name='montant[]']").eq(i).val(ht + total);
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
                        const tva = $("select[name='tva[]'] option:selected").get(i);
                        if (!isNaN(parseInt(quantite.value))) {
                            const total = parseInt(quantite.value) * parseInt(pu.value);
                            const ht = parseInt(tva.value) / 100;
                            $("input[name='montant[]']").eq(i).val(total + ht);
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
                if (!isNaN(parseFloat(this.value))) total += parseFloat(this.value);
            });
            $("input[name='total']").val(total.toFixed(2));
            const totalWritten = writtenNumber(total);
            $("#totalWritten").text(totalWritten + ' francs CFA');

            console.log(total);
        }
    </script>
    <script>
        let demandes = {!! json_encode($demandes) !!};
        $(document).ready(function () {
            $("#numero_da").on("change", function () {
                const demande = demandes.find(d => d.numero_da === this.value.toString().padStart(3, 0));
                if (demande) {
                    $("#telephone").val(demande.telephone_demandeur);
                    $("#objet").val(demande.objet_achat);
                }
            });
        });
    </script>

@endsection
