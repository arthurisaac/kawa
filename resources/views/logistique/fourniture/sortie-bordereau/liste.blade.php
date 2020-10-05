@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Sortie bordereau</h2></div>
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
                    <td>Debut série</td>
                    <td>Fin série</td>
                    <td>Date</td>
                    <td>Service</td>
                    <td>Prix</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($sortieBordereaux as $sortieBordereau)
                    <tr>
                        <td>{{$sortieBordereau->id}}</td>
                        <td>{{$sortieBordereau->debutSerie}}</td>
                        <td>{{$sortieBordereau->date}}</td>
                        <td>{{$sortieBordereau->service}}</td>
                        <td>{{$sortieBordereau->prix}}</td>
                        <td>
                            <div class="two-columns">
                                <div>
                                    <a href="{{ route('logistique-sortie-bordereau.edit', $sortieBordereau->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                </div>
                                <div>
                                    <form action="{{ route('logistique-sortie-bordereau.destroy', $sortieBordereau->id)}}" method="post">
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
