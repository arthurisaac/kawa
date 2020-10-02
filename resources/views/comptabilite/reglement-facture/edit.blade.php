@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Règlement facture</h2></div>
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

        <form class="form-horizontal" method="post" action="{{ route('comptabilite-reglement-fature.update', $facture->id) }}">
            @method('PATCH')
            @csrf


        </form>

    </div>
@endsection
