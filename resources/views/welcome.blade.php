<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jscookmenu.min.js"></script>
    <link href="css/burval.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <script src="js/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="magnificpopup/magnific-popup.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="magnificpopup/jquery.magnific-popup.min.js"></script>
    <script src="js/wwb15.min.js"></script>
    <script>
        function displaylightbox(url, options) {
            options.items = {src: url};
            options.type = 'iframe';
            $.magnificPopup.open(options);
        }
    </script>

    <title>Burval</title>

    <!-- Styles -->
    <style>

        .content {
            background: url("images/kawa-home.png") center;
            background-size: cover;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            padding: 40px;
        }

        .row {
            display: flex;
            justify-content: space-around;
            margin: 20px;
        }

        .element {
            background: yellow;
            height: 80px;
            display: flex;
            flex-direction: row;
            align-items: center;
            border: 1px solid #000;
            border-radius: 5px;
            justify-content: center;
            flex: 1 0 21%;
            min-width: 170px;
            margin: 20px;
        }

        .logo {
            width: 181px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin: 25px 10px;
        }

        .login {
            width: 250px;
            border: 1px solid #004D40;
            display: flex;
            justify-content: center;
            flex-direction: row;
            align-items: center;
        }
    </style>
</head>
<body>
<br/>
<div class="header">
    <img alt="logo" src="images/logonoir.png" class="logo"/>

    <div class="login">

        {{--@if (Route::has('login'))--}}
        <div class="top-right links">
            @if (session('user'))
                <a href="/logout">DECONNEXION</a>
            @else
                <a href="/login">CONNEXION</a>

                {{--@if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif--}}
            @endauth
        </div>
        {{--@endif--}}
    </div>
</div>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="row">

            @if (in_array('commercial', (array)$services))
                <div class="element">
                    <!--COMMERCIAL-->
                    <nav id="wb_MenuBar2">
                        <div id="MenuBar2">
                            <ul style="display:none;">
                                <li><span></span><span>COMMERCIAL</span>
                                    <ul>
                                        <li><span></span><span>Client</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('commercial-client','no','no','no','yes','yes','no','','','1200','800')"
                                                        target="_self" title="Nouveau">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('commercial-client-liste','no','no','no','yes','yes','no','','','1000','400')"
                                                        target="_self" title="Liste">Liste</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><a
                                                href="javascript:popupwnd('commercial-site','no','no','no','yes','yes','no','','','1000','500')"
                                                target="_self" title="Site">Site</a>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('commercial-site','no','no','no','yes','yes','no','','','1100','800')"
                                                        target="_self" title="Nouveau">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('commercial-site-liste','no','no','no','yes','yes','no','','','1000','600')"
                                                        target="_self" title="Liste">Liste</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <script>
                            const cmMenuBar2 =
                                {
                                    mainFolderLeft: '',
                                    mainFolderRight: '',
                                    mainItemLeft: '',
                                    mainItemRight: '',
                                    folderLeft: '',
                                    folderRight: '',
                                    itemLeft: '',
                                    itemRight: '',
                                    mainSpacing: 0,
                                    subSpacing: 0,
                                    delay: 100,
                                    offsetHMainAdjust: [0, 0],
                                    offsetSubAdjust: [0, 0]
                                };
                            const cmMenuBar2HSplit = [_cmNoClick, '<td class="MenuBar2MenuSplitLeft"><div></div></td>' +
                            '<td class="MenuBar2MenuSplitText"><div></div></td>' +
                            '<td class="MenuBar2MenuSplitRight"><div></div></td>'];
                            const cmMenuBar2MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar2HorizontalSplit">|</td></tr></table></div>'];
                            const cmMenuBar2MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar2MainSplitText"><div></div></td>'];
                            document.addEventListener('DOMContentLoaded', function (event) {
                                cmDrawFromText('MenuBar2', 'hbr', cmMenuBar2, 'MenuBar2');
                            });
                        </script>
                    </nav>
                </div>
            @endif

            @if (in_array('securité', (array)$services))
                <div class="element">
                    <!--SECURITE-->
                    <nav id="wb_MenuBar3">
                        <div id="MenuBar3">
                            <ul style="display:none;">
                                <li><span></span><span>SECURITE</span>
                                    <ul>
                                        <li><span></span><a
                                                href="javascript:popupwnd('maincourante','no','no','no','yes','yes','no','','','1000','600')"
                                                target="_self" title="Main courante">Main&nbsp;courante</a>
                                        </li>
                                        <li><span></span><span>Liste main courante</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('maincourante-departcentreliste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Liste">Liste départ centre</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('maincourante-arriveesiteliste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Liste">Liste arrivée site</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('maincourante-departsiteliste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Liste">Liste départ site</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('maincourante-arriveecentreliste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Liste">Liste arrivée centre</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('maincourante-synthese','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Liste">Synthèse de tournée</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><span>S&#233;curit&#233;</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Service">Service</a>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('securite-service','no','no','no','yes','yes','no','','','1100','800')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('securite-service-liste','no','no','no','yes','yes','no','','','1000','600')"
                                                                target="_self" title="Liste">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('materiel','no','no','no','yes','yes','no','','','1100','500')"
                                                        target="_self" title="Mat&#233;riel">Mat&#233;riel</a>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('materiel','no','no','no','yes','yes','no','','','1100','600')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('materiel-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Liste">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><span>Saisie</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('saisie','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Nouveau">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('saisie-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Liste">Liste</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <script>
                            const cmMenuBar3 =
                                {
                                    mainFolderLeft: '',
                                    mainFolderRight: '',
                                    mainItemLeft: '',
                                    mainItemRight: '',
                                    folderLeft: '',
                                    folderRight: '',
                                    itemLeft: '',
                                    itemRight: '',
                                    mainSpacing: 0,
                                    subSpacing: 0,
                                    delay: 100,
                                    offsetHMainAdjust: [0, 0],
                                    offsetSubAdjust: [0, 0]
                                };
                            const cmMenuBar3HSplit = [_cmNoClick, '<td class="MenuBar3MenuSplitLeft"><div></div></td>' +
                            '<td class="MenuBar3MenuSplitText"><div></div></td>' +
                            '<td class="MenuBar3MenuSplitRight"><div></div></td>'];
                            const cmMenuBar3MainVSplit = [_cmNoClick, '<div><table style="width:15px; border-spacing:0"><tr><td class="MenuBar3HorizontalSplit">|</td></tr></table></div>'];
                            const cmMenuBar3MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar3MainSplitText"><div></div></td>'];
                            document.addEventListener('DOMContentLoaded', function (event) {
                                cmDrawFromText('MenuBar3', 'hbr', cmMenuBar3, 'MenuBar3');
                            });
                        </script>
                    </nav>
                </div>
            @endif

            @if (in_array('caisse centrale', (array)$services))
                <div class="element">
                    <!--CAISSE CENTRALE-->
                    <nav id="wb_MenuBar4">
                        <div id="MenuBar4">
                            <ul style="display:none;">
                                <li><span></span><span>CAISSE&nbsp;CENTRALE</span>
                                    <ul>
                                        <li><span></span><span>Service</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('caisse-service','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Nouveau">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('caisse-service-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Liste">Liste</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><span>Colis</span>
                                            <ul>
                                                <li><span></span><span>Entr&#233;e&nbsp;de&nbsp;colis</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('caisse-entree-colis','no','no','no','yes','yes','no','','','1700','500')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('caisse-entree-colis-liste','no','no','no','yes','yes','no','','','1700','500')"
                                                                target="_self" title="Liste">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Sortie&nbsp;de&nbsp;colis</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('caisse-sortie-colis','no','no','no','yes','no','no','','','1000','500')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('caisse-sortie-colis-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Liste">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><span>CTV</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('ctv','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Nouveau">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('ctv-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Liste">Liste</a>
                                                </li>
                                                <li><span></span><span>Vid&#233;o&nbsp;surveillance</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('caisse-video-surveillance','no','no','no','yes','yes','no','','','1200','600')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('caisse-video-surveillance-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Liste">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <script>
                            const cmMenuBar4 =
                                {
                                    mainFolderLeft: '',
                                    mainFolderRight: '',
                                    mainItemLeft: '',
                                    mainItemRight: '',
                                    folderLeft: '',
                                    folderRight: '',
                                    itemLeft: '',
                                    itemRight: '',
                                    mainSpacing: 0,
                                    subSpacing: 0,
                                    delay: 100,
                                    offsetHMainAdjust: [0, 0],
                                    offsetSubAdjust: [0, 0]
                                };
                            const cmMenuBar4HSplit = [_cmNoClick, '<td class="MenuBar4MenuSplitLeft"><div></div></td>' +
                            '<td class="MenuBar4MenuSplitText"><div></div></td>' +
                            '<td class="MenuBar4MenuSplitRight"><div></div></td>'];
                            const cmMenuBar4MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar4HorizontalSplit">|</td></tr></table></div>'];
                            const cmMenuBar4MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar4MainSplitText"><div></div></td>'];
                            document.addEventListener('DOMContentLoaded', function (event) {
                                cmDrawFromText('MenuBar4', 'hbr', cmMenuBar4, 'MenuBar4');
                            });
                        </script>
                    </nav>
                </div>
            @endif

            @if (in_array('transport', (array)$services))
                <div class="element">
                    <!--TRANSPORT-->
                    <nav id="wb_MenuBar5">
                        <div id="MenuBar5">
                            <ul style="display:none;">
                                <li><span></span><span>TRANSPORT</span>
                                    <ul>
                                        <li><span></span><span>V&#233;hicule</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('vehicule','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Nouveau">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('vehicule-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Liste">Liste</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><span>D&#233;part&nbsp;tourn&#233;e</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('depart-tournee','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="D&#233;part tourn&#233;e">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('depart-tournee-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="D&#233;part tourn&#233;e">Liste</a>
                                                </li>
                                                <li style="display: none;"><span></span><a
                                                        href="javascript:popupwnd('site-desservi-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="D&#233;part tourn&#233;e">LISTE DES SITES DESSERVIS</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('ca-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="D&#233;part tourn&#233;e">Liste CA</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('ca-liste-non-facture','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="D&#233;part tourn&#233;e">Liste Opération non facturé</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li><span></span><a
                                                href="javascript:popupwnd('arrivee-tournee','no','no','no','yes','yes','no','','','1000','500')"
                                                target="_self" title="Arriv&#233;e tourn&#233;e">Arriv&#233;e&nbsp;tourn&#233;e</a>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('arrivee-tournee','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="D&#233;part tourn&#233;e">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('arrivee-tournee-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="D&#233;part tourn&#233;e">Liste</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('colis-arrivee-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="D&#233;part tourn&#233;e">Colis arrivée tournée</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><a
                                                href="javascript:popupwnd('entretien-vehicule','no','no','no','yes','yes','no','','','1000','500')"
                                                target="_self"
                                                title="Entretien v&#233;hicule">Entretien&nbsp;v&#233;hicule</a>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('entretien-vehicule','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Entretien&nbsp;v&#233;hicule">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('entretien-vehicule-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Entretien&nbsp;v&#233;hicule">Liste</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li style="display: none;"><span></span><span>Etat</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('heure-supp-recap','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Heure supp r&#233;cap">Heure&nbsp;supp&nbsp;r&#233;cap</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('heure-supp-detaille','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Heure supp d&#233;taill&#233;e">Heure&nbsp;supp&nbsp;d&#233;taill&#233;e</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <script>
                            const cmMenuBar5 =
                                {
                                    mainFolderLeft: '',
                                    mainFolderRight: '',
                                    mainItemLeft: '',
                                    mainItemRight: '',
                                    folderLeft: '',
                                    folderRight: '',
                                    itemLeft: '',
                                    itemRight: '',
                                    mainSpacing: 0,
                                    subSpacing: 0,
                                    delay: 100,
                                    offsetHMainAdjust: [0, 0],
                                    offsetSubAdjust: [0, 0]
                                };
                            const cmMenuBar5HSplit = [_cmNoClick, '<td class="MenuBar5MenuSplitLeft"><div></div></td>' +
                            '<td class="MenuBar5MenuSplitText"><div></div></td>' +
                            '<td class="MenuBar5MenuSplitRight"><div></div></td>'];
                            const cmMenuBar5MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar5HorizontalSplit">|</td></tr></table></div>'];
                            const cmMenuBar5MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar5MainSplitText"><div></div></td>'];
                            document.addEventListener('DOMContentLoaded', function (event) {
                                cmDrawFromText('MenuBar5', 'hbr', cmMenuBar5, 'MenuBar5');
                            });
                        </script>
                    </nav>
                </div>
            @endif

            @if (in_array('regulation', (array)$services))
                <div class="element">
                    <!--REGULATION-->
                    <nav id="wb_MenuBar6">
                        <div id="MenuBar6">
                            <ul style="display:none;">
                                <li><span></span><span>REGULATION</span>
                                    <ul>
                                        <li><span></span><span>Service</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('regulation-service','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Nouveau">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('regulation-service-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Liste">Liste</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><span>Stock</span>
                                            <ul>
                                                <li><span></span><span>Entrée</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('regulation-stock-entree','no','no','no','yes','yes','no','','','1300','700')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('regulation-stock-entree-liste','no','no','no','yes','yes','no','','','1200','600')"
                                                                target="_self" title="Liste">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Sortie</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('regulation-stock-sortie','no','no','no','yes','yes','no','','','1300','700')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('regulation-stock-sortie-liste','no','no','no','yes','yes','no','','','1200','600')"
                                                                target="_self" title="Liste">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><a
                                                            href="javascript:popupwnd('regulation-stock-appro','no','no','no','yes','yes','no','','','1200','600')"
                                                            target="_self" title="Liste">Liste</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><span>Confirmation&nbsp;reception&nbsp;client</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('regulation-confirmation','no','no','no','yes','yes','no','','','1200','600')"
                                                        target="_self">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('regulation-confirmation-liste','no','no','no','yes','yes','no','','','1200','600')"
                                                        target="_self">Liste</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><span>Facturation</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('regulation-facturation','no','no','no','yes','yes','no','','','1200','600')"
                                                        target="_self">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('regulation-facturation-liste','no','no','no','yes','yes','no','','','1200','600')"
                                                        target="_self">Liste</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><span>Tournées</span>
                                            <ul>
                                                <li><span></span><span>Départ tournée</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('regulation-depart-tournee','no','no','no','yes','yes','no','','','1200','600')"
                                                                target="_self">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('regulation-depart-tournee-liste','no','no','no','yes','yes','no','','','1200','600')"
                                                                target="_self">Liste</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('regulation-depart-colis','no','no','no','yes','yes','no','','','1200','600')"
                                                                target="_self">Colis départ</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Arrivée tournée</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('regulation-arrivee-tournee','no','no','no','yes','yes','no','','','1200','600')"
                                                                target="_self">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('regulation-arrivee-tournee-liste','no','no','no','yes','yes','no','','','1200','600')"
                                                                target="_self">Liste</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('regulation-arrivee-colis','no','no','no','yes','yes','no','','','1200','600')"
                                                                target="_self">Colis arrivée</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        {{--<li><span></span><span>Etat</span>
                                            <ul>
                                                <li><span></span><span>Securipack</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('regulation-etat-securipack-utilise','no','no','no','yes','yes','no','','','1200','600')"
                                                                target="_self">Securipack&nbsp;utilis&#233;</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('regulation-etat-securipack-vendu','no','no','no','yes','yes','no','','','1200','600')"
                                                                target="_self">Securipack&nbsp;vendu</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Scell&#233;</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('regulation-etat-scelle-utilise','no','no','no','yes','yes','no','','','1200','600')"
                                                                target="_self">Scell&#233;&nbsp;vendu</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('regulation-etat-scelle-vendu','no','no','no','yes','yes','no','','','1200','600')"
                                                                target="_self">Scell&#233;&nbsp;utilis&#233;</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>--}}
                                        {{--<li><span></span><span>Bordereau</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('etat-bordereau','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Etat bordereau">Etat&nbsp;bordereau</a>
                                                </li>
                                            </ul>
                                        </li>--}}
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <script>
                            const cmMenuBar6 =
                                {
                                    mainFolderLeft: '',
                                    mainFolderRight: '',
                                    mainItemLeft: '',
                                    mainItemRight: '',
                                    folderLeft: '',
                                    folderRight: '',
                                    itemLeft: '',
                                    itemRight: '',
                                    mainSpacing: 0,
                                    subSpacing: 0,
                                    delay: 100,
                                    offsetHMainAdjust: [0, 0],
                                    offsetSubAdjust: [0, 0]
                                };
                            const cmMenuBar6HSplit = [_cmNoClick, '<td class="MenuBar6MenuSplitLeft"><div></div></td>' +
                            '<td class="MenuBar6MenuSplitText"><div></div></td>' +
                            '<td class="MenuBar6MenuSplitRight"><div></div></td>'];
                            const cmMenuBar6MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar6HorizontalSplit">|</td></tr></table></div>'];
                            const cmMenuBar6MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar6MainSplitText"><div></div></td>'];
                            document.addEventListener('DOMContentLoaded', function (event) {
                                cmDrawFromText('MenuBar6', 'hbr', cmMenuBar6, 'MenuBar6');
                            });
                        </script>
                    </nav>
                </div>
            @endif

            @if (in_array('transport', (array)$services))
                <div class="element">
                    <!--VIRGILE-->
                    <nav id="wb_MenuBar7">
                        <div id="MenuBar7">
                            <ul style="display:none;">
                                <li><span></span><span>CARBURANT</span>
                                    <ul>
                                        <li><span></span><span>Appro carte carburant</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('ticket-carburant','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('ticket-carburant-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self">Liste appro carburant</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('carburant-comptant','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self">carburant&nbsp;comptant</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('carburant-comptant-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self">Liste&nbsp;carburant&nbsp;comptant</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('carburant-prevision','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self">Pr&#233;vision&nbsp;carburant</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- Compabilite -->
                                        {{--<li><span></span><span>Carburant</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('carb-chargement-ticket','no','no','no','yes','yes','no','','','1200','600')"
                                                        target="_self">Carte&nbsp;carb/Chargement/ticket</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('carb-chargement','no','no','no','yes','yes','no','','','1200','600')"
                                                        target="_self">Carte&nbsp;carb/Chargement</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('carb-ticket','no','no','no','yes','yes','no','','','1200','600')"
                                                        target="_self">Carte&nbsp;carb/ticket</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('etat-carburant','no','no','no','yes','yes','no','','','1200','600')"
                                                        target="_self">Etat&nbsp;carburant</a>
                                                </li>
                                            </ul>
                                        </li>--}}
                                        <li><span></span><span>Param&#232;trage</span>
                                            <ul>
                                                {{--<li><span></span><span>Tarification</span></li>--}}
                                                <li><span></span><span>Carte&nbsp;carburant</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('carte-carburant','no','no','no','yes','yes','no','','','1300','700')"
                                                                target="_self">Creation&nbsp;carte</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('carte-carburant-liste','no','no','no','yes','yes','no','','','1300','700')"
                                                                target="_self">Liste&nbsp;des&nbsp;cartes</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><a>Carburant</a>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('carb-chargement-ticket-create','no','no','no','yes','yes','no','','','1300','700')"
                                                                target="_self">Chargement&nbsp;carte</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('carb-chargement-ticket','no','no','no','yes','yes','no','','','1300','700')"
                                                                target="_self">Liste&nbsp;chargement</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                        <script>
                            const cmMenuBar7 =
                                {
                                    mainFolderLeft: '',
                                    mainFolderRight: '',
                                    mainItemLeft: '',
                                    mainItemRight: '',
                                    folderLeft: '',
                                    folderRight: '',
                                    itemLeft: '',
                                    itemRight: '',
                                    mainSpacing: 0,
                                    subSpacing: 0,
                                    delay: 100,
                                    offsetHMainAdjust: [0, 0],
                                    offsetSubAdjust: [0, 0]
                                };
                            const cmMenuBar7HSplit = [_cmNoClick, '<td class="MenuBar7MenuSplitLeft"><div></div></td>' +
                            '<td class="MenuBar7MenuSplitText"><div></div></td>' +
                            '<td class="MenuBar7MenuSplitRight"><div></div></td>'];
                            const cmMenuBar7MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar7HorizontalSplit">|</td></tr></table></div>'];
                            const cmMenuBar7MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar7MainSplitText"><div></div></td>'];
                            document.addEventListener('DOMContentLoaded', function (event) {
                                cmDrawFromText('MenuBar7', 'hbr', cmMenuBar7, 'MenuBar7');
                            });
                        </script>
                    </nav>
                </div>
            @endif
            {{--@if (in_array('virgile', (array)$services))
                <div class="element">
                    <!--VIRGILE-->
                    <nav id="wb_MenuBar7">
                        <div id="MenuBar7">
                            <ul style="display:none;">
                                <li><span></span><span>VIRGILE</span>
                                    <ul>
                                        <li><span></span><a
                                                href="javascript:popupwnd('virgilometrie','no','no','no','yes','yes','no','','','1200','600')"
                                                target="_self">Virgilom&#233;trie</a>
                                        </li>
                                        <li><span></span><a
                                                href="javascript:popupwnd('virgilometrie-liste','no','no','no','yes','yes','no','','','1200','600')"
                                                target="_self">Etat&nbsp;virgilom&#233;trie</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <script>
                            const cmMenuBar7 =
                                {
                                    mainFolderLeft: '',
                                    mainFolderRight: '',
                                    mainItemLeft: '',
                                    mainItemRight: '',
                                    folderLeft: '',
                                    folderRight: '',
                                    itemLeft: '',
                                    itemRight: '',
                                    mainSpacing: 0,
                                    subSpacing: 0,
                                    delay: 100,
                                    offsetHMainAdjust: [0, 0],
                                    offsetSubAdjust: [0, 0]
                                };
                            const cmMenuBar7HSplit = [_cmNoClick, '<td class="MenuBar7MenuSplitLeft"><div></div></td>' +
                            '<td class="MenuBar7MenuSplitText"><div></div></td>' +
                            '<td class="MenuBar7MenuSplitRight"><div></div></td>'];
                            const cmMenuBar7MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar7HorizontalSplit">|</td></tr></table></div>'];
                            const cmMenuBar7MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar7MainSplitText"><div></div></td>'];
                            document.addEventListener('DOMContentLoaded', function (event) {
                                cmDrawFromText('MenuBar7', 'hbr', cmMenuBar7, 'MenuBar7');
                            });
                        </script>
                    </nav>
                </div>
            @endif--}}

            @if (in_array('comptabilité', (array)$services))
                <div class="element">
                    <!--COMPTABILITE-->
                    <nav id="wb_MenuBar8">
                        <div id="MenuBar8">
                            <ul style="display:none;">
                                <li><span></span><span>COMPTABILITE</span>
                                    <ul>
                                        <li><span></span><span>Etat</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('comptabilite-etat-client-periode','no','no','no','yes','yes','no','','','1300','700')"
                                                        target="_self">Tableau&nbsp;client/p&#233;riode</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('comptabilite-etat-facturation-client','no','no','no','yes','yes','no','','','1300','700')"
                                                        target="_self">Facturation&nbsp;client</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('comptabilite-etat-facturation-globale','no','no','no','yes','yes','no','','','1300','700')"
                                                        target="_self">Facturation&nbsp;globale</a>
                                                </li>
                                                <li><span></span><span>fond</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('comptabilite-etat-fond-par-client','no','no','no','yes','yes','no','','','1300','700')"
                                                                target="_self">Fond&nbsp;transport&#233;&nbsp;par&nbsp;client</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('comptabilite-etat-fond-facturation','no','no','no','yes','yes','no','','','1300','700')"
                                                                target="_self">Facturation&nbsp;tourn&#233;e&nbsp;par&nbsp;date</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Caisse</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('comptabilite-etat-solde-caisse','no','no','no','yes','yes','no','','','1300','700')"
                                                                target="_self">Solde&nbsp;de&nbsp;la&nbsp;caisse</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                {{--<li><span></span><span>Carburant</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('carb-chargement-ticket','no','no','no','yes','yes','no','','','1200','600')"
                                                                target="_self">Carte&nbsp;carb/Chargement/ticket</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('carb-chargement','no','no','no','yes','yes','no','','','1200','600')"
                                                                target="_self">Carte&nbsp;carb/Chargement</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('carb-ticket','no','no','no','yes','yes','no','','','1200','600')"
                                                                target="_self">Carte&nbsp;carb/ticket</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('carb-vehicule','no','no','no','yes','yes','no','','','1200','600')"
                                                                target="_self">Etat&nbsp;carburant/v&#233;hicule</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('etat-carburant','no','no','no','yes','yes','no','','','1200','600')"
                                                                target="_self">Etat&nbsp;carburant</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('etat-carburant','no','no','no','yes','yes','no','','','1200','600')"
                                                                target="_self">Etat&nbsp;carburant/v&#233;hicule</a>
                                                        </li>
                                                        <li><span></span><span>Etat&nbsp;g&#233;n&#233;ral</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('etat-carburant','no','no','no','yes','yes','no','','','1200','600')"
                                                                        target="_self">Carte&nbsp;carburant</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('etat-carburant','no','no','no','yes','yes','no','','','1200','600')"
                                                                        target="_self">V&#233;hicule</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>--}}
                                                <li><span></span><a
                                                        href="javascript:popupwnd('comptabilite-etat-securite-tournee','no','no','no','yes','yes','no','','','1300','700')"
                                                        target="_self">
                                                        Etat&nbsp;s&#233;cuit&#233;&nbsp;tourn&#233;e</a>
                                                    {{--<ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./comptabilite/etat/etat-securite-bordereau.html',{})"
                                                                target="_self">Date&nbsp;n&#176;&nbsp;bordereau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./comptabilite/etat/etat-securite-client.html',{})"
                                                                target="_self">Date&nbsp;/&nbsp;client</a>
                                                        </li>
                                                    </ul>--}}
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('comptabilite-etat-tracabilite','no','no','no','yes','yes','no','','','1300','700')"
                                                        target="_self">Tra&#231;abilit&#233;</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><span>Factures</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('comptabilite-fature','no','no','no','yes','yes','no','','','1300','700')"
                                                        target="_self">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('comptabilite-fature-liste','no','no','no','yes','yes','no','','','1300','700')"
                                                        target="_self">Liste</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('comptabilite-fature-liste','no','no','no','yes','yes','no','','','1300','700')"
                                                        target="_self">Recherche</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><span>R&#232;glement&nbsp;facture</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('comptabilite-reglement-fature','no','no','no','yes','yes','no','','','1300','700')"
                                                        target="_self">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('comptabilite-reglement-fature-liste','no','no','no','yes','yes','no','','','1300','700')"
                                                        target="_self">Liste</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><span>Caisse</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('comptabilite-entree-caisse','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('comptabilite-entree-caisse-liste','no','no','no','yes','yes','no','','','1200','500')"
                                                        target="_self">Liste</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('comptabilite-entree-caisse-liste-justifs','no','no','no','yes','yes','no','','','1200','500')"
                                                        target="_self">Liste des justifs</a>
                                                </li>
                                            </ul>
                                        </li>
                                        {{--<li><span></span><span>Sortie&nbsp;de&nbsp;caisse</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('comptabilite-sortie-caisse','no','no','no','yes','yes','no','','','1200','500')"
                                                        target="_self">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('comptabilite-sortie-caisse-liste','no','no','no','yes','yes','no','','','1200','500')"
                                                        target="_self">Liste</a>
                                                </li>
                                                --}}{{--<li><span></span><a href="javascript:displaylightbox('',{})" target="_self">Validation</a>
                                                </li>--}}{{--
                                            </ul>
                                        </li>--}}

                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <script>
                            const cmMenuBar8 =
                                {
                                    mainFolderLeft: '',
                                    mainFolderRight: '',
                                    mainItemLeft: '',
                                    mainItemRight: '',
                                    folderLeft: '',
                                    folderRight: '',
                                    itemLeft: '',
                                    itemRight: '',
                                    mainSpacing: 0,
                                    subSpacing: 0,
                                    delay: 100,
                                    offsetHMainAdjust: [0, 0],
                                    offsetSubAdjust: [0, 0]
                                };
                            const cmMenuBar8HSplit = [_cmNoClick, '<td class="MenuBar8MenuSplitLeft"><div></div></td>' +
                            '<td class="MenuBar8MenuSplitText"><div></div></td>' +
                            '<td class="MenuBar8MenuSplitRight"><div></div></td>'];
                            const cmMenuBar8MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar8HorizontalSplit">|</td></tr></table></div>'];
                            const cmMenuBar8MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar8MainSplitText"><div></div></td>'];
                            document.addEventListener('DOMContentLoaded', function (event) {
                                cmDrawFromText('MenuBar8', 'hbr', cmMenuBar8, 'MenuBar8');
                            });
                        </script>
                    </nav>
                </div>
            @endif

            @if (in_array('logistique', (array)$services))
                <div class="element">
                    <!--LOGISTIQUE-->
                    <nav id="wb_MenuBar12">
                        <div id="MenuBar12">
                            <ul style="display:none;">
                                <li><span></span><span>LOGISTIQUE</span>
                                    <ul>
                                        <li><span></span><span>Achat</span>
                                            <ul>
                                                <li><span></span><span>Fournisseur</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-fournisseur','no','no','no','no','no','no','','','1000','500')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-fournisseur-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Liste">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Produit</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-produit','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-produit-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Liste">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Entr&#233;e&nbsp;de&nbsp;stock</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-entree-stock','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-entree-stock-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Liste">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Sortie&nbsp;de&nbsp;stock</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-sortie-stock','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-sortie-stock-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Liste">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('logistique-etat-stock','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Etat de stock">Etat&nbsp;de&nbsp;stock</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><span>Fournitures</span>
                                            <ul>
                                                <li><span></span><span>Bordereau&nbsp;PCT</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-etat-bordereau-utilise',{})"
                                                                target="_self">Etat&nbsp;bordereau&nbsp;utilis&#233;</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-entree-bordereau','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Entr&#233;e&nbsp;bordereau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-entree-bordereau-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Liste&nbsp;des&nbsp;entr&#233;es&nbsp;de&nbsp;bordereau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-sortie-bordereau','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Sortie&nbsp;bordereau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-sortie-bordereau-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Liste&nbsp;des&nbsp;sorties&nbsp;de&nbsp;bordereau</a>
                                                        </li>
                                                        <li><span></span><span>Recherche</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('logistique-entree-securipack','no','no','no','yes','yes','no','','','1000','500')"
                                                                        target="_self">Bordereau&nbsp;entr&#233;e</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('','no','no','no','yes','yes','no','','','1000','500')"
                                                                        target="_self">Bordereau&nbsp;sortie</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('logistique-entree-securipack-recherche','no','no','no','yes','yes','no','','','1000','500')"
                                                                        target="_self">Solde</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>S&#233;curipack</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-entree-securipack','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Entr&#233;e&nbsp;s&#233;curipack</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-entree-securipack-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Liste&nbsp;des&nbsp;entrees&nbsp;s&#233;curipack</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-sortie-securipack','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Sortie&nbsp;s&#233;curipack</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-sortie-securipack-liste', 'no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Liste&nbsp;des&nbsp;sorties&nbsp;s&#233;curipack</a>
                                                        </li>
                                                        {{--TODO
                                                        <li><span></span><span>Recherche</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="./moyengenerau/fournitures/securipack/recherche-securipack-entree.html"
                                                                        target="_self">S&#233;curipack&nbsp;entr&#233;e</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/securipack/recherche-securipack-sortie.html',{})"
                                                                        target="_self">S&#233;curipack&nbsp;sortie</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/securipack/recherche-solde.html',{})"
                                                                        target="_self">Solde</a>
                                                                </li>
                                                            </ul>
                                                        </li>--}}
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Achat</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-entree-carnet','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Entr&#233;e&nbsp;carnet&nbsp;de&nbsp;caisse</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-entree-carnet-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Liste&nbsp;entr&#233;e&nbsp;carnet&nbsp;de&nbsp;caisse</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-sortie-carnet','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Sortie&nbsp;carnet&nbsp;de&nbsp;caisse</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-sortie-carnet-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Liste&nbsp;carnet&nbsp;de&nbsp;caisse</a>
                                                        </li>
                                                        {{-- TODO
                                                        <li><span></span><span>Recherche</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/carnet-caisse/recherche-entree-caisse.html',{})"
                                                                        target="_self">Carnet&nbsp;de&nbsp;caisse&nbsp;entr&#233;e</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/carnet-caisse/recherche-sortie-caisse.html',{})"
                                                                        target="_self">Carnet&nbsp;de&nbsp;caisse&nbsp;sortie</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="./moyengenerau/fournitures/carnet-caisse/recherche-solde.html"
                                                                        target="_self">Solde</a>
                                                                </li>
                                                            </ul>
                                                        </li>--}}
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Fiche&nbsp;de&nbsp;maintenance&nbsp;DAB</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-entree-maintenance','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Entr&#233;e&nbsp;fiche&nbsp;de&nbsp;maintenance&nbsp;DAB</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-entree-maintenance-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Liste&nbsp;entr&#233;e&nbsp;fiche&nbsp;de&nbsp;maintenance&nbsp;DAB</a>
                                                        </li>
                                                        <li></li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-sortie-maintenance','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Sortie&nbsp;fiche&nbsp;de&nbsp;maintenance&nbsp;DAB</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-sortie-maintenance-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Liste&nbsp;sortie&nbsp;fiche&nbsp;de&nbsp;maintenance&nbsp;DAB</a>
                                                        </li>
                                                        {{-- TODO
                                                        <li><span></span><span>Recherche</span>
                                                            <ul>
                                                                <li>
                                                                    <span></span><span>Entr&#233;e&nbsp;fiche&nbsp;maintenance</span>
                                                                </li>
                                                                <li>
                                                                    <span></span><span>Sortie&nbsp;fiche&nbsp;maintenance</span>
                                                                </li>
                                                                <li><span></span><span>Solde</span></li>
                                                            </ul>
                                                        </li>--}}
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Fiche&nbsp;d'approvisionnement&nbsp;DAB</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-entree-approvision','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Entr&#233;e&nbsp;fiche&nbsp;d'approvionnement&nbsp;DAB</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-entree-approvision-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Liste&nbsp;entr&#233;e&nbsp;fiche&nbsp;d'approvisionnement&nbsp;DAB</a>
                                                        </li>
                                                        <li></li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-sortie-approvision','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Sortie&nbsp;fiche&nbsp;d'approvisionnement&nbsp;DAB</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-sortie-approvision-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Liste&nbsp;sortie&nbsp;d'approvisionnement&nbsp;DAB</a>
                                                        </li>
                                                        {{-- TODO
                                                        <li><span></span><span>Recherche</span>
                                                            <ul>
                                                                <li><span></span><span>Entr&#233;e&nbsp;fiche&nbsp;approvisionnement</span>
                                                                </li>
                                                                <li>
                                                                    <span></span><span>Sortie&nbsp;fiche&nbsp;approvisionnement</span>
                                                                </li>
                                                                <li><span></span><span>Solde</span></li>
                                                            </ul>
                                                        </li>--}}
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Bon&nbsp;de&nbsp;commande</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-entree-bon-commande','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Entr&#233;e&nbsp;bon&nbsp;de&nbsp;commande</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-entree-bon-commande-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Liste&nbsp;entr&#233;e&nbsp;bon&nbsp;de&nbsp;commande</a>
                                                        </li>
                                                        <li></li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-sortie-bon-commande','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Sortie&nbsp;bon&nbsp;de&nbsp;commande</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-sortie-bon-commande-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Liste&nbsp;sortie&nbsp;bon&nbsp;de&nbsp;commande</a>
                                                        </li>
                                                        {{--
                                                        TODO
                                                        <li><span></span><span>Recherche</span>
                                                            <ul>
                                                                <li><span></span><span>Entr&#233;e&nbsp;fiche&nbsp;bon&nbsp;de&nbsp;commande</span>
                                                                </li>
                                                                <li><span></span><span>Sortie&nbsp;fiche&nbsp;bon&nbsp;de&nbsp;commande</span>
                                                                </li>
                                                                <li><span></span><span>Solde</span></li>
                                                            </ul>
                                                        </li>--}}
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Ticket&nbsp;visiteur</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-entree-ticket','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Entr&#233;e&nbsp;ticket&nbsp;visiteur</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-entree-ticket-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Liste&nbsp;entr&#233;e&nbsp;ticket&nbsp;visiteur</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-sortie-ticket','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Sortie&nbsp;ticket&nbsp;visiteur</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('logistique-sortie-ticket-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self">Liste&nbsp;ticket&nbsp;sortie&nbsp;visiteur</a>
                                                        </li>
                                                        {{-- TODO
                                                        <li><span></span><span>Recherche</span>
                                                            <ul>
                                                                <li>
                                                                    <span></span><span>Entr&#233;e&nbsp;ticket&nbsp;visiteur</span>
                                                                </li>
                                                                <li>
                                                                    <span></span><span>Sortie&nbsp;ticket&nbsp;visiteur</span>
                                                                </li>
                                                                <li><span></span><span>Solde</span></li>
                                                            </ul>
                                                        </li>--}}
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><span>Conteneur</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('conteneur','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Nouveau">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('conteneur-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Liste">Liste</a>
                                                </li>
                                                {{--<li><span></span><span>Recherche</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./tournee/conteneur/rechercher-etat.html',{})"
                                                                target="_self">Etat</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./tournee/conteneur/recherche-par-type.html',{})"
                                                                target="_self">Type</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./tournee/conteneur/etat.html',{})"
                                                                target="_self">D&#233;taill&#233;e</a>
                                                        </li>
                                                    </ul>
                                                </li>--}}
                                            </ul>
                                        </li>
                                        {{--<li><span></span><span>Carburant</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('carb-chargement-ticket','no','no','no','yes','yes','no','','','1200','600')"
                                                        target="_self">Carte&nbsp;carb/Chargement/ticket</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('carb-chargement','no','no','no','yes','yes','no','','','1200','600')"
                                                        target="_self">Carte&nbsp;carb/Chargement</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('carb-ticket','no','no','no','yes','yes','no','','','1200','600')"
                                                        target="_self">Carte&nbsp;carb/ticket</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('carb-vehicule','no','no','no','yes','yes','no','','','1200','600')"
                                                        target="_self">Etat&nbsp;carburant/v&#233;hicule</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('etat-carburant','no','no','no','yes','yes','no','','','1200','600')"
                                                        target="_self">Etat&nbsp;carburant</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('etat-carburant','no','no','no','yes','yes','no','','','1200','600')"
                                                        target="_self">Etat&nbsp;carburant/v&#233;hicule</a>
                                                </li>
                                                <li><span></span><span>Etat&nbsp;g&#233;n&#233;ral</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('etat-carburant','no','no','no','yes','yes','no','','','1200','600')"
                                                                target="_self">Carte&nbsp;carburant</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('etat-carburant','no','no','no','yes','yes','no','','','1200','600')"
                                                                target="_self">V&#233;hicule</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><span>Carburant&nbsp;tourn&#233;e</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('ticket-carburant','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self">Ticket&nbsp;carburant</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('ticket-carburant-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self">Liste&nbsp;ticket&nbsp;carburant</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('carburant-comptant','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self">carburant&nbsp;comptant</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('carburant-comptant-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self">Liste&nbsp;carburant&nbsp;comptant</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('carburant-prevision','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self">Pr&#233;vision&nbsp;carburant</a>
                                                </li>
                                            </ul>
                                        </li>--}}
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <script>
                            const cmMenuBar12 =
                                {
                                    mainFolderLeft: '',
                                    mainFolderRight: '',
                                    mainItemLeft: '',
                                    mainItemRight: '',
                                    folderLeft: '',
                                    folderRight: '',
                                    itemLeft: '',
                                    itemRight: '',
                                    mainSpacing: 0,
                                    subSpacing: 0,
                                    delay: 100,
                                    offsetHMainAdjust: [0, 0],
                                    offsetSubAdjust: [0, 0]
                                };
                            const cmMenuBar12HSplit = [_cmNoClick, '<td class="MenuBar12MenuSplitLeft"><div></div></td>' +
                            '<td class="MenuBar12MenuSplitText"><div></div></td>' +
                            '<td class="MenuBar12MenuSplitRight"><div></div></td>'];
                            const cmMenuBar12MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar12HorizontalSplit">|</td></tr></table></div>'];
                            const cmMenuBar12MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar12MainSplitText"><div></div></td>'];
                            document.addEventListener('DOMContentLoaded', function (event) {
                                cmDrawFromText('MenuBar12', 'hbr', cmMenuBar12, 'MenuBar12');
                            });
                        </script>
                    </nav>
                </div>
            @endif

            @if (in_array('rh', (array)$services))
                <div class="element">
                    <!--RH-->
                    <nav id="wb_MenuBar10">
                        <div id="MenuBar10">
                            <ul style="display:none;">
                                <li><span></span><span>RH</span>
                                    <ul>
                                        {{--<li><span></span><span>Convoyeur</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('convoyeur','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Nouveau">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('convoyeur-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Liste">Liste</a>
                                                </li>
                                            </ul>
                                        </li>--}}
                                        <li><span></span><span>Personnel</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('personnel','no','no','no','yes','yes','no','','','1000','1000')"
                                                        target="_self" title="Nouveau">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('personnel-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Liste">Liste</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <script>
                            const cmMenuBar10 =
                                {
                                    mainFolderLeft: '',
                                    mainFolderRight: '',
                                    mainItemLeft: '',
                                    mainItemRight: '',
                                    folderLeft: '',
                                    folderRight: '',
                                    itemLeft: '',
                                    itemRight: '',
                                    mainSpacing: 0,
                                    subSpacing: 0,
                                    delay: 100,
                                    offsetHMainAdjust: [0, 0],
                                    offsetSubAdjust: [0, 0]
                                };
                            const cmMenuBar10HSplit = [_cmNoClick, '<td class="MenuBar10MenuSplitLeft"><div></div></td>' +
                            '<td class="MenuBar10MenuSplitText"><div></div></td>' +
                            '<td class="MenuBar10MenuSplitRight"><div></div></td>'];
                            const cmMenuBar10MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar10HorizontalSplit">|</td></tr></table></div>'];
                            const cmMenuBar10MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar10MainSplitText"><div></div></td>'];
                            document.addEventListener('DOMContentLoaded', function (event) {
                                cmDrawFromText('MenuBar10', 'hbr', cmMenuBar10, 'MenuBar10');
                            });
                        </script>
                    </nav>
                </div>
            @endif

            @if (in_array('informatique', (array)$services))
                <div class="element">
                    <!--INFORMATIQUE-->
                    <nav id="wb_MenuBar11">
                        <div id="MenuBar11">
                            <ul style="display:none;">
                                <li><span></span><span>INFORMATIQUE</span>
                                    <ul>
                                        <li><span></span><span>Achat&nbsp;mat&#233;riel</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('informatique-achat-materiel','no','no','no','no','yes','no','','','1000','500')"
                                                        target="_self" title="Nouveau">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('informatique-achat-materiel-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Liste">Liste</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><span>Mission</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('informatique-mission','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Nouveau">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('informatique-mission-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self"
                                                        title="Liste">Liste</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><a
                                                href="javascript:popupwnd('informatique-maintenance','no','no','no','yes','yes','no','','','1000','500')"
                                                target="_self" title="Op&#233;ration de maintenance">Op&#233;ration&nbsp;de&nbsp;maintenance</a>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('informatique-maintenance','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Nouveau">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('informatique-maintenance-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Liste">Liste</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><span>Fournisseur</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('informatique-fournisseur','no','no','no','yes','yes','no','','','1000','800')"
                                                        target="_self" title="Nouveau">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('informatique-fournisseur-liste','no','no','no','yes','yes','no','','','1000','800')"
                                                        target="_self" title="Liste">Liste</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><span>Conteneur</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('conteneur','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Nouveau">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('conteneur-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Liste">Liste</a>
                                                </li>
                                                <li><span></span><span>Incident</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('comptabilite-degradation','no','no','no','yes','yes','no','','','1200','500')"
                                                                target="_self">D&#233;gradation</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('comptabilite-degradation-liste','no','no','no','yes','yes','no','','','1200','500')"
                                                                target="_self">Liste&nbsp;d&#233;gradation</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                {{--<li><span></span><span>Recherche</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./tournee/conteneur/rechercher-etat.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Etat">Etat</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./tournee/conteneur/recherche-par-type.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Type">Type</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./tournee/conteneur/etat.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self"
                                                                title="D&#233;taill&#233;">D&#233;taill&#233;</a>
                                                        </li>
                                                    </ul>
                                                </li>--}}
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <script>
                            const cmMenuBar11 =
                                {
                                    mainFolderLeft: '',
                                    mainFolderRight: '',
                                    mainItemLeft: '',
                                    mainItemRight: '',
                                    folderLeft: '',
                                    folderRight: '',
                                    itemLeft: '',
                                    itemRight: '',
                                    mainSpacing: 0,
                                    subSpacing: 0,
                                    delay: 100,
                                    offsetHMainAdjust: [0, 0],
                                    offsetSubAdjust: [0, 0]
                                };
                            const cmMenuBar11HSplit = [_cmNoClick, '<td class="MenuBar11MenuSplitLeft"><div></div></td>' +
                            '<td class="MenuBar11MenuSplitText"><div></div></td>' +
                            '<td class="MenuBar11MenuSplitRight"><div></div></td>'];
                            const cmMenuBar11MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar11HorizontalSplit">|</td></tr></table></div>'];
                            const cmMenuBar11MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar11MainSplitText"><div></div></td>'];
                            document.addEventListener('DOMContentLoaded', function (event) {
                                cmDrawFromText('MenuBar11', 'hbr', cmMenuBar11, 'MenuBar11');
                            });
                        </script>
                    </nav>
                </div>
            @endif

            @if (in_array('achat', (array)$services))
                <div class="element">
                    <!--ACHAT-->
                    <nav id="wb_MenuBar9">
                        <div id="MenuBar9">
                            <ul style="display:none;">
                                <li><span></span><span>ACHAT</span>
                                    <ul>
                                        <li><span></span><span>Fournisseur</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('achat-fournisseur','no','no','no','yes','yes','no','','','1100','600')"
                                                        target="_self" title="Nouveau">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('achat-fournisseur-liste','no','no','no','no','no','no','','','1000','400')"
                                                        target="_self" title="Liste">Liste</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><span>Demande achat</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('achat-demande','no','no','no','yes','yes','no','','','1100','600')"
                                                        target="_self" title="Nouveau">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('achat-demande-liste','no','no','no','no','no','no','','','1000','400')"
                                                        target="_self" title="Liste">Liste</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><span>Produit</span>
                                            <ul>
                                                <li><span></span><span>Entr&#233;e</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('achat-produit','no','no','no','yes','no','no','','','1000','800')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('achat-produit-liste','no','no','no','no','yes','no','','','1000','800')"
                                                                target="_self" title="Liste">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>D&#233;pense</span>
                                                    <ul>
                                                        <li><span></span><span>Nouveau</span></li>
                                                        <li><span></span><span>Liste</span></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span><span>Bon de commande</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('achat-bon','no','no','no','yes','no','no','','','1000','800')"
                                                        target="_self" title="Nouveau">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('achat-bon-liste','no','no','no','no','yes','no','','','1000','800')"
                                                        target="_self" title="Liste">Liste</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span></span>
                                            <span><a
                                                    href="javascript:popupwnd('achat-suivi','no','no','no','yes','no','no','','','1000','800')"
                                                    target="_self"
                                                    title="Suivi des commandes">Etat suivi des commandes</a></span>
                                        </li>
                                        <li><span></span><span>Rechercher</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('achat-recherche-par-service','no','no','no','yes','yes','no','','','800','500')"
                                                        target="_self" title="Par service">Par&nbsp;service</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('achat-recherche-par-centre','no','no','no','yes','yes','no','','','800','500')"
                                                        target="_self" title="Par centre">Par&nbsp;centre</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('achat-recherche-par-budget','no','no','no','yes','yes','no','','','800','500')"
                                                        target="_self" title="Par budget">Par&nbsp;budget</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('achat-recherche-par-produit','no','no','no','yes','yes','no','','','800','500')"
                                                        target="_self" title="Par produit">Par&nbsp;produit</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <script>
                            const cmMenuBar9 =
                                {
                                    mainFolderLeft: '',
                                    mainFolderRight: '',
                                    mainItemLeft: '',
                                    mainItemRight: '',
                                    folderLeft: '',
                                    folderRight: '',
                                    itemLeft: '',
                                    itemRight: '',
                                    mainSpacing: 0,
                                    subSpacing: 0,
                                    delay: 100,
                                    offsetHMainAdjust: [0, 0],
                                    offsetSubAdjust: [0, 0]
                                };
                            const cmMenuBar9HSplit = [_cmNoClick, '<td class="MenuBar9MenuSplitLeft"><div></div></td>' +
                            '<td class="MenuBar9MenuSplitText"><div></div></td>' +
                            '<td class="MenuBar9MenuSplitRight"><div></div></td>'];
                            const cmMenuBar9MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar9HorizontalSplit">|</td></tr></table></div>'];
                            const cmMenuBar9MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar9MainSplitText"><div></div></td>'];
                            document.addEventListener('DOMContentLoaded', function (event) {
                                cmDrawFromText('MenuBar9', 'hbr', cmMenuBar9, 'MenuBar9');
                            });
                        </script>
                    </nav>
                </div>
            @endif

            @if (session('user'))
                <div class="element">
                    <!--SSB-->
                    <nav id="wb_MenuBar13">
                        <div id="MenuBar13">
                            <ul style="display:none;">
                                <li><span></span><span><a
                                            href="javascript:popupwnd('parametres','no','no','no','yes','yes','no','','','1000','500')"
                                            target="_self" title="Paramètre">PARAMETRES</a></span>
                                </li>
                            </ul>
                        </div>
                        <script>
                            const cmMenuBar13 =
                                {
                                    mainFolderLeft: '',
                                    mainFolderRight: '',
                                    mainItemLeft: '',
                                    mainItemRight: '',
                                    folderLeft: '',
                                    folderRight: '',
                                    itemLeft: '',
                                    itemRight: '',
                                    mainSpacing: 0,
                                    subSpacing: 0,
                                    delay: 100,
                                    offsetHMainAdjust: [0, 0],
                                    offsetSubAdjust: [0, 0]
                                };
                            const cmMenuBar13HSplit = [_cmNoClick, '<td class="MenuBar13MenuSplitLeft"><div></div></td>' +
                            '<td class="MenuBar13MenuSplitText"><div></div></td>' +
                            '<td class="MenuBar13MenuSplitRight"><div></div></td>'];
                            const cmMenuBar13MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar13HorizontalSplit">|</td></tr></table></div>'];
                            const cmMenuBar13MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar13MainSplitText"><div></div></td>'];
                            document.addEventListener('DOMContentLoaded', function (event) {
                                cmDrawFromText('MenuBar13', 'hbr', cmMenuBar13, 'MenuBar13');
                            });
                        </script>
                    </nav>
                </div>
            @endif
            {{--@if (in_array('ssb', (array)$services))
                <div class="element">
                    <!--SSB-->
                    <nav id="wb_MenuBar13">
                        <div id="MenuBar13">
                            <ul style="display:none;">
                                <li><span></span><span>SSB</span>
                                    <ul>
                                        <li><span></span><a
                                                href="javascript:popupwnd('ssb','no','no','no','yes','yes','no','','','1000','500')"
                                                target="_self" title="Nouveau">Nouveau</a>
                                        </li>
                                        <li><span></span><a
                                                href="javascript:popupwnd('ssb-liste','no','no','no','yes','yes','no','','','1000','500')"
                                                target="_self" title="Liste">Liste</a>
                                        </li>
                                        <li><span></span><span>Commercial</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('ssb-commercial','no','no','no','yes','yes','no','','','1200','800')"
                                                        target="_self" title="Nouveau">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('ssb-commercial-liste','no','no','no','yes','yes','no','','','1200','900')"
                                                        target="_self" title="Liste">Liste</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <script>
                            const cmMenuBar13 =
                                {
                                    mainFolderLeft: '',
                                    mainFolderRight: '',
                                    mainItemLeft: '',
                                    mainItemRight: '',
                                    folderLeft: '',
                                    folderRight: '',
                                    itemLeft: '',
                                    itemRight: '',
                                    mainSpacing: 0,
                                    subSpacing: 0,
                                    delay: 100,
                                    offsetHMainAdjust: [0, 0],
                                    offsetSubAdjust: [0, 0]
                                };
                            const cmMenuBar13HSplit = [_cmNoClick, '<td class="MenuBar13MenuSplitLeft"><div></div></td>' +
                            '<td class="MenuBar13MenuSplitText"><div></div></td>' +
                            '<td class="MenuBar13MenuSplitRight"><div></div></td>'];
                            const cmMenuBar13MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar13HorizontalSplit">|</td></tr></table></div>'];
                            const cmMenuBar13MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar13MainSplitText"><div></div></td>'];
                            document.addEventListener('DOMContentLoaded', function (event) {
                                cmDrawFromText('MenuBar13', 'hbr', cmMenuBar13, 'MenuBar13');
                            });
                        </script>
                    </nav>
                </div>
            @endif--}}

            @if (count((array)$services) == 0)
                <div class="row">

                    <div class="element">
                        COMMERCIAL
                    </div>
                    <div class="element">
                        SECURITE
                    </div>

                    <div class="element">
                        CAISSE CENTRALE
                    </div>

                    <div class="element">
                        TRANSPORT
                    </div>

                    <div class="element">
                        REGULATION
                    </div>

                    <div class="element">
                        VIRGILE
                    </div>

                    <div class="element">
                        COMPTABILITE
                    </div>
                    <div class="element">
                        LOGISTIQUE
                    </div>

                    <div class="element">
                        RH
                    </div>

                    <div class="element">
                        INFORMATIQUE
                    </div>

                    <div class="element">
                        ACHAT
                    </div>

                    <div class="element">
                        SSB
                    </div>

                </div>
            @endif
        </div>
    </div>
</body>
</html>
