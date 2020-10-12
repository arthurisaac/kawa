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

        <div class="row">
            <div class="col">
                <form action="{{ route('user.update', $user->id) }}">

                </form>
            </div>
        </div>
    </div>
@endsection
