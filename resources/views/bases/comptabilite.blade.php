@extends('main-base')

@section('aside-menu')

    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
             data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
             data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div
                class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true">

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Comptabilité</span>
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
        <span class="menu-link">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z"
                            fill="black"></path>
                        <path d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z"
                              fill="black"></path>
                        <path opacity="0.3"
                              d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z"
                              fill="black"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title"><font style="vertical-align: inherit;"><font
                        style="vertical-align: inherit;">Etat</font></font></span>
            <span class="menu-arrow"></span>
        </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="/ca-liste">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                                <span class="menu-title">Tableau client/période</span>
                            </a>
                        </div>
                    </div>

                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title"><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;">Caisse</font></font></span>
                    <span class="menu-arrow"></span>
                </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <div class="menu-item">
                                    <a class="menu-link" href="/comptabilite-etat-solde-caisse">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                                        <span class="menu-title">Solde de la caisse</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="/comptabilite-etat-securite-tournee">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                                <span class="menu-title">Etat sécurité tournée</span>
                            </a>
                        </div>
                    </div>

                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="/comptabilite-etat-tracabilite">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                                <span class="menu-title">Traçabilité</span>
                            </a>
                        </div>
                    </div>

                </div>

                {{--     Sous-menu comptabilite - Facture  Début   --}}
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
        <span class="menu-link">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z"
                            fill="black"></path>
                        <path d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z"
                              fill="black"></path>
                        <path opacity="0.3"
                              d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z"
                              fill="black"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Factures</font></font></span>
            <span class="menu-arrow"></span>
        </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="/comptabilite-fature">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                                <span class="menu-title">Nouveau</span>
                            </a>
                        </div>
                    </div>

                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="/comptabilite-fature-liste">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                                <span class="menu-title">Liste</span>
                            </a>
                        </div>
                    </div>

                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="/comptabilite-fature-liste">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                                <span class="menu-title">Recherche</span>
                            </a>
                        </div>
                    </div>

                </div>
                {{--     Sous-menu comptabilite - Facture Fin    --}}


                {{--     Sous-menu comptabilite - Reglement Facture  Début   --}}
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
        <span class="menu-link">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z"
                            fill="black"></path>
                        <path d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z"
                              fill="black"></path>
                        <path opacity="0.3"
                              d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z"
                              fill="black"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Règlement facture</font></font></span>
            <span class="menu-arrow"></span>
        </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="/comptabilite-reglement-fature">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                                <span class="menu-title">Nouveau</span>
                            </a>
                        </div>
                    </div>

                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="/comptabilite-reglement-fature-liste">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                                <span class="menu-title">Liste</span>
                            </a>
                        </div>
                    </div>

                </div>
                {{--     Sous-menu comptabilite - Reglement Facture Fin    --}}


                {{--     Sous-menu comptabilite - Caisse  Début   --}}
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
        <span class="menu-link">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z"
                            fill="black"></path>
                        <path d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z"
                              fill="black"></path>
                        <path opacity="0.3"
                              d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z"
                              fill="black"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Caisse</font></font></span>
            <span class="menu-arrow"></span>
        </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="/comptabilite-entree-caisse">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                                <span class="menu-title">Nouveau</span>
                            </a>
                        </div>
                    </div>

                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="/comptabilite-entree-caisse-liste">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                                <span class="menu-title">Liste</span>
                            </a>
                        </div>
                    </div>

                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="/comptabilite-entree-caisse-liste-justifs">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                                <span class="menu-title">Liste des justifs</span>
                            </a>
                        </div>
                    </div>

                </div>
                {{--     Sous-menu comptabilite - Caisse Fin    --}}

            </div>
        </div>
    </div>
    <div class="menu-item">
        <div class="menu-content">
            <div class="separator mx-1 my-4"></div>
        </div>
    </div>
    <!--end::Aside Menu-->

@endsection
