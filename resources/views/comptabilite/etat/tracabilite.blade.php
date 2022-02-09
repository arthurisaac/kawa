@extends('bases.caisse')

@section('main')

@extends('bases.toolbar', ["title" => "Comptabilité", "subTitle" => "Facture"])
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Row-->
        {{--<div class="titre"><span class="titre">Chiffre d'affaire</span> : <span id="chiffreAffaire"
            class="text-danger chiffreAffaire"></span>
            <span
            style="margin-left: 10px;">Nombre de passage : <span
            class="text-danger">{{count($sites)}}</span></span>
        </div>--}}
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
        
        
        <div class="card card-xl-stretch">
            <table class="table table-striped gy-7 gs-7" style="width: 100%;" id="liste">
                <thead>
                    <tr>
                        <td>Date enlèvement</td>
                        <td>Heure enlèvement</td>
                        <td>N° Bordereau</td>
                        <td>Site enlèvement</td>
                        <td>N°Tournée</td>
                        <td>Date dépot</td>
                        <td>Heure dépot</td>
                        <td>Site dépôt</td>
                        <td>N°Tournée</td>
                        <td>Montant</td>
                        <td>Client</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Somme</td>
                        <td colspan="6"></td>
                    </tr>
                </tfoot>
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
