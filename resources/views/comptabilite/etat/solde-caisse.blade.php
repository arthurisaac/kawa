@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Etat solde de caisse</h2></div>
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
                <h6>Fonds entrés</h6><br /><br />
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                    <tr>
                        <td>Date</td>
                        <td>Expéditeur</td>
                        <td>N°Bordereau</td>
                        <td>Date bordereau</td>
                        <td>N°Scellé</td>
                        <td>Montant</td>
                        <td>Opératrice</td>
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
                <h6>Fonds sortis</h6><br /><br />
                <table class="table table-bordered" style="width: 100%;" id="listeSortie">
                    <thead>
                    <tr>
                        <td>Date</td>
                        <td>Destination</td>
                        <td>N°Bordereau</td>
                        <td>Date bordereau</td>
                        <td>N°Scellé</td>
                        <td>Montant</td>
                        <td>Opératrice</td>
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
