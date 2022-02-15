@extends('bases.achat')

@section('main')
    @extends('bases.toolbar', ["title" => "Achat", "subTitle" => "Recherche par produit"])
    <div class="burval-container">
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
                <table  class="table table-striped gy-7 gs-7 pt-0" style="width: 100%" id="liste">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
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
