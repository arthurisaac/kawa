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

    function calculerBilletageAnnonce() {
        const ba_nb10000 = $("#ba_nb10000").val();
        const ba_nb5000 = $("#ba_nb5000").val();
        const ba_nb2000 = $("#ba_nb2000").val();
        const ba_nb1000 = $("#ba_nb1000").val();
        const ba_nb500 = $("#ba_nb500").val();
        const ba_nb250 = $("#ba_nb250").val();
        const ba_nb200 = $("#ba_nb200").val();
        const ba_nb100 = $("#ba_nb100").val();
        const ba_nb50 = $("#ba_nb50").val();
        const ba_nb10 = $("#ba_nb10").val();
        const ba_nb5 = $("#ba_nb5").val();
        const ba_nb1 = $("#ba_nb1").val();

        const ba_nb10000_value = isNaN(parseInt(ba_nb10000)) ? 0 : parseInt(ba_nb10000) * 10000;
        const ba_nb5000_value = isNaN(parseInt(ba_nb5000)) ? 0 : parseInt(ba_nb5000) * 5000;
        const ba_nb2000_value = isNaN(parseInt(ba_nb2000)) ? 0 : parseInt(ba_nb2000) * 2000;
        const ba_nb1000_value = isNaN(parseInt(ba_nb1000)) ? 0 : parseInt(ba_nb1000) * 1000;
        const ba_nb500_value = isNaN(parseInt(ba_nb500)) ? 0 : parseInt(ba_nb500) * 500;
        const ba_nb250_value = isNaN(parseInt(ba_nb250)) ? 0 : parseInt(ba_nb250) * 250;
        const ba_nb200_value = isNaN(parseInt(ba_nb200)) ? 0 : parseInt(ba_nb200) * 200;
        const ba_nb100_value = isNaN(parseInt(ba_nb100)) ? 0 : parseInt(ba_nb100) * 100;
        const ba_nb50_value = isNaN(parseInt(ba_nb50)) ? 0 : parseInt(ba_nb50) * 50;
        const ba_nb10_value = isNaN(parseInt(ba_nb10)) ? 0 : parseInt(ba_nb10) * 10;
        const ba_nb5_value = isNaN(parseInt(ba_nb5)) ? 0 : parseInt(ba_nb5) * 5;
        const ba_nb1_value = isNaN(parseInt(ba_nb1)) ? 0 : parseInt(ba_nb1);

        montantAnnonce = ba_nb10000_value + ba_nb5000_value + ba_nb2000_value + ba_nb1000_value + ba_nb500_value
            + ba_nb250_value + ba_nb200_value + ba_nb100_value + ba_nb50_value + ba_nb10_value + ba_nb5_value + ba_nb1_value;

        $("#montantAnnonce").val(montantAnnonce);
    }
    function calculerBilletageReconnu() {
        const br_nb10000 = $("#br_nb10000").val();
        const br_nb5000 = $("#br_nb5000").val();
        const br_nb2000 = $("#br_nb2000").val();
        const br_nb1000 = $("#br_nb1000").val();
        const br_nb500 = $("#br_nb500").val();
        const br_nb250 = $("#br_nb250").val();
        const br_nb200 = $("#br_nb200").val();
        const br_nb100 = $("#br_nb100").val();
        const br_nb50 = $("#br_nb50").val();
        const br_nb25 = $("#br_nb25").val();
        const br_nb10 = $("#br_nb10").val();
        const br_nb5 = $("#br_nb5").val();
        const br_nb1 = $("#br_nb1").val();

        const br_nb10000_value = isNaN(parseInt(br_nb10000)) ? 0 : parseInt(br_nb10000) * 10000;
        const br_nb5000_value = isNaN(parseInt(br_nb5000)) ? 0 : parseInt(br_nb5000) * 5000;
        const br_nb2000_value = isNaN(parseInt(br_nb2000)) ? 0 : parseInt(br_nb2000) * 2000;
        const br_nb1000_value = isNaN(parseInt(br_nb1000)) ? 0 : parseInt(br_nb1000) * 1000;
        const br_nb500_value = isNaN(parseInt(br_nb500)) ? 0 : parseInt(br_nb500) * 500;
        const br_nb250_value = isNaN(parseInt(br_nb250)) ? 0 : parseInt(br_nb250) * 250;
        const br_nb200_value = isNaN(parseInt(br_nb200)) ? 0 : parseInt(br_nb200) * 200;
        const br_nb100_value = isNaN(parseInt(br_nb100)) ? 0 : parseInt(br_nb100) * 100;
        const br_nb50_value = isNaN(parseInt(br_nb50)) ? 0 : parseInt(br_nb50) * 50;
        const br_nb25_value = isNaN(parseInt(br_nb25)) ? 0 : parseInt(br_nb25) * 50;
        const br_nb10_value = isNaN(parseInt(br_nb10)) ? 0 : parseInt(br_nb10) * 10;
        const br_nb5_value = isNaN(parseInt(br_nb5)) ? 0 : parseInt(br_nb5) * 5;
        const br_nb1_value = isNaN(parseInt(br_nb1)) ? 0 : parseInt(br_nb1);

        montantReconnu = br_nb10000_value + br_nb5000_value + br_nb2000_value + br_nb1000_value + br_nb500_value
            + br_nb250_value + br_nb200_value + br_nb100_value + br_nb50_value + br_nb25_value + br_nb10_value + br_nb5_value + br_nb1_value;

        $("#montantReconnu").val(montantReconnu);
    }
    function calculerEcartConstate() {
        $("#ecartConstate").val(montantReconnu - montantAnnonce);
    }
</script>

</body>
</html>
