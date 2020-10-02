@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Carburant véhicule</h2></div>
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

        <div class="row">
            <div class="col-3">
                <label>Date debut</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-3">
                <label>Date fin</label>
                <input type="date" class="form-control">
            </div>
        </div>
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
                </table>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-3">
                <div class="form-group row">
                    <label class="col-sm-5">Solde ticket</label>
                    <input type="number" class="form-control col-sm-7" readonly>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group row">
                    <label class="col-sm-5">Solde comptant</label>
                    <input type="number" class="form-control col-sm-7" readonly>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group row">
                    <label class="col-sm-5">Solde</label>
                    <input type="number" class="form-control col-sm-7" readonly>
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
