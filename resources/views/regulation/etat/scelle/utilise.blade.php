@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Etat scellé vendu</h2></div>
        <br/>
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
                <div class="form-group row">
                    <label for="" class="col-sm-5">Date début</label>
                    <input type="date" class="form-control col-sm-7">
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label for="" class="col-sm-5">Date fin</label>
                    <input type="date" class="form-control col-sm-7">
                </div>
            </div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                    <tr>
                        <td>Date</td>
                        <td>N°Scellé</td>
                        <td>Client</td>
                        <td>Site</td>
                        <td>Prix unitaire</td>
                        <td>Quantité</td>
                        <td>Prix total</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($regulations as $regulation)
                        <tr>
                            <td>{{$regulation->date}}</td>
                            <td>{{$regulation->typeSecuripack}}</td>
                            <td>{{$regulation->client}}</td>
                            <td>{{$regulation->site}}</td>
                            <td>{{$regulation->prixUnitaire}}</td>
                            <td>{{$regulation->quantite}}</td>
                            <td>{{$regulation->prixTotal}}</td>
                        </tr>
                    @endforeach
                    </tbody>
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
