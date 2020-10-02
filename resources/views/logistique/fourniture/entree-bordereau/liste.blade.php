@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Entrée bordereau</h2></div>
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
        <div class="col">
            <table class="table table-bordered" style="width: 100%;" id="liste">
                <thead>
                <tr>
                    <td>Date</td>
                    <td>Numero Carte</td>
                    <td>Societe</td>
                    <td>ID Vehicule</td>
                    <td>Date acquisition</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($entreeBordereaux as $entreeBordereau)
                    <tr>
                        <td>{{$entreeBordereau->id}}</td>
                        <td>
                            <div class="two-columns">
                                <div>
                                    <a href="{{ route('logistique-entree-bordereau.store.edit', $carte->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                </div>
                                <div>
                                    <form action="{{ route('logistique-entree-bordereau.destroy', $carte->id)}}" method="post">
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
