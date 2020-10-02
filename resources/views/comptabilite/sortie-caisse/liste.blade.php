@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Sortie caisse</h2></div>
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
                            <td>Date</td>
                            <td>Somme</td>
                            <td>Motif</td>
                            <td>Bénéficiaire</td>
                            <td>Service</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($sortieCaisses as $sortieCaisse)
                        <tr>
                            <td>{{$sortieCaisse->id}}</td>
                            <td>{{$sortieCaisse->date}}</td>
                            <td>{{$sortieCaisse->somme}}</td>
                            <td>{{$sortieCaisse->motif}}</td>
                            <td>{{$sortieCaisse->beneficiaire}}</td>
                            <td>{{$sortieCaisse->service}}</td>
                            <td>
                                <div class="two-columns">
                                    <div>
                                        <a href="{{ route('comptabilite-sortie-caisse.edit', $sortieCaisse->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                    </div>
                                    <div>
                                        <form action="{{ route('comptabilite-sortie-caisse.destroy', $sortieCaisse->id)}}" method="post">
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
