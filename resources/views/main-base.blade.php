<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->
<head>
    <base href="">
    <title>KAWA</title>
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("assets/css/style.bundle.css")}}" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->

<<<<<<< HEAD
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>
=======
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src={{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
>>>>>>> 91db280b69b8deb4635161c5a39993ad5691bb82


</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body"
      class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
      style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Aside-->
        <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
             data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
             data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
             data-kt-drawer-toggle="#kt_aside_mobile_toggle">
            <!--begin::Brand-->
            <div class="aside-logo flex-column-auto" id="kt_aside_logo">
                <!--begin::Logo-->
                <a href="/">
                    {{-- <img alt="Logo" src="images/logoburval.png" class="h-25px logo"/> --}}
                    <img alt="Logo" src="{{asset("images/logoburval.png")}}" class="logo" style="
                    width: auto;
                    height: 76px!important;
                    margin-top: 16px;"/>
                </a>
                <!--end::Logo-->
                <!--begin::Aside toggler-->
                <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
                     data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                     data-kt-toggle-name="aside-minimize">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
                    <span class="svg-icon svg-icon-1 rotate-180">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
									<path opacity="0.5"
                                          d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                                          fill="black"/>
									<path
                                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                                        fill="black"/>
								</svg>
							</span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Aside toggler-->
            </div>
            <!--end::Brand-->
            @yield('aside-menu')
        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header align-items-stretch" style="background-color: #FFD801;">
                <!--begin::Container-->
                <div class="container-fluid d-flex align-items-stretch justify-content-between">
                    <!--begin::Aside mobile toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                        <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                             id="kt_aside_mobile_toggle">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                            <span class="svg-icon svg-icon-2x mt-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
											<path
                                                d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                                fill="black"/>
											<path opacity="0.3"
                                                  d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                                  fill="black"/>
										</svg>
									</span>
                            <!--end::Svg Icon-->
                        </div>
                    </div>
                    <!--end::Aside mobile toggle-->
                    <!--begin::Mobile logo-->
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                        <a href="../../demo1/dist/index.html" class="d-lg-none">
                            <img alt="Logo" src="assets/media/logos/logo-2.svg" class="h-30px"/>
                        </a>
                    </div>
                    <!--end::Mobile logo-->
                    <!--begin::Wrapper-->
                    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                        <!--begin::Navbar-->
                        <div class="d-flex align-items-stretch" id="kt_header_nav">
                            <!--begin::Menu wrapper-->
                            <div class="header-menu align-items-stretch" data-kt-drawer="true"
                                 data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                                 data-kt-drawer-overlay="true"
                                 data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                                 data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle"
                                 data-kt-swapper="true" data-kt-swapper-mode="prepend"
                                 data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                                <!--begin::Menu-->

                                <!--end::Menu-->
                            </div>
                            <!--end::Menu wrapper-->
                        </div>
                        <!--end::Navbar-->
                        <!--begin::Topbar-->
                        <div class="d-flex align-items-stretch flex-shrink-0">
                            <!--begin::Toolbar wrapper-->
                            <div class="d-flex align-items-stretch flex-shrink-0">
                                <!--begin::User-->
                                <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                                    <!--begin::Menu wrapper-->
                                    <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                                         data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                         data-kt-menu-placement="bottom-end">
                                        <img src="{{asset('assets/media/avatars/blank.png')}}" alt="user"/>
                                    </div>
                                    <!--end::Menu wrapper-->
                                </div>
                                <!--end::User -->
                                <!--begin::Heaeder menu toggle-->
                                <div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">
                                    <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                                         id="kt_header_menu_mobile_toggle">
                                        <!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
                                        <span class="svg-icon svg-icon-1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
														<path
                                                            d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z"
                                                            fill="black"/>
														<path opacity="0.3"
                                                              d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z"
                                                              fill="black"/>
													</svg>
												</span>
                                        <!--end::Svg Icon-->
                                    </div>
                                </div>
                                <!--end::Heaeder menu toggle-->
                            </div>
                            <!--end::Toolbar wrapper-->
                        </div>
                        <!--end::Topbar-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                @yield('main')
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                <!--begin::Container-->
                <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <!--begin::Copyright-->
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-muted fw-bold me-1">2022©</span>
                        <a href="https://keenthemes.com" target="_blank"
                           class="text-gray-800 text-hover-primary">KAWA</a>
                    </div>
                    <!--end::Copyright-->
                    <!--begin::Menu-->
                    <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                        <li class="menu-item">
                            <a href="#" target="_blank" class="menu-link px-2">By BAFATECH</a>
                        </li>
                    </ul>
                    <!--end::Menu-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->

<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
    <span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)"
                          fill="black"/>
					<path
                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                        fill="black"/>
				</svg>
			</span>
    <!--end::Svg Icon-->
</div>
<!--end::Scrolltop-->
<!--end::Main-->

</body>
<!--end::Body-->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('magnificpopup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('js/wwb15.min.js') }}"></script>
<script src="{{ asset('js/jscookmenu.min.js') }}"></script>

<script>var hostUrl = "assets/";</script>
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
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->

<!--end::Global Javascript Bundle-->
<!--end::Javascript-->
</html>
