@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Etat facturaton globale</h2></div>
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
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                    <tr>
                        <td>Nom client</td>
                        <td>C.A (FCFA)</td>
                        <td>Nbre (sites) effectué</td>
                        <td>Km bitume parcouru</td>
                        <td>Sécuripack</td>
                        <td>Nbre site forfait</td>
                        <td>Nbre site kilo</td>
                        <td>Passage prévu</td>
                        <td>Type TDF</td>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td>Somme</td>
                        <td colspan="8"></td>
                    </tr>
                    <tr>
                        <td>Moyenne</td>
                        <td colspan="8"></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div><br /><br />
        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Secteur activité</th>
                        <th>Chiffre d'aafaire</th>
                        <th>Rapport</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                    <tr>
                        <td>Somme</td>
                        <td colspan="2"></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Portefeuille</th>
                        <th>Chiffre d'aafaire</th>
                        <th>Rapport</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                    <tr>
                        <td>Somme</td>
                        <td colspan="2"></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Type activité</th>
                        <th>Chiffre d'aafaire</th>
                        <th>Rapport</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                    <tr>
                        <td>Somme</td>
                        <td colspan="2"></td>
                    </tr>
                    </tfoot>
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
