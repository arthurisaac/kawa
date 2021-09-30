@extends('base')

@section('main')
    <link rel="stylesheet" href="{{ asset('css/tabstyles.css') }}">
    <div class="burval-container">
        <div><h2 class="heading">Entretien véhicule</h2></div>
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
            </div><br/>
        @endif
        <br>
        <br>
        <div class="container">
            <ul class="nav nav-tabs tabs-dark bg-dark" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="vidange-generale-tab" data-toggle="tab" href="#vidange-generale"
                       role="tab"
                       aria-controls="vidange-generale" aria-selected="true">Vidange générale</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="vidange-huile-tab" data-toggle="tab" href="#vidange-huile" role="tab"
                       aria-controls="vidange-huile" aria-selected="false">Vidange huile de pont</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="courroie-tab" data-toggle="tab" href="#courroie" role="tab"
                       aria-controls="courroie" aria-selected="false">Courroie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="patente-tab" data-toggle="tab" href="#patente" role="tab"
                       aria-controls="patente" aria-selected="false">Patente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="vignette-tab" data-toggle="tab" href="#vignette" role="tab"
                       aria-controls="vignette" aria-selected="false">Vignette</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="carte-transport-tab" data-toggle="tab" href="#carte-transport" role="tab"
                       aria-controls="carte-transport" aria-selected="false">Carte de transport</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="vidange-visite-tab" data-toggle="tab" href="#vidange-visite" role="tab"
                       aria-controls="vidange-visite" aria-selected="false">Visite technique</a>
                </li>
            </ul>
            <br>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="vidange-generale" role="tabpanel"
                     aria-labelledby="vidange-generale-tab">
                    <div class="container">
                        <table class="table table-bordered" id="listeVG">
                            <thead>
                            <tr>
                                <th>Véhicule</th>
                                <th>Total vidange</th>
                                <th>Km actuel</th>
                                <th>Prochain km</th>
                                <th>Prochain changement</th>
                                <th style="width: 25px; text-align: center;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($vidangeCourroie as $vidange)
                                <tr>
                                    <td>{{$vidange->vehicules->immatriculation ?? "Donnée indisponible"}}</td>
                                    <td>{{$vidange->huileMoteurmontant + $vidange->filtreHuileMontant + $vidange->filtreGazoilMontant + $vidange->filtreAirMontant }}</td>
                                    <td>{{$vidange->kmActuel}}</td>
                                    <td>{{$vidange->prochainKm}}</td>
                                    <td>{{date('d/m/Y', strtotime($vidange->date . " + 7 day"))}}</td>
                                    <td style="text-align: center;">
                                        <a class="btn btn-danger btn-sm"
                                           onclick="supprimerVG('{{$vidange->id}}', this)"></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="vidange-huile" role="tabpanel" aria-labelledby="vidange-huile-tab">
                    <div class="container">
                        <table class="table table-bordered" id="listeVHM">
                            <thead>
                            <tr>
                                <th>Véhicule</th>
                                <th>Total vidange</th>
                                <th>Prochaine vidange</th>
                                <th style="width: 25px; text-align: center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($vidangePonts as $vidange)
                                <tr>
                                    <td>{{$vidange->vehicules->immatriculation ?? "Donnée indisponible"}}</td>
                                    <td>{{$vidange->huileMoteurmontant + $vidange->filtreHuileMontant + $vidange->filtreGazoilMontant + $vidange->filtreAirMontant }}</td>
                                <!--<td>{{date('Y-m-d H:i:s'), strtotime($vidange->date. ' + 5 days')}}</td>-->
                                    <td>{{date('d/m/Y', strtotime($vidange->date . " + 7 day"))}}</td>
                                    <td style="text-align: center;">
                                        <a class="btn btn-danger btn-sm"
                                           onclick="supprimerVHM('{{$vidange->id}}', this)"></a>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="patente" role="tabpanel" aria-labelledby="patente-tab">
                    <div class="container">
                        <table class="table table-bordered" id="listePatente">
                            <thead>
                            <tr>
                                <th>Véhicule</th>
                                <th>Date</th>
                                <th>Prochain changement de patente</th>
                                <th style="width: 25px; text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($vidangePatentes as $vidange)
                                <tr>
                                    <td>{{$vidange->vehicules->immatriculation ?? "Donnée indisponible"}}</td>
                                    <td>{{date('d/m/Y', strtotime($vidange->date))}}</td>
                                    <td>{{date('d/m/Y', strtotime($vidange->prochainRenouvellement))}}</td>
                                    <td style="text-align: center">
                                        <a class="btn btn-danger btn-sm"
                                           onclick="supprimerPatente('{{$vidange->id}}', this)"></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="courroie" role="tabpanel" aria-labelledby="courroie-tab">
                    <div class="container">
                        <table class="table table-bordered" id="listeVC">
                            <thead>
                            <tr>
                                <th>Véhicule</th>
                                <th>Total vidange</th>
                                <th>Prochain changement de courroie</th>
                                <th  style="width: 25px; text-align: center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($vidangeCourroie as $vidange)
                                <tr>
                                    <td>{{$vidange->vehicules->immatriculation ?? "Donnée indisponible"}}</td>
                                    <td>{{$vidange->huileMoteurmontant + $vidange->filtreHuileMontant +
                            $vidange->filtreGazoilMontant + $vidange->filtreAirMontant }}
                                    </td>
                                    <td>{{date('d/m/Y', strtotime($vidange->date . " + 7 day"))}}</td>
                                    <td>
                                        <a class="btn btn-danger btn-sm"
                                           onclick="supprimerVC('{{$vidange->id}}', this)"></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="vignette" role="tabpanel" arialabelledby="vignette-tab">
                    <div class="container">
                        <table class="table table-bordered" id="listeVV">
                            <thead>
                            <tr>
                                <th>Véhicule</th>
                                <th>Date</th>
                                <th>Prochaine vignette</th>
                                <th  style="width: 25px; text-align: center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($vidangeVignette as $vidange)
                                <tr>
                                    <td>{{$vidange->vehicules->immatriculation ?? "Donnée indisponible"}}</td>
                                    <td>{{date('d/m/Y', strtotime($vidange->date))}}</td>
                                    <td>{{date('d/m/Y', strtotime($vidange->prochainRenouvellement))}}</td>
                                    <td>
                                        <a class="btn btn-danger btn-sm"
                                           onclick="supprimerVV('{{$vidange->id}}', this)"></a>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="carte-transport" role="tabpanel"
                     aria-labelledby="carte-transport-tab">
                    <div class="container">
                        <table class="table table-bordered" id="listeVCT">
                            <thead>
                            <tr>
                                <th>Véhicule</th>
                                <th>Date</th>
                                <th>Prochaine vignette</th>
                                <th style="width: 25px; text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($vidangeTransport as $vidange)
                                <tr>
                                    <td>{{$vidange->vehicules->immatriculation ?? "Donnée indisponible"}}</td>
                                    <td>{{date('d/m/Y', strtotime($vidange->date))}}</td>
                                    <td>{{date('d/m/Y', strtotime($vidange->prochainRenouvellement))}}</td>
                                    <td>
                                        <a class="btn btn-danger btn-sm"
                                           onclick="supprimerVCT('{{$vidange->id}}', this)"></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="vidange-visite" role="tabpanel"
                     aria-labelledby="vidange-visite-tab">
                    <div class="container">
                        <table class="table table-bordered" id="listeVVT">
                            <thead>
                            <tr>
                                <th>Véhicule</th>
                                <th>Date</th>
                                <th>Prochaine visite</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($vidangeVisite as $vidange)
                                <tr>
                                    <td>{{$vidange->vehicules->immatriculation ?? "Donnée indisponible"}}</td>
                                    <td>{{date('d/m/Y', strtotime($vidange->date))}}</td>
                                    <td>{{date('d/m/Y', strtotime($vidange->prochainRenouvellement))}}</td>
                                    <td>
                                        <a class="btn btn-danger btn-sm"
                                           onclick="supprimerVVT('{{$vidange->id}}', this)"></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function supprimerVHM(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "vidange-pont/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        _token: token,
                    },
                    success: function (response) {
                        console.log(response);
                        alert("Suppression effectuée");
                        const indexLigne = $(e).closest('tr').get(0).rowIndex;
                        document.getElementById("listeVHM").deleteRow(indexLigne);
                    },
                    error: function () {
                        alert("Une erreur s'est produite");
                    }
                });
            }
        }

        function supprimerVCT(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "vidange-transport/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        _token: token,
                    },
                    success: function (response) {
                        console.log(response);
                        alert("Suppression effectuée");
                        const indexLigne = $(e).closest('tr').get(0).rowIndex;
                        document.getElementById("listeVCT").deleteRow(indexLigne);
                    },
                    error: function () {
                        alert("Une erreur s'est produite");
                    }
                });
            }
        }

        function supprimerVVT(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "vidange-visite/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        _token: token,
                    },
                    success: function (response) {
                        console.log(response);
                        alert("Suppression effectuée");
                        const indexLigne = $(e).closest('tr').get(0).rowIndex;
                        document.getElementById("listeVVT").deleteRow(indexLigne);
                    },
                    error: function () {
                        alert("Une erreur s'est produite");
                    }
                });
            }
        }

        function supprimerVC(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "vidange-courroie/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        _token: token,
                    },
                    success: function (response) {
                        console.log(response);
                        alert("Suppression effectuée");
                        const indexLigne = $(e).closest('tr').get(0).rowIndex;
                        document.getElementById("listeVC").deleteRow(indexLigne);
                    },
                    error: function () {
                        alert("Une erreur s'est produite");
                    }
                });
            }
        }

        function supprimerVV(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "vidange-vignette/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        _token: token,
                    },
                    success: function (response) {
                        console.log(response);
                        alert("Suppression effectuée");
                        const indexLigne = $(e).closest('tr').get(0).rowIndex;
                        document.getElementById("listeVV").deleteRow(indexLigne);
                    },
                    error: function () {
                        alert("Une erreur s'est produite");
                    }
                });
            }
        }

        function supprimerVG(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "vidange-generale/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        _token: token,
                    },
                    success: function (response) {
                        console.log(response);
                        alert("Suppression effectuée");
                        const indexLigne = $(e).closest('tr').get(0).rowIndex;
                        document.getElementById("listeVG").deleteRow(indexLigne);
                    },
                    error: function () {
                        alert("Une erreur s'est produite");
                    }
                });
            }
        }

        function supprimerPatente(id, e) {
            if (confirm("Confirmer la suppression?")) {
                const token = "{{ csrf_token() }}";
                $.ajax({
                    url: "vidange-patente/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        _token: token,
                    },
                    success: function (response) {
                        console.log(response);
                        alert("Suppression effectuée");
                        const indexLigne = $(e).closest('tr').get(0).rowIndex;
                        document.getElementById("listePatente").deleteRow(indexLigne);
                    },
                    error: function () {
                        alert("Une erreur s'est produite");
                    }
                });
            }
        }
    </script>
    <script>
        $(document).ready(function () {
            $('#listeVG').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
            $('#listeVHM').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
            $('#listeVV').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
            $('#listeVC').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
            $('#listeVCT').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
            $('#listeVVT').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
            $('#listePatente').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        });
    </script>
@endsection
