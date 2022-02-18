@extends('bases.logistique')

@section('main')
    @extends('bases.toolbar', ["title" => "Logistique", "subTitle" => "Etat bordereau utilisé"])
    <div class="burval-container">
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
        <table id="table_client_information" class="table table-striped gy-7 gs-7 pt-0" style="width: 100%;">
            <thead>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                <td>Site</td>
                <td>Nombre de bordereaux</td>
                <td>Nombre de bordereaux utilisé</td>
                <td>Nombre de bordereaux restant</td>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function () {
            $('#table_client_information').DataTable({
                "language": {
                    "url": "../French.json"
                }
            });
        });
    </script>
@endsection
