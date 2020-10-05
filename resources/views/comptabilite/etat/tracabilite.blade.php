@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Etat traçabilité</h2></div>
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
                        <td>Date enlèvement</td>
                        <td>Heure enlèvement</td>
                        <td>N° Bordereau</td>
                        <td>Site enlèvement</td>
                        <td>N°Tournée</td>
                        <td>Date dépot</td>
                        <td>Heure dépot</td>
                        <td>Site dépôt</td>
                        <td>N°Tournée</td>
                        <td>Montant</td>
                        <td>Client</td>
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
