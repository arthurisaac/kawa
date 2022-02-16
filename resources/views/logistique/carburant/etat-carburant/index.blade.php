@extends('bases.carburant')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Etat carburant</h2></div>
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

        <br/>
        <div class="row">
            <div class="col">
                <table class="table table-bordered" id="liste">
                    <thead>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>N°Ticket</th>
                    <th>Véhicule</th>
                    <th>Centre</th>
                    <th>Lieu</th>
                    <th>Solde précédent</th>
                    <th>Solde</th>
                    <th>Consommation</th>
                    <th>Utilisation</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                    <tr>
                        <td>Somme</td>
                        <td colspan="10"></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <br/>
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
