@extends('bases.achat')

@section('main')
    @extends('bases.toolbar', ["title" => "Achat", "subTitle" => "Etat de suivi des commandes"])
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
            <div class="col">
                <h5>Demande d'achat</h5>
                <table class="table table-striped gy-7 gs-7 pt-0" style="width: 100%" id="listeDemande">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                        <td>QTE</td>
                        <td>PRIX UNIT</td>
                        <td>MONTANT</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <h5>Bon de commande</h5>
                <table class="table table-striped gy-7 gs-7 pt-0" style="width: 100%;" id="listeBon">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                        <td>QTE</td>
                        <td>PRIX UNIT</td>
                        <td>MONTANT</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div><br /><br />
        <div class="row">
            <div class="col">
                <h5>Bon de livraison</h5>
                <table class="table table-striped gy-7 gs-7 pt-0" style="width: 100%" id="listeLivraison">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                        <td>QTE</td>
                        <td>PRIX UNIT</td>
                        <td>MONTANT</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <h5>PV de recette</h5>
                <table class="table table-striped gy-7 gs-7 pt-0" style="width: 100%" id="listePV">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                        <td>QTE</td>
                        <td>PRIX UNIT</td>
                        <td>MONTANT</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script>
        $(document).ready(function () {
            $('#listeDemande').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
            $('#listeBon').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
            $('#listeLivraison').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
            $('#listePV').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        });
    </script>
@endsection
