@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Bon de commande</h2></div>
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

        @if(session()->get('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                    <tr>
                        <td>date</td>
                        <td>Numero bon</td>
                        <td>Proforma</td>
                        <td>Fournisseur</td>
                        <td>Tel</td>
                        <td>Total</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bons as $bon)
                        <tr>
                            <td>{{$bon->numero}}</td>
                            <td>{{$bon->date}}</td>
                            <td>{{$bon->proforma}}</td>
                            <td>{{$bon->fournisseurs->denomination ?? $bon->fournisseur_fk}}</td>
                            <td>{{$bon->telephone}}</td>
                            <td>{{$bon->total}}</td>
                            <td>
                                <a href="{{ route('achat-bon.edit', $bon->id)}}"
                                   class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('achat-bon.destroy', $bon->id)}}"
                                      method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
