@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Entree bon de commande</h2></div>
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

    <form method="post" action="{{ route('carte-carburant.update', $entree->id) }}">
        @method('PATCH')
        @csrf

    </form>
</div>
@endsection
