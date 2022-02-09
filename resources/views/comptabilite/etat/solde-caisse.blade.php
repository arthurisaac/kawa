@extends('bases.comptabilite')

@section('main')

@extends('bases.toolbar', ["title" => "Comptabilité", "subTitle" => "Etat solde caisse"])

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">

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

            <div class="card card-xl-stretch">
                <div class="card-header">
                    <h3 class="card-title fw-bolder text-dark">Fonds entrés</h3>
                </div>
                <div class="card-body">
                    <table class="table  table-striped gy-7 gs-7" style="width: 100%;" id="liste">
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

            <br>

            <div class="card card-xl-stretch">
                <div class="card-header bg-danger">
                    <h3 class="card-title fw-bolder text-white">Fonds sortis</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped gy-7 gs-7" style="width: 100%;" id="listeSortie">
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
        $(document).ready(function () {
            $('#listeSortie').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        });
    </script>
@endsection
