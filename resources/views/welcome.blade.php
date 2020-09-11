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
            <a>DECONNEXION</a>
        </div>
    </div>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="row">

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
                                                                href="javascript:popupwnd('./commercial/liste-client.php','no','no','no','yes','yes','no','','','1000','400')"
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
                                                                href="javascript:popupwnd('./commercial/liste-site.php','no','no','no','yes','yes','no','','','1000','600')"
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

                        <div class="element">
                            <!--SECURITE-->
                            <nav id="wb_MenuBar3">
                                <div id="MenuBar3">
                                    <ul style="display:none;">
                                        <li><span></span><span>SECURITE</span>
                                            <ul>
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
                                                                href="javascript:popupwnd('./securite/maincourante.html','no','no','no','yes','yes','no','','','1000','600')"
                                                                target="_self" title="Main courante">Main&nbsp;courante</a>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./securite/maincourante.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                        target="_self" title="Nouveau">Nouveau</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./securite/liste-maincourante.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                        target="_self" title="Liste">Liste</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./securite/nouveau-materiel.html','no','no','no','yes','yes','no','','','1100','500')"
                                                                target="_self" title="Mat&#233;riel">Mat&#233;riel</a>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./securite/nouveau-materiel.html','no','no','no','yes','yes','no','','','1100','600')"
                                                                        target="_self" title="Nouveau">Nouveau</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./securite/liste-materiel.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                        target="_self" title="Liste">Liste</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Saisie</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./heuresupp/heuresuppnouveau.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./heuresupp/heuresuppliste.html','no','no','no','yes','yes','no','','','1000','500')"
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
                                                                href="javascript:popupwnd('./caissecentrale/service-nouveau.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./caissecentrale/service-liste.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Liste">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Colis</span>
                                                    <ul>
                                                        <li><span></span><span>Entr&#233;e&nbsp;de&nbsp;colis</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./caissecentrale/colis/entree-colis.html','no','no','no','yes','yes','no','','','1700','500')"
                                                                        target="_self" title="Nouveau">Nouveau</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./caissecentrale/colis/liste-entree-colis.html',{})"
                                                                        target="_self" title="Liste">Liste</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><span>Sortie&nbsp;de&nbsp;colis</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./caissecentrale/colis/sortie-colis.html','no','no','no','yes','no','no','','','1000','500')"
                                                                        target="_self" title="Nouveau">Nouveau</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./caissecentrale/colis/liste-sortie-colis.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                        target="_self" title="Liste">Liste</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>CTV</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./caissecentrale/Nouveau.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./caissecentrale/ctv-liste.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Liste">Liste</a>
                                                        </li>
                                                        <li><span></span><span>Vid&#233;o&nbsp;surveillance</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./caissecentrale/video-surveillance-nouveau.html','no','no','no','yes','yes','no','','','1200','600')"
                                                                        target="_self" title="Nouveau">Nouveau</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./caissecentrale/video-surveillance-liste.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                        target="_self" title="Liste">Liste</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><span>Caisse</span>
                                                            <ul>
                                                                <li><span></span><span>Recherche</span>
                                                                    <ul>
                                                                        <li><span></span><span>GDF</span>
                                                                            <ul>
                                                                                <li><span></span><a
                                                                                        href="javascript:displaylightbox('./caissecentrale/colis/recherche/solde.html',{})"
                                                                                        target="_self" title="Solde GDF">Solde&nbsp;GDF</a>
                                                                                </li>
                                                                                <li><span></span><a
                                                                                        href="javascript:displaylightbox('./caissecentrale/colis/recherche/fonds-sortis.html',{})"
                                                                                        target="_self">Fonds&nbsp;sortis</a>
                                                                                </li>
                                                                                <li><span></span><a
                                                                                        href="javascript:displaylightbox('./caissecentrale/colis/recherche/fonds-entree.html',{})"
                                                                                        target="_self"
                                                                                        title="Fonds entr&#233;es">Fonds&nbsp;entr&#233;es</a>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                        <li><span></span><a
                                                                                href="javascript:displaylightbox('./caissecentrale/colis/recherche/date-proprio-operatrice.html',{})"
                                                                                target="_self"
                                                                                title="Date/Site/Op&#233;ratrice">Date/Site/Op&#233;ratrice</a>
                                                                        </li>
                                                                        <li><span></span><a
                                                                                href="javascript:displaylightbox('./caissecentrale/colis/recherche/operatrice.html',{})"
                                                                                target="_self" title="Par op&#233;ratrice">Par&nbsp;op&#233;ratrice</a>
                                                                        </li>
                                                                        <li><span></span><a
                                                                                href="javascript:displaylightbox('./caissecentrale/colis/recherche/proprio-de-site.html',{})"
                                                                                target="_self"
                                                                                title="Par site">Par&nbsp;site</a>
                                                                        </li>
                                                                        <li><span></span><a
                                                                                href="javascript:displaylightbox('./caissecentrale/colis/recherche/parclientdate.html',{})"
                                                                                target="_self">Par&nbsp;client/date</a>
                                                                        </li>
                                                                        <li><span></span><a
                                                                                href="javascript:displaylightbox('./caissecentrale/colis/recherche/parclient.html',{})"
                                                                                target="_self">Par&nbsp;client</a>
                                                                        </li>
                                                                        <li><span></span><a
                                                                                href="javascript:displaylightbox('./caissecentrale/colis/recherche/pardate.html',{})"
                                                                                target="_self">Par&nbsp;date</a>
                                                                        </li>
                                                                    </ul>
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
                                    var cmMenuBar4 =
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
                                    var cmMenuBar4HSplit = [_cmNoClick, '<td class="MenuBar4MenuSplitLeft"><div></div></td>' +
                                    '<td class="MenuBar4MenuSplitText"><div></div></td>' +
                                    '<td class="MenuBar4MenuSplitRight"><div></div></td>'];
                                    var cmMenuBar4MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar4HorizontalSplit">|</td></tr></table></div>'];
                                    var cmMenuBar4MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar4MainSplitText"><div></div></td>'];
                                    document.addEventListener('DOMContentLoaded', function (event) {
                                        cmDrawFromText('MenuBar4', 'hbr', cmMenuBar4, 'MenuBar4');
                                    });
                                </script>
                            </nav>
                        </div>

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
                                                <li><span></span><a
                                                        href="javascript:popupwnd('depart-tournee','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="D&#233;part tourn&#233;e">D&#233;part&nbsp;tourn&#233;e</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('arrivee-tournee','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Arriv&#233;e tourn&#233;e">Arriv&#233;e&nbsp;tourn&#233;e</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('entretien-vehicule','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self"
                                                        title="Entretien v&#233;hicule">Entretien&nbsp;v&#233;hicule</a>
                                                </li>
                                                <li><span></span><span>Etat&nbsp;tourn&#233;e</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./tournee/etattournee/tournee-periode.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Tourn&#233;e sur p&#233;riode">Tourn&#233;e&nbsp;sur&nbsp;p&#233;riode</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./tournee/etattournee/sur-periode.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self"
                                                                title="Sur p&#233;riode">Sur&nbsp;p&#233;riode</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./tournee/etattournee/rentabilite-tournee.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Rentabilit&#233; de tourn&#233;e">Rentabilit&#233;&nbsp;de&nbsp;tourn&#233;e</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./tournee/etattournee/par-site.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Par site">Par&nbsp;site</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./tournee/etattournee/par-client.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Par client">Par&nbsp;client</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./tournee/etattournee/par-vehicule.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self"
                                                                title="Par v&#233;hicule">Par&nbsp;v&#233;hicule</a>
                                                        </li>
                                                        <li><span></span><span>V&#233;hicule/Site</span></li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./tournee/etattournee/par-convoyeur.html',{})"
                                                                target="_self">Par&nbsp;convoyeur</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./tournee/etattournee/fond-transport-periode.html',{})"
                                                                target="_self">Fond&nbsp;transport&#233;/p&#233;riode</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Carburant&nbsp;tourn&#233;e</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./tournee/carburanttournee/ticket-carburant.html',{})"
                                                                target="_self">Ticket&nbsp;carburant</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./tournee/carburanttournee/liste-ticket-carburant.html',{})"
                                                                target="_self">Liste&nbsp;ticket&nbsp;carburant</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./tournee/carburanttournee/carburant-comptant.html',{})"
                                                                target="_self">carburant&nbsp;comptant</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./tournee/carburanttournee/liste-ticket-comptant.html',{})"
                                                                target="_self">Liste&nbsp;carburant&nbsp;comptant</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./tournee/carburanttournee/prevision.html',{})"
                                                                target="_self">Pr&#233;vision&nbsp;carburant</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Conteneur</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./tournee/conteneur/conteneur-nouveau.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./tournee/conteneur/conteneur-liste.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Liste">Liste</a>
                                                        </li>
                                                        <li><span></span><span>Recherche</span>
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
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Bordereau</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./tournee/etat-bordereau.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Etat bordereau">Etat&nbsp;bordereau</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Etat</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./heuresupp/heuresupprecap.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Heure supp r&#233;cap">Heure&nbsp;supp&nbsp;r&#233;cap</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./heuresupp/heuresuppdetaillee.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Heure supp d&#233;taill&#233;e">Heure&nbsp;supp&nbsp;d&#233;taill&#233;e</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <script>
                                    var cmMenuBar5 =
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
                                    var cmMenuBar5HSplit = [_cmNoClick, '<td class="MenuBar5MenuSplitLeft"><div></div></td>' +
                                    '<td class="MenuBar5MenuSplitText"><div></div></td>' +
                                    '<td class="MenuBar5MenuSplitRight"><div></div></td>'];
                                    var cmMenuBar5MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar5HorizontalSplit">|</td></tr></table></div>'];
                                    var cmMenuBar5MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar5MainSplitText"><div></div></td>'];
                                    document.addEventListener('DOMContentLoaded', function (event) {
                                        cmDrawFromText('MenuBar5', 'hbr', cmMenuBar5, 'MenuBar5');
                                    });
                                </script>
                            </nav>
                        </div>

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
                                                                href="javascript:popupwnd('./regulation/service/Nouveau.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a href="./regulation/service/Liste.html" target="_self"
                                                                            title="Liste">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Stock</span>
                                                    <ul>
                                                        <li><span></span><span>Bordereau</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./regulation/nouveau-bordereau.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                        target="_self" title="Nouveau">Nouveau</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./regulation/liste-bordereau.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                        target="_self" title="Liste">Liste</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><span>Securipack</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./regulation/securipack-nouveau.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                        target="_self" title="Nouveau">Nouveau</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('','no','no','no','yes','yes','no','','','1000','500')"
                                                                        target="_self" title="Liste">Liste</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><span>Scell&#233;</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./regulation/nouveau-scelle.html','no','no','no','yes','yes','no','','','1300','700')"
                                                                        target="_self" title="Nouveau">Nouveau</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./regulation/liste-scelle.html','no','no','no','yes','yes','no','','','1200','600')"
                                                                        target="_self" title="Liste">Liste</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Colis</span>
                                                    <ul>
                                                        <li><span></span><span>Entr&#233;e&nbsp;de&nbsp;colis</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./regulation/entree-colis.html',{})"
                                                                        target="_self" title="Nouveau">Nouveau</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./regulation/liste-entree-colis.html',{})"
                                                                        target="_self" title="Liste">Liste</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><span>Sortie&nbsp;de&nbsp;colis</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./regulation/sortie-fond.html',{})"
                                                                        target="_self" title="Nouveau">Nouveau</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./regulation/liste-sortie-fonds.html',{})"
                                                                        target="_self" title="Liste">Liste</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Confirmation&nbsp;reception&nbsp;client</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./regulation/confirmation-fonds-client.html',{})"
                                                                target="_self">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./regulation/liste-confirmation-fond-client.html',{})"
                                                                target="_self">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><a href="./regulation/facturation.html" target="_self"
                                                                    title="Facturation">Facturation</a>
                                                </li>
                                                <li><span></span><span>Etat</span>
                                                    <ul>
                                                        <li><span></span><span>Securipack</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./regulation/etat-securipack-utilisé.html',{})"
                                                                        target="_self">Securipack&nbsp;utilis&#233;</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./regulation/etat-securipack-vendu.html',{})"
                                                                        target="_self">Securipack&nbsp;vendu</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><span>Scell&#233;</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./regulation/etat-scelle-vendu.html',{})"
                                                                        target="_self">Scell&#233;&nbsp;vendu</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./regulation/etat-securipack-utilisé.html',{})"
                                                                        target="_self">Scell&#233;&nbsp;utilis&#233;</a>
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
                                    var cmMenuBar6 =
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
                                    var cmMenuBar6HSplit = [_cmNoClick, '<td class="MenuBar6MenuSplitLeft"><div></div></td>' +
                                    '<td class="MenuBar6MenuSplitText"><div></div></td>' +
                                    '<td class="MenuBar6MenuSplitRight"><div></div></td>'];
                                    var cmMenuBar6MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar6HorizontalSplit">|</td></tr></table></div>'];
                                    var cmMenuBar6MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar6MainSplitText"><div></div></td>'];
                                    document.addEventListener('DOMContentLoaded', function (event) {
                                        cmDrawFromText('MenuBar6', 'hbr', cmMenuBar6, 'MenuBar6');
                                    });
                                </script>
                            </nav>
                        </div>

                        <div class="element">
                            <!--VIRGILE-->
                            <nav id="wb_MenuBar7">
                                <div id="MenuBar7">
                                    <ul style="display:none;">
                                        <li><span></span><span>VIRGILE</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:displaylightbox('./virgile/virgilometrie.html',{})"
                                                        target="_self">Virgilom&#233;trie</a>
                                                </li>
                                                <li><span></span><span>Etat&nbsp;virgilom&#233;trie</span></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <script>
                                    var cmMenuBar7 =
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
                                    var cmMenuBar7HSplit = [_cmNoClick, '<td class="MenuBar7MenuSplitLeft"><div></div></td>' +
                                    '<td class="MenuBar7MenuSplitText"><div></div></td>' +
                                    '<td class="MenuBar7MenuSplitRight"><div></div></td>'];
                                    var cmMenuBar7MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar7HorizontalSplit">|</td></tr></table></div>'];
                                    var cmMenuBar7MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar7MainSplitText"><div></div></td>'];
                                    document.addEventListener('DOMContentLoaded', function (event) {
                                        cmDrawFromText('MenuBar7', 'hbr', cmMenuBar7, 'MenuBar7');
                                    });
                                </script>
                            </nav>
                        </div>

                        <div class="element">
                            <!--COMPTABILITE-->
                            <nav id="wb_MenuBar8">
                                <div id="MenuBar8">
                                    <ul style="display:none;">
                                        <li><span></span><span>COMPTABILITE</span>
                                            <ul>
                                                <li><span></span><span>Param&#232;trage</span>
                                                    <ul>
                                                        <li><span></span><span>Tarification</span></li>
                                                        <li><span></span><span>Carte&nbsp;carburant</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./comptabilite/parametrage/creation-carte-carburant.html',{})"
                                                                        target="_self">Creation&nbsp;carte</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./comptabilite/parametrage/liste-carte-carburant.html',{})"
                                                                        target="_self">Liste&nbsp;des&nbsp;cartes</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><a
                                                                href="./comptabilite/parametrage/liste-carte-carburant.html"
                                                                target="_self">Carburant</a>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./comptabilite/parametrage/creation-chargement-carte.html',{})"
                                                                        target="_self">Chargement&nbsp;carte</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./comptabilite/parametrage/liste-chargement-carte.html',{})"
                                                                        target="_self">Liste&nbsp;chargement</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Etat</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./comptabilite/etat/tableau-client-periode.html',{})"
                                                                target="_self">Tableau&nbsp;client/p&#233;riode</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./comptabilite/etat/facturation-client.html',{})"
                                                                target="_self">Facturation&nbsp;client</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./comptabilite/etat/facturation-globale.html',{})"
                                                                target="_self">Facturation&nbsp;globale</a>
                                                        </li>
                                                        <li><span></span><span>fond</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./comptabilite/etat/fond-transporte-par-client.html',{})"
                                                                        target="_self">Fond&nbsp;transport&#233;&nbsp;par&nbsp;client</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./comptabilite/etat/facturation-tournee-par-date.html',{})"
                                                                        target="_self">Facturation&nbsp;tourn&#233;e&nbsp;par&nbsp;date</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><span>Caisse</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./comptabilite/etat/solde-de-caisse.html',{})"
                                                                        target="_self">Solde&nbsp;de&nbsp;la&nbsp;caisse</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><span>Carburant</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./comptabilite/etat/carb-chargement-ticket.html',{})"
                                                                        target="_self">Carte&nbsp;carb/chargement/ticket</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./comptabilite/etat/carb-chargement.html',{})"
                                                                        target="_self">carte&nbsp;carb/chargement</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./comptabilite/etat/carb-ticket.html',{})"
                                                                        target="_self">Carte&nbsp;cab/ticket</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./comptabilite/etat/etat-carburant-periode.html',{})"
                                                                        target="_self">Etat&nbsp;carburant&nbsp;p&#233;riode</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./comptabilite/etat/etat-carburant-vehicule.html',{})"
                                                                        target="_self">Etat&nbsp;carburant/v&#233;hicule</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./comptabilite/etat/etat-chargement.html',{})"
                                                                        target="_self">Etat&nbsp;chargement</a>
                                                                </li>
                                                                <li><span></span><span>Etat&nbsp;g&#233;n&#233;ral</span>
                                                                    <ul>
                                                                        <li><span></span><a
                                                                                href="javascript:displaylightbox('./comptabilite/etat/carte-carburant.html',{})"
                                                                                target="_self">Carte&nbsp;carburant</a>
                                                                        </li>
                                                                        <li><span></span><a
                                                                                href="javascript:displaylightbox('./comptabilite/etat/global-detaille-par-centre.html',{})"
                                                                                target="_self">Global&nbsp;d&#233;taill&#233;&nbsp;par&nbsp;centre</a>
                                                                        </li>
                                                                        <li><span></span><a
                                                                                href="javascript:displaylightbox('./comptabilite/etat/carte-carburant-periode.html',{})"
                                                                                target="_self">Carte&nbsp;carburant&nbsp;p&#233;riode</a>
                                                                        </li>
                                                                        <li><span></span><a
                                                                                href="javascript:displaylightbox('./comptabilite/etat/vehicule.html',{})"
                                                                                target="_self">V&#233;hicule</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><span>Etat&nbsp;s&#233;cuit&#233;&nbsp;tourn&#233;e</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./comptabilite/etat/etat-securite-bordereau.html',{})"
                                                                        target="_self">Date&nbsp;n&#176;&nbsp;bordereau</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./comptabilite/etat/etat-securite-client.html',{})"
                                                                        target="_self">Date&nbsp;/&nbsp;client</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./comptabilite/etat/tracabilite.html',{})"
                                                                target="_self">Tra&#231;abilit&#233;</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Factures</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./comptabilite/facture/fiche-facture.html',{})"
                                                                target="_self">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./comptabilite/facture/liste-facture.html',{})"
                                                                target="_self">Liste</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./comptabilite/facture/recherche.html',{})"
                                                                target="_self">Recherche</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>R&#232;glement&nbsp;facture</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./comptabilite/reglementfacture/nouveau.html',{})"
                                                                target="_self">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./comptabilite/reglementfacture/liste.html',{})"
                                                                target="_self">Liste</a>
                                                        </li>
                                                        <li><span></span><span>Recherche</span>
                                                            <ul>
                                                                <li><span></span><a href="javascript:displaylightbox('',{})"
                                                                                    target="_self">Par&nbsp;date</a>
                                                                </li>
                                                                <li><span></span><a href="javascript:displaylightbox('',{})"
                                                                                    target="_self">Par&nbsp;client</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Entr&#233;e&nbsp;de&nbsp;caisse</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./comptabilite/entreecaisse/entree-caisse-nouveau.html',{})"
                                                                target="_self">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a href="javascript:displaylightbox('',{})" target="_self">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Sortie&nbsp;de&nbsp;caisse</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./comptabilite/sortiecaisse/sortiecaisse.html',{})"
                                                                target="_self">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./comptabilite/sortiecaisse/liste-sortie.html',{})"
                                                                target="_self">Liste</a>
                                                        </li>
                                                        <li><span></span><a href="javascript:displaylightbox('',{})" target="_self">Validation</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Incident</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./comptabilite/degradation/degradation-nouveau.html',{})"
                                                                target="_self">D&#233;gradation</a>
                                                        </li>
                                                        <li><span></span><a href="javascript:displaylightbox('',{})" target="_self">Liste&nbsp;d&#233;gradation</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <script>
                                    var cmMenuBar8 =
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
                                    var cmMenuBar8HSplit = [_cmNoClick, '<td class="MenuBar8MenuSplitLeft"><div></div></td>' +
                                    '<td class="MenuBar8MenuSplitText"><div></div></td>' +
                                    '<td class="MenuBar8MenuSplitRight"><div></div></td>'];
                                    var cmMenuBar8MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar8HorizontalSplit">|</td></tr></table></div>'];
                                    var cmMenuBar8MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar8MainSplitText"><div></div></td>'];
                                    document.addEventListener('DOMContentLoaded', function (event) {
                                        cmDrawFromText('MenuBar8', 'hbr', cmMenuBar8, 'MenuBar8');
                                    });
                                </script>
                            </nav>
                        </div>

                        <div class="element">
                            <!--LOGISTIQUE-->
                            <nav id="wb_MenuBar12">
                                <div id="MenuBar12">
                                    <ul style="display:none;">
                                        <li><span></span><span>LOGISTIQUE</span>
                                            <ul>
                                                <li><span></span><span>V&#233;hicules</span>
                                                    <ul>
                                                        <li><span></span><span>Parc&nbsp;auto</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./logistique/parc-auto-nouveau.html','no','no','no','yes','yes','no','','','1000','50')"
                                                                        target="_self" title="Nouveau">Nouveau</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./logistique/parc-auto-liste.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                        target="_self" title="Liste">Liste</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><span>Etat&nbsp;d'entretien</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./logistique/entretienvehicule/index.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                        target="_self" title="Entretien/v&#233;hicule">Entretien/v&#233;hicule</a>
                                                                </li>
                                                                <li><span></span><span>Rechercher</span>
                                                                    <ul>
                                                                        <li><span></span><a
                                                                                href="javascript:popupwnd('./logistique/entretien-rechercher.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                                target="_self"
                                                                                title="Par date">Par&nbsp;date</a>
                                                                        </li>
                                                                        <li><span></span><a
                                                                                href="javascript:popupwnd('./logistique/entretien-rechercher.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                                target="_self"
                                                                                title="Par vidange">Par&nbsp;vidange</a>
                                                                        </li>
                                                                        <li><span></span><a
                                                                                href="javascript:popupwnd('./logistique/entretien-rechercher.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                                target="_self" title="Par courroie">Par&nbsp;courroie</a>
                                                                        </li>
                                                                        <li><span></span><a
                                                                                href="javascript:popupwnd('./logistique/entretien-rechercher.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                                target="_self" title="Par v&#233;hicule">Par&nbsp;v&#233;hicule</a>
                                                                        </li>
                                                                        <li><span></span><a
                                                                                href="javascript:popupwnd('','no','no','no','yes','yes','no','','','1000','500')"
                                                                                target="_self" title="Par visite technique">Par&nbsp;visite&nbsp;technique</a>
                                                                        </li>
                                                                        <li><span></span><a
                                                                                href="javascript:popupwnd('./logistique/entretien-rechercher.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                                target="_self"
                                                                                title="Par patente">Par&nbsp;patente</a>
                                                                        </li>
                                                                        <li><span></span><a
                                                                                href="javascript:popupwnd('./logistique/entretien-rechercher.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                                target="_self" title="Par vignette">Par&nbsp;vignette</a>
                                                                        </li>
                                                                        <li><span></span><a
                                                                                href="javascript:popupwnd('./logistique/entretien-rechercher.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                                target="_self" title="Par huile de pont">Par&nbsp;huile&nbsp;de&nbsp;pont</a>
                                                                        </li>
                                                                        <li><span></span><a
                                                                                href="javascript:popupwnd('./logistique/entretien-rechercher.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                                target="_self" title="Par carte de transport">Par&nbsp;carte&nbsp;de&nbsp;transport</a>
                                                                        </li>
                                                                        <li><span></span><a
                                                                                href="javascript:popupwnd('./logistique/entretien-rechercher.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                                target="_self"
                                                                                title="Par carte de stationnement">Par&nbsp;carte&nbsp;de&nbsp;stationnement</a>
                                                                        </li>
                                                                        <li><span></span><a
                                                                                href="javascript:popupwnd('./logistique/entretien-rechercher.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                                target="_self" title="Par assurance">Par&nbsp;assurance</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Achat</span>
                                                    <ul>
                                                        <li><span></span><span>Fournisseur</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./moyengenerau/achat/fournisseur-nouveau.html','no','no','no','no','no','no','','','1000','500')"
                                                                        target="_self" title="Nouveau">Nouveau</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./moyengenerau/achat/fournisseur-liste.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                        target="_self" title="Liste">Liste</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><span>Produit</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./moyengenerau/achat/produit-nouveau.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                        target="_self" title="Nouveau">Nouveau</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./moyengenerau/achat/produit-liste.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                        target="_self" title="Liste">Liste</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><span>Entr&#233;e&nbsp;de&nbsp;stock</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./moyengenerau/achat/entree-stock-nouveau.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                        target="_self" title="Nouveau">Nouveau</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./moyengenerau/achat/entree-stock-liste.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                        target="_self" title="Liste">Liste</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><span>Sortie&nbsp;de&nbsp;stock</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./moyengenerau/achat/sortie-nouveau.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                        target="_self" title="Nouveau">Nouveau</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./moyengenerau/achat/sortie-stock-liste.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                        target="_self" title="Liste">Liste</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./moyengenerau/achat/etat-stock.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Etat de stock">Etat&nbsp;de&nbsp;stock</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Fournitures</span>
                                                    <ul>
                                                        <li><span></span><span>Bordereau&nbsp;PCT</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/bordereaux/etat-borderau-utilise.html',{})"
                                                                        target="_self">Etat&nbsp;bordereau&nbsp;utilis&#233;</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/bordereaux/entree-bordereau.html',{})"
                                                                        target="_self">Entr&#233;e&nbsp;bordereau</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/bordereaux/entree-liste-bordereau.html',{})"
                                                                        target="_self">Liste&nbsp;des&nbsp;entr&#233;es&nbsp;de&nbsp;bordereau</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/bordereaux/sortie-bordereau.html',{})"
                                                                        target="_self">Sortie&nbsp;bordereau</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/bordereaux/sortie-liste-bordereau.html',{})"
                                                                        target="_self">Liste&nbsp;des&nbsp;sorties&nbsp;de&nbsp;bordereau</a>
                                                                </li>
                                                                <li><span></span><span>Recherche</span>
                                                                    <ul>
                                                                        <li><span></span><a
                                                                                href="javascript:displaylightbox('./moyengenerau/fournitures/bordereaux/recherche-bordereau-entree.html',{})"
                                                                                target="_self">Bordereau&nbsp;entr&#233;e</a>
                                                                        </li>
                                                                        <li><span></span><a
                                                                                href="javascript:displaylightbox('./moyengenerau/fournitures/bordereaux/recherche-borderreau-sortie.html',{})"
                                                                                target="_self">Bordereau&nbsp;sortie</a>
                                                                        </li>
                                                                        <li><span></span><a
                                                                                href="javascript:displaylightbox('./moyengenerau/fournitures/bordereaux/recherche-solde.html',{})"
                                                                                target="_self">Solde</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><span>S&#233;curipack</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/securipack/entree-securipack.html',{})"
                                                                        target="_self">Entr&#233;e&nbsp;s&#233;curipack</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/securipack/liste-entree-securipack.html',{})"
                                                                        target="_self">Liste&nbsp;des&nbsp;sorties&nbsp;s&#233;curipack</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/securipack/sortie-securipack.html',{})"
                                                                        target="_self">Sortie&nbsp;s&#233;curipack</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/securipack/liste-sortie-securipack.html',{})"
                                                                        target="_self">Liste&nbsp;des&nbsp;sorties&nbsp;s&#233;curipack</a>
                                                                </li>
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
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><span>Achat</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/carnet-caisse/entree-caisse.html',{})"
                                                                        target="_self">Entr&#233;e&nbsp;carnet&nbsp;de&nbsp;caisse</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/carnet-caisse/liste-entree-caisse.html',{})"
                                                                        target="_self">Liste&nbsp;entr&#233;e&nbsp;carnet&nbsp;de&nbsp;caisse</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/carnet-caisse/sortie-caisse.html',{})"
                                                                        target="_self">Sortie&nbsp;carnet&nbsp;de&nbsp;caisse</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/carnet-caisse/liste-caisse.html',{})"
                                                                        target="_self">Liste&nbsp;carnet&nbsp;de&nbsp;caisse</a>
                                                                </li>
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
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><span>Fiche&nbsp;de&nbsp;maintenance&nbsp;DAB</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/maintenance-dab/entree-maintenance.html',{})"
                                                                        target="_self">Entr&#233;e&nbsp;fiche&nbsp;de&nbsp;maintenance&nbsp;DAB</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/maintenance-dab/liste-entree-maintenance.html',{})"
                                                                        target="_self">Liste&nbsp;entr&#233;e&nbsp;fiche&nbsp;de&nbsp;maintenance&nbsp;DAB</a>
                                                                </li>
                                                                <li></li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/maintenance-dab/sortie-maintenance.html',{})"
                                                                        target="_self">Sortie&nbsp;fiche&nbsp;de&nbsp;maintenance&nbsp;DAB</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/maintenance-dab/liste-sortie-maintenance.html',{})"
                                                                        target="_self">Liste&nbsp;sortie&nbsp;fiche&nbsp;de&nbsp;maintenance&nbsp;DAB</a>
                                                                </li>
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
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><span>Fiche&nbsp;d'approvisionnement&nbsp;DAB</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/approvisionnement-dab/entree-maintenance.html',{})"
                                                                        target="_self">Entr&#233;e&nbsp;fiche&nbsp;d'approvionnement&nbsp;DAB</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/approvisionnement-dab/liste-entree-maintenance.html',{})"
                                                                        target="_self">Liste&nbsp;entr&#233;e&nbsp;fiche&nbsp;d'approvisionnement&nbsp;DAB</a>
                                                                </li>
                                                                <li></li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/approvisionnement-dab/sortie-maintenance.html',{})"
                                                                        target="_self">Sortie&nbsp;fiche&nbsp;d'approvisionnement&nbsp;DAB</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/approvisionnement-dab/liste-sortie-maintenance.html',{})"
                                                                        target="_self">Liste&nbsp;sortie&nbsp;d'approvisionnement&nbsp;DAB</a>
                                                                </li>
                                                                <li><span></span><span>Recherche</span>
                                                                    <ul>
                                                                        <li><span></span><span>Entr&#233;e&nbsp;fiche&nbsp;approvisionnement</span>
                                                                        </li>
                                                                        <li>
                                                                            <span></span><span>Sortie&nbsp;fiche&nbsp;approvisionnement</span>
                                                                        </li>
                                                                        <li><span></span><span>Solde</span></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><span>Bon&nbsp;de&nbsp;commande</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/bon-de-commande/entree-bon-commande.html',{})"
                                                                        target="_self">Entr&#233;e&nbsp;bon&nbsp;de&nbsp;commande</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/bon-de-commande/liste-entree-bon-commande.html',{})"
                                                                        target="_self">Liste&nbsp;entr&#233;e&nbsp;bon&nbsp;de&nbsp;commande</a>
                                                                </li>
                                                                <li></li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/bon-de-commande/sortie-bon-de-commande.html',{})"
                                                                        target="_self">Sortie&nbsp;bon&nbsp;de&nbsp;commande</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/bon-de-commande/liste-sortie-bon-de-commande.html',{})"
                                                                        target="_self">Liste&nbsp;sortie&nbsp;bon&nbsp;de&nbsp;commande</a>
                                                                </li>
                                                                <li><span></span><span>Recherche</span>
                                                                    <ul>
                                                                        <li><span></span><span>Entr&#233;e&nbsp;fiche&nbsp;bon&nbsp;de&nbsp;commande</span>
                                                                        </li>
                                                                        <li><span></span><span>Sortie&nbsp;fiche&nbsp;bon&nbsp;de&nbsp;commande</span>
                                                                        </li>
                                                                        <li><span></span><span>Solde</span></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><span>Ticket&nbsp;visiteur</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/ticket-visiteur/entree-ticket.html',{})"
                                                                        target="_self">Entr&#233;e&nbsp;ticket&nbsp;visiteur</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/ticket-visiteur/liste-entree-ticket.html',{})"
                                                                        target="_self">Liste&nbsp;entr&#233;e&nbsp;ticket&nbsp;visiteur</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/ticket-visiteur/sortie-ticket.html',{})"
                                                                        target="_self">Sortie&nbsp;ticket&nbsp;visiteur</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./moyengenerau/fournitures/ticket-visiteur/liste-sortie-ticket.html',{})"
                                                                        target="_self">Liste&nbsp;ticket&nbsp;sortie&nbsp;visiteur</a>
                                                                </li>
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
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Conteneur</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./tournee/conteneur/conteneur-nouveau.html',{})"
                                                                target="_self">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./tournee/conteneur/conteneur-liste.html',{})"
                                                                target="_self">Liste</a>
                                                        </li>
                                                        <li><span></span><span>Recherche</span>
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
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Intervention&nbsp;v&#233;hicules</span>
                                                    <ul>
                                                        <li><span></span><span>Panne</span>
                                                            <ul>
                                                                <li><span></span><span>D&#233;faillance&nbsp;constat&#233;e</span>
                                                                    <ul>
                                                                        <li><span></span><span>Nouveau</span></li>
                                                                        <li><span></span><span>Liste</span></li>
                                                                    </ul>
                                                                </li>
                                                                <li><span></span><span>D&#233;faillance&nbsp;effectu&#233;e</span>
                                                                    <ul>
                                                                        <li><span></span><span>Nouveau</span></li>
                                                                        <li><span></span><span>Liste</span></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><span>D&#233;pense</span>
                                                            <ul>
                                                                <li><span></span><span>Nouveau</span></li>
                                                                <li><span></span><span>Liste</span></li>
                                                                <li><span></span><span>Autres&nbsp;d&#233;penses</span>
                                                                    <ul>
                                                                        <li><span></span><span>Nouveau</span></li>
                                                                        <li><span></span><span>Liste</span></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><span></span><span>Recherche</span>
                                                            <ul>
                                                                <li><span></span><span>Panne/v&#233;hicule</span></li>
                                                                <li><span></span><span>Recherche&nbsp;d&#233;penses</span></li>
                                                                <li>
                                                                    <span></span><span>Recherche&nbsp;autres&nbsp;d&#233;penses</span>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Carburant</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./comptabilite/etat/carb-chargement-ticket.html',{})"
                                                                target="_self">Carte&nbsp;carb/Chargement/ticket</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./comptabilite/etat/carb-chargement.html',{})"
                                                                target="_self">Carte&nbsp;carb/Chargement</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./comptabilite/etat/carb-ticket.html',{})"
                                                                target="_self">Carte&nbsp;carb/ticket</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./comptabilite/etat/etat-carburant-vehicule.html',{})"
                                                                target="_self">Etat&nbsp;carburant/v&#233;hicule</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./comptabilite/etat/etat-carburant.html',{})"
                                                                target="_self">Etat&nbsp;carburant</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./comptabilite/etat/etat-carburant-vehicule.html',{})"
                                                                target="_self">Etat&nbsp;carburant/v&#233;hicule</a>
                                                        </li>
                                                        <li><span></span><span>Etat&nbsp;g&#233;n&#233;ral</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./comptabilite/etat/carte-carburant.html',{})"
                                                                        target="_self">Carte&nbsp;carburant</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:displaylightbox('./comptabilite/etat/vehicule.html',{})"
                                                                        target="_self">V&#233;hicule</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Carburant&nbsp;tourn&#233;e</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./tournee/carburanttournee/ticket-carburant.html',{})"
                                                                target="_self">Ticket&nbsp;carburant</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./tournee/carburanttournee/liste-ticket-carburant.html',{})"
                                                                target="_self">Liste&nbsp;ticket&nbsp;carburant</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./tournee/carburanttournee/carburant-comptant.html',{})"
                                                                target="_self">Carburant&nbsp;comptant</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:displaylightbox('./tournee/carburanttournee/liste-ticket-comptant.html',{})"
                                                                target="_self">Liste&nbsp;carburant&nbsp;comptant</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <script>
                                    var cmMenuBar12 =
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
                                    var cmMenuBar12HSplit = [_cmNoClick, '<td class="MenuBar12MenuSplitLeft"><div></div></td>' +
                                    '<td class="MenuBar12MenuSplitText"><div></div></td>' +
                                    '<td class="MenuBar12MenuSplitRight"><div></div></td>'];
                                    var cmMenuBar12MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar12HorizontalSplit">|</td></tr></table></div>'];
                                    var cmMenuBar12MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar12MainSplitText"><div></div></td>'];
                                    document.addEventListener('DOMContentLoaded', function (event) {
                                        cmDrawFromText('MenuBar12', 'hbr', cmMenuBar12, 'MenuBar12');
                                    });
                                </script>
                            </nav>
                        </div>

                        <div class="element">
                            <!--RH-->
                            <nav id="wb_MenuBar10">
                                <div id="MenuBar10">
                                    <ul style="display:none;">
                                        <li><span></span><span>RH</span>
                                            <ul>
                                                <li><span></span><span>Convoyeur</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./commercial/convoyeurnouveau.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./commercial/convoyeurliste.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Liste">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Personnel</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./rh/nouveau.html','no','no','no','yes','yes','no','','','1000','1000')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./rh/liste.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Liste">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <script>
                                    var cmMenuBar10 =
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
                                    var cmMenuBar10HSplit = [_cmNoClick, '<td class="MenuBar10MenuSplitLeft"><div></div></td>' +
                                    '<td class="MenuBar10MenuSplitText"><div></div></td>' +
                                    '<td class="MenuBar10MenuSplitRight"><div></div></td>'];
                                    var cmMenuBar10MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar10HorizontalSplit">|</td></tr></table></div>'];
                                    var cmMenuBar10MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar10MainSplitText"><div></div></td>'];
                                    document.addEventListener('DOMContentLoaded', function (event) {
                                        cmDrawFromText('MenuBar10', 'hbr', cmMenuBar10, 'MenuBar10');
                                    });
                                </script>
                            </nav>
                        </div>

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
                                                                href="javascript:popupwnd('./informatique/nouveau-achat-materiel.html','no','no','no','no','yes','no','','','1000','500')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./informatique/liste-achat-materiel.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Liste">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Mission</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./informatique/nouveau-mission.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a href="./informatique/liste-mission.html" target="_self"
                                                                            title="Liste">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Op&#233;ration de maintenance">Op&#233;ration&nbsp;de&nbsp;maintenance</a>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./informatique/nouveau-operation-maintenance.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./informatique/liste-operation-maintenance.html','no','no','no','yes','yes','no','','','1000','500')"
                                                                target="_self" title="Liste">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Fournisseur</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./informatique/nouveau-fournisseur.html','no','no','no','yes','yes','no','','','1000','800')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./informatique/liste-fournisseur.html','no','no','no','yes','yes','no','','','1000','800')"
                                                                target="_self" title="Liste">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <script>
                                    var cmMenuBar11 =
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
                                    var cmMenuBar11HSplit = [_cmNoClick, '<td class="MenuBar11MenuSplitLeft"><div></div></td>' +
                                    '<td class="MenuBar11MenuSplitText"><div></div></td>' +
                                    '<td class="MenuBar11MenuSplitRight"><div></div></td>'];
                                    var cmMenuBar11MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar11HorizontalSplit">|</td></tr></table></div>'];
                                    var cmMenuBar11MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar11MainSplitText"><div></div></td>'];
                                    document.addEventListener('DOMContentLoaded', function (event) {
                                        cmDrawFromText('MenuBar11', 'hbr', cmMenuBar11, 'MenuBar11');
                                    });
                                </script>
                            </nav>
                        </div>

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
                                                                href="javascript:popupwnd('./achat/fournisseur-nouveau.html','no','no','no','yes','yes','no','','','1100','600')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('','no','no','no','no','no','no','','','1000','400')"
                                                                target="_self" title="Liste">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><span></span><span>Produit</span>
                                                    <ul>
                                                        <li><span></span><span>Entr&#233;e</span>
                                                            <ul>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./achat/entree-produit-nouveau.html','no','no','no','yes','no','no','','','1000','800')"
                                                                        target="_self" title="Nouveau">Nouveau</a>
                                                                </li>
                                                                <li><span></span><a
                                                                        href="javascript:popupwnd('./achat/entree-produit-liste.html','no','no','no','no','yes','no','','','1000','800')"
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
                                                <li><span></span><span>Rechercher</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./achat/recherche-par-service.html','no','no','no','yes','yes','no','','','800','500')"
                                                                target="_self" title="Par service">Par&nbsp;service</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./achat/recherche-par-centre.html','no','no','no','yes','yes','no','','','800','500')"
                                                                target="_self" title="Par centre">Par&nbsp;centre</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./achat/recherche-par-budget.html','no','no','no','yes','yes','no','','','800','500')"
                                                                target="_self" title="Par budget">Par&nbsp;budget</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./achat/rechercher-par-produit.html','no','no','no','yes','yes','no','','','800','500')"
                                                                target="_self" title="Par produit">Par&nbsp;produit</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <script>
                                    var cmMenuBar9 =
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
                                    var cmMenuBar9HSplit = [_cmNoClick, '<td class="MenuBar9MenuSplitLeft"><div></div></td>' +
                                    '<td class="MenuBar9MenuSplitText"><div></div></td>' +
                                    '<td class="MenuBar9MenuSplitRight"><div></div></td>'];
                                    var cmMenuBar9MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar9HorizontalSplit">|</td></tr></table></div>'];
                                    var cmMenuBar9MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar9MainSplitText"><div></div></td>'];
                                    document.addEventListener('DOMContentLoaded', function (event) {
                                        cmDrawFromText('MenuBar9', 'hbr', cmMenuBar9, 'MenuBar9');
                                    });
                                </script>
                            </nav>
                        </div>

                        <div class="element">
                            <!--SSB-->
                            <nav id="wb_MenuBar13">
                                <div id="MenuBar13">
                                    <ul style="display:none;">
                                        <li><span></span><span>SSB</span>
                                            <ul>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('./ssb/Nouveau.html','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Nouveau">Nouveau</a>
                                                </li>
                                                <li><span></span><a
                                                        href="javascript:popupwnd('./ssb/Liste-ssb.html','no','no','no','yes','yes','no','','','1000','500')"
                                                        target="_self" title="Liste">Liste</a>
                                                </li>
                                                <li><span></span><span>Commercial</span>
                                                    <ul>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./ssb/commercial-nouveau.html','no','no','no','yes','yes','no','','','1200','800')"
                                                                target="_self" title="Nouveau">Nouveau</a>
                                                        </li>
                                                        <li><span></span><a
                                                                href="javascript:popupwnd('./ssb/commercial-liste.html','no','no','no','yes','yes','no','','','1200','900')"
                                                                target="_self" title="Liste">Liste</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <script>
                                    var cmMenuBar13 =
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
                                    var cmMenuBar13HSplit = [_cmNoClick, '<td class="MenuBar13MenuSplitLeft"><div></div></td>' +
                                    '<td class="MenuBar13MenuSplitText"><div></div></td>' +
                                    '<td class="MenuBar13MenuSplitRight"><div></div></td>'];
                                    var cmMenuBar13MainVSplit = [_cmNoClick, '<div><table width="15" cellspacing="0"><tr><td class="MenuBar13HorizontalSplit">|</td></tr></table></div>'];
                                    var cmMenuBar13MainHSplit = [_cmNoClick, '<td colspan="3" class="MenuBar13MainSplitText"><div></div></td>'];
                                    document.addEventListener('DOMContentLoaded', function (event) {
                                        cmDrawFromText('MenuBar13', 'hbr', cmMenuBar13, 'MenuBar13');
                                    });
                                </script>
                            </nav>
                        </div>

                    <!--<div class="row">

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

                    </div>-->

            </div>
        </div>
    </body>
</html>
