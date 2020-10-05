@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Recherche par produit</h2></div>
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

        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <select name="periode" id="periode" class="form-control form-control-sm">
                        <option>Mensuel</option>
                        <option>Trimestriel</option>
                        <option>Semestriel</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                    <tr>
                        <td>Date</td>
                        <td>Centre</td>
                        <td>Centre régional</td>
                        <td>Nom du produit</td>
                        <td>Affection</td>
                        <td>Quantité</td>
                        <td>Montant</td>
                        <td>Montant HT</td>
                        <td>Montant TTC</td>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#liste').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        });
    </script>
@endsection
