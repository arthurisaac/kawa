@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Utilisateurs</h2></div>
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

        <a class="btn btn-info btn-sm btn" href="{{ route('user.create') }}">Ajouter +</a>
        <br />
        <br />
        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nom</td>
                        <td>Email</td>
                        <td>Roles</td>
                        <td>Crée le</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->nom}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->roles->role}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                <a href="{{ route('user.edit',$user->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('user.destroy', $user->id)}}" method="post">
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
