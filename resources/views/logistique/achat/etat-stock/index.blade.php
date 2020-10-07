@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Etat stock</h2></div>
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
                        <td>Fournisseur</td>
                        <td>Ref. produit</td>
                        <td>Libellé</td>
                        <td>Date</td>
                        <td>Qté réappro</td>
                        <td>Qté mini</td>
                        <td>Qté IN</td>
                        <td>Qté OUT</td>
                        <td>Service / Centre</td>
                        <td>N° Facture</td>
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
                <div class="form-group row">
                    <label class="col-sm-4">Quantité entrée</label>
                    <input type="number" class="form-control col-sm-8" readonly>
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-4">Quantité sortie</label>
                    <input type="number" class="form-control col-sm-8" readonly>
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-4">Quantité en stock</label>
                    <input type="number" class="form-control col-sm-8" readonly>
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
    </script>
@endsection
