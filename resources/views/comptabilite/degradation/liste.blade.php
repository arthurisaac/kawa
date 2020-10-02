@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Dégradation</h2></div>
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
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Lieu</td>
                            <td>Destination/Provanance</td>
                            <td>Site</td>
                            <td>Client</td>
                            <td>Conteneur enlevé</td>
                            <td>Conteneur avec fond</td>
                            <td>Montant</td>
                            <td>Date declaration</td>
                            <td>Bordereau</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($degradations as $degradation)
                        <tr>
                            <td>{{$degradation->id}}</td>
                            <td>{{$degradation->lieu}}</td>
                            <td>{{$degradation->destinationProvenance}}</td>
                            <td>{{$degradation->site}}</td>
                            <td>{{$degradation->client}}</td>
                            <td>{{$degradation->conteneurEnleve}}</td>
                            <td>{{$degradation->conteneurAvecFonds}}</td>
                            <td>{{$degradation->montant}}</td>
                            <td>{{$degradation->dateDeclaration}}</td>
                            <td>{{$degradation->bordereau}}</td>
                            <td>
                                <div class="two-columns">
                                    <div>
                                        <a href="{{ route('comptabilite-degradation.edit', $degradation->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                    </div>
                                    <div>
                                        <form action="{{ route('comptabilite-degradation.destroy', $degradation->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                                        </form>
                                    </div>
                                </div>

                            </td>
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
