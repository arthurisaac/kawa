@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Etat bordereau utilisé</h2></div>
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
        <table id="table_client_information" class="table table-bordered table-hover" style="width: 100%;">
            <thead>
            <tr>
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
