@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Etat sécurité tournée</h2></div>
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
                <h6>Enlèvement de fonds</h6><br />
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                    <tr>
                        <td>Date</td>
                        <td>Expéditeur</td>
                        <td>N°Bordereau</td>
                        <td>N°Tournée</td>
                        <td>Site</td>
                        <td>Client</td>
                        <td>Montant</td>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td>Somme</td>
                        <td colspan="6"></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <br /><br />

        <div class="row">
            <div class="col">
                <h6>Dépot de fond</h6><br />
                <table class="table table-bordered" style="width: 100%;" id="listeSortie">
                    <thead>
                    <tr>
                        <td>Date</td>
                        <td>Heure</td>
                        <td>N°Bordereau</td>
                        <td>Provennce</td>
                        <td>Client</td>
                        <td>Tournée</td>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td>Somme</td>
                        <td colspan="6"></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <br /><br />

    </div>
    <script>
        $(document).ready(function () {
            $('#liste').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        });
        $(document).ready(function () {
            $('#listeSortie').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        });
    </script>
@endsection
