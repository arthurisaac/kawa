@extends('bases.informatique')

@section('main')
    @extends('bases.toolbar', ["title" => "Informatique", "subTitle" => "Liste Opération maintenance"])
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
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
                <table class="table table-bordered table-hover" style="width: 100%"  id="liste">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                    <td>ID</td>
                        <td>Centre</td>
                        <td>Centre régional</td>
                        <td>Service</td>
                        <td>Date</td>
                        <td>Matériel défectueux</td>
                        <td>Rapport matériel</td>
                        <td>Date début</td>
                        <td>Date fin</td>
                        <td>Opération effectuée</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($informatiques as $informatique)
                        <tr>
                            <td>{{$informatique->id}}</td>
                            <td>{{$informatique->centre}}</td>
                            <td>{{$informatique->centreRegional}}</td>
                            <td>{{$informatique->service}}</td>
                            <td>{{$informatique->date}}</td>
                            <td>{{$informatique->materielDefectueux}}</td>
                            <td>{{$informatique->rapportMateriel}}</td>
                            <td>{{$informatique->dateDebut}}</td>
                            <td>{{$informatique->dateFin}}</td>
                            <td>{{$informatique->operationEffectuee}}</td>
                            <td>
                                <a href="{{ route('informatique-maintenance.edit',$informatique->id)}}"
                                   class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('informatique-maintenance.destroy', $informatique->id)}}"
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
