@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Etat de suivi des commandes</h2></div>
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
                <table class="table table-bordered" style="width: 100%;" id="listeDemande">
                    <thead>
                    <tr>
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
                <table class="table table-bordered" style="width: 100%;" id="listeBon">
                    <thead>
                    <tr>
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
                <table class="table table-bordered" style="width: 100%;" id="listeLivraison">
                    <thead>
                    <tr>
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
                <table class="table table-bordered" style="width: 100%;" id="listePV">
                    <thead>
                    <tr>
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
