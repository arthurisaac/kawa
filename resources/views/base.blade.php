<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BURVAL</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('magnificpopup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/burval.css') }}">
    <script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>

</head>
<body>
<div>
    @yield('main')
</div>

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('magnificpopup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('js/wwb15.min.js') }}"></script>
<script src="{{ asset('js/jscookmenu.min.js') }}"></script>
<script>
    function removeSpaceValeurColis() {
        $.each($("input[name='regulation_arrivee_valeur_colis[]']"), function (i) {
            const nbre = $("input[name='regulation_arrivee_valeur_colis[]'").get(i).value;
            $("input[name='regulation_arrivee_valeur_colis[]'").eq(i).val(removeSpace(nbre));
        });
        $.each($("input[name='regulation_depart_valeur_colis[]']"), function (i) {
            const nbre = $("input[name='regulation_depart_valeur_colis[]'").get(i).value;
            $("input[name='regulation_depart_valeur_colis[]'").eq(i).val(removeSpace(nbre));
        });
        $.each($("input[name='transport_arrivee_valeur_colis[]']"), function (i) {
            const nbre = $("input[name='transport_arrivee_valeur_colis[]'").get(i).value;
            $("input[name='transport_arrivee_valeur_colis[]'").eq(i).val(removeSpace(nbre));
        });
        $.each($("input[name='caisse_entree_valeur_colis[]']"), function (i) {
            const nbre = $("input[name='caisse_entree_valeur_colis[]'").get(i).value;
            $("input[name='caisse_entree_valeur_colis[]'").eq(i).val(removeSpace(nbre));
        });
        $.each($("input[name='valeur_colis_xof_sortie[]']"), function (i) {
            const nbre = $("input[name='valeur_colis_xof_sortie[]'").get(i).value;
            $("input[name='valeur_colis_xof_sortie[]'").eq(i).val(removeSpace(nbre));
        });
    }

    function enableAllColisField() {
        let index = 0;
        const thisColisInput = this;
        $.each($("select[name='colis[]']"), function (i) {
            const colis = $("select[name='colis[]']").get(i);
            if (thisColisInput === colis) {
                index = i;
            }
            $("textarea[name='numero[]']").eq(i).prop('readonly', false);
            $("input[name='nbre_colis[]']").eq(i).prop('readonly', false);
            $("input[name='regulation_arrivee_valeur_colis[]']").eq(i).prop('readonly', false);
            $("input[name='regulation_depart_valeur_colis[]']").eq(i).prop('readonly', false);
            $("select[name='nature[]']").eq(i).prop('disabled', false);
            $("select[name='regulation_arrivee_devise[]']").eq(i).prop('disabled', false);
        });
    }

    function separateNumber(e){
        try {
            let str = e.replace(/\s/g, '');
            const donnee = parseFloat(str);
            return Number(donnee).toLocaleString();
        } catch (e) {
            console.log(e);
            return 0;
        }
    }
</script>

</body>
</html>
