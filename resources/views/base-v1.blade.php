<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    <base href="">
    <title>KAWA</title>
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->

    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>

    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>

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
                    <img alt="Logo" src="images/logonoir.png" class="h-25px logo"/>
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
													<path d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z" fill="black"></path>
													<path d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z" fill="black"></path>
													<path opacity="0.3" d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z" fill="black"></path>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
										<span class="menu-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Etat</font></font></span>
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
                                        <span class="menu-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Caisse</font></font></span>
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
													<path d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z" fill="black"></path>
													<path d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z" fill="black"></path>
													<path opacity="0.3" d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z" fill="black"></path>
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
													<path d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z" fill="black"></path>
													<path d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z" fill="black"></path>
													<path opacity="0.3" d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z" fill="black"></path>
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
													<path d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z" fill="black"></path>
													<path d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z" fill="black"></path>
													<path opacity="0.3" d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z" fill="black"></path>
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

                        {{--<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<path
                                                        d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z"
                                                        fill="black"/>
													<path
                                                        d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z"
                                                        fill="black"/>
													<path opacity="0.3"
                                                          d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z"
                                                          fill="black"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
										<span class="menu-title">Pages</span>
										<span class="menu-arrow"></span>
									</span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Profile</span>
												<span class="menu-arrow"></span>
											</span>
                                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/profile/overview.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Overview</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/profile/projects.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Projects</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/profile/campaigns.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Campaigns</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/profile/documents.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Documents</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/profile/connections.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Connections</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/profile/activity.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Activity</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Projects</span>
												<span class="menu-arrow"></span>
											</span>
                                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/projects/list.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">My Projects</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/projects/project.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">View Project</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/projects/targets.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Targets</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/projects/budget.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Budget</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/projects/users.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Users</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/projects/files.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Files</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/projects/activity.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Activity</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/projects/settings.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Settings</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Wizards</span>
												<span class="menu-arrow"></span>
											</span>
                                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/wizards/horizontal.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Horizontal</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/wizards/vertical.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Vertical</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Search</span>
												<span class="menu-arrow"></span>
											</span>
                                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/search/horizontal.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Horizontal</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/search/vertical.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Vertical</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Blog</span>
												<span class="menu-arrow"></span>
											</span>
                                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/blog/home.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Blog Home</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/blog/post.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Blog Post</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Company</span>
												<span class="menu-arrow"></span>
											</span>
                                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/company/about.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">About Us</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/company/pricing.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Pricing</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/company/contact.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Contact Us</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/company/team.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Our Team</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/company/licenses.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Licenses</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/company/sitemap.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Sitemap</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Careers</span>
												<span class="menu-arrow"></span>
											</span>
                                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/careers/list.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Careers List</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/careers/apply.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Careers Apply</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">FAQ</span>
												<span class="menu-arrow"></span>
											</span>
                                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/faq/classic.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Classic</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="../../demo1/dist/pages/faq/extended.html">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                                <span class="menu-title">Extended</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>--}}
                        {{--<div class="menu-item">
                            <a class="menu-link" href="../../demo1/dist/apps/calendar.html">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<path opacity="0.3"
                                                          d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z"
                                                          fill="black"/>
													<path
                                                        d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z"
                                                        fill="black"/>
													<path
                                                        d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z"
                                                        fill="black"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
                                <span class="menu-title">Calendar</span>
                            </a>
                        </div>--}}
                        <div class="menu-item">
                            <div class="menu-content">
                                <div class="separator mx-1 my-4"></div>
                            </div>
                        </div>
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Aside Menu-->
            </div>
            <!--end::Aside menu-->
        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header align-items-stretch"  style="background-color: #FFD801;">
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
                                {{--<div
                                    class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                                    id="#kt_header_menu" data-kt-menu="true">
                                    <div class="menu-item me-lg-1">
                                        <a class="menu-link active py-3" href="#">
                                            <span class="menu-title">Chiffre d'affaire</span>
                                        </a>
                                    </div>
                                    <div class="menu-item me-lg-1">
                                        <a class="menu-link py-3" href="#">
                                            <span class="menu-title">Depart tournée</span>
                                        </a>
                                    </div>
                                    <div class="menu-item me-lg-1">
                                        <a class="menu-link py-3" href="#">
                                            <span class="menu-title">Arrivée tournée</span>
                                        </a>
                                    </div>
                                    <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                                         class="menu-item menu-lg-down-accordion me-lg-1">
												<span class="menu-link py-3">
													<span class="menu-title">Crafted</span>
													<span class="menu-arrow d-lg-none"></span>
												</span>
                                        <div
                                            class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                            <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                 data-kt-menu-placement="right-start"
                                                 class="menu-item menu-lg-down-accordion">
														<span class="menu-link py-3">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path
                                                                            d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z"
                                                                            fill="black"/>
																		<path
                                                                            d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z"
                                                                            fill="black"/>
																		<path opacity="0.3"
                                                                              d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z"
                                                                              fill="black"/>
																	</svg>
																</span>
                                                                <!--end::Svg Icon-->
															</span>
															<span class="menu-title">Pages</span>
															<span class="menu-arrow"></span>
														</span>
                                                <div
                                                    class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                    <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                         data-kt-menu-placement="right-start"
                                                         class="menu-item menu-lg-down-accordion">
																<span class="menu-link py-3">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Profile</span>
																	<span class="menu-arrow"></span>
																</span>
                                                        <div
                                                            class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/profile/overview.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Overview</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/profile/projects.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Projects</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/profile/campaigns.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Campaigns</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/profile/documents.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Documents</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/profile/connections.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Connections</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/profile/activity.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Activity</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                         data-kt-menu-placement="right-start"
                                                         class="menu-item menu-lg-down-accordion">
																<span class="menu-link py-3">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Projects</span>
																	<span class="menu-arrow"></span>
																</span>
                                                        <div
                                                            class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/projects/list.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">My Projects</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/projects/project.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">View Project</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/projects/targets.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Targets</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/projects/budget.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Budget</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/projects/users.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Users</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/projects/files.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Files</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/projects/activity.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Activity</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/projects/settings.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Settings</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                         data-kt-menu-placement="right-start"
                                                         class="menu-item menu-lg-down-accordion">
																<span class="menu-link py-3">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Wizards</span>
																	<span class="menu-arrow"></span>
																</span>
                                                        <div
                                                            class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/wizards/horizontal.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Horizontal</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/wizards/vertical.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Vertical</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                         data-kt-menu-placement="right-start"
                                                         class="menu-item menu-lg-down-accordion">
																<span class="menu-link py-3">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Search</span>
																	<span class="menu-arrow"></span>
																</span>
                                                        <div
                                                            class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/search/horizontal.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Horizontal</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/search/vertical.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Vertical</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                         data-kt-menu-placement="right-start"
                                                         class="menu-item menu-lg-down-accordion">
																<span class="menu-link py-3">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Blog</span>
																	<span class="menu-arrow"></span>
																</span>
                                                        <div
                                                            class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/blog/home.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Blog Home</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/blog/post.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Blog Post</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                         data-kt-menu-placement="right-start"
                                                         class="menu-item menu-lg-down-accordion">
																<span class="menu-link py-3">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Company</span>
																	<span class="menu-arrow"></span>
																</span>
                                                        <div
                                                            class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/company/about.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">About Us</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/company/pricing.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Pricing</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/company/contact.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Contact Us</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/company/team.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Our Team</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/company/licenses.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Licenses</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/company/sitemap.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Sitemap</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                         data-kt-menu-placement="right-start"
                                                         class="menu-item menu-lg-down-accordion">
																<span class="menu-link py-3">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Careers</span>
																	<span class="menu-arrow"></span>
																</span>
                                                        <div
                                                            class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/careers/list.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Careers List</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/careers/apply.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Careers Apply</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                         data-kt-menu-placement="right-start"
                                                         class="menu-item menu-lg-down-accordion">
																<span class="menu-link py-3">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">FAQ</span>
																	<span class="menu-arrow"></span>
																</span>
                                                        <div
                                                            class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/faq/classic.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Classic</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/pages/faq/extended.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Extended</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                 data-kt-menu-placement="right-start"
                                                 class="menu-item menu-lg-down-accordion">
														<span class="menu-link py-3">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path
                                                                            d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                                                                            fill="black"/>
																		<rect opacity="0.3" x="8" y="3" width="8"
                                                                              height="8" rx="4" fill="black"/>
																	</svg>
																</span>
                                                                <!--end::Svg Icon-->
															</span>
															<span class="menu-title">Account</span>
															<span class="menu-arrow"></span>
														</span>
                                                <div
                                                    class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                    <div class="menu-item">
                                                        <a class="menu-link py-3"
                                                           href="../../demo1/dist/account/overview.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                            <span class="menu-title">Overview</span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link py-3"
                                                           href="../../demo1/dist/account/settings.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                            <span class="menu-title">Settings</span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link py-3"
                                                           href="../../demo1/dist/account/security.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                            <span class="menu-title">Security</span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link py-3"
                                                           href="../../demo1/dist/account/billing.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                            <span class="menu-title">Billing</span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link py-3"
                                                           href="../../demo1/dist/account/statements.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                            <span class="menu-title">Statements</span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link py-3"
                                                           href="../../demo1/dist/account/referrals.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                            <span class="menu-title">Referrals</span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link py-3"
                                                           href="../../demo1/dist/account/api-keys.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                            <span class="menu-title">API Keys</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                 data-kt-menu-placement="right-start"
                                                 class="menu-item menu-lg-down-accordion">
														<span class="menu-link py-3">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/technology/teh004.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.3"
                                                                              d="M21 10.7192H3C2.4 10.7192 2 11.1192 2 11.7192C2 12.3192 2.4 12.7192 3 12.7192H6V14.7192C6 18.0192 8.7 20.7192 12 20.7192C15.3 20.7192 18 18.0192 18 14.7192V12.7192H21C21.6 12.7192 22 12.3192 22 11.7192C22 11.1192 21.6 10.7192 21 10.7192Z"
                                                                              fill="black"/>
																		<path
                                                                            d="M11.6 21.9192C11.4 21.9192 11.2 21.8192 11 21.7192C10.6 21.4192 10.5 20.7191 10.8 20.3191C11.7 19.1191 12.3 17.8191 12.7 16.3191C12.8 15.8191 13.4 15.4192 13.9 15.6192C14.4 15.7192 14.8 16.3191 14.6 16.8191C14.2 18.5191 13.4 20.1192 12.4 21.5192C12.2 21.7192 11.9 21.9192 11.6 21.9192ZM8.7 19.7192C10.2 18.1192 11 15.9192 11 13.7192V8.71917C11 8.11917 11.4 7.71917 12 7.71917C12.6 7.71917 13 8.11917 13 8.71917V13.0192C13 13.6192 13.4 14.0192 14 14.0192C14.6 14.0192 15 13.6192 15 13.0192V8.71917C15 7.01917 13.7 5.71917 12 5.71917C10.3 5.71917 9 7.01917 9 8.71917V13.7192C9 15.4192 8.4 17.1191 7.2 18.3191C6.8 18.7191 6.9 19.3192 7.3 19.7192C7.5 19.9192 7.7 20.0192 8 20.0192C8.3 20.0192 8.5 19.9192 8.7 19.7192ZM6 16.7192C6.5 16.7192 7 16.2192 7 15.7192V8.71917C7 8.11917 7.1 7.51918 7.3 6.91918C7.5 6.41918 7.2 5.8192 6.7 5.6192C6.2 5.4192 5.59999 5.71917 5.39999 6.21917C5.09999 7.01917 5 7.81917 5 8.71917V15.7192V15.8191C5 16.3191 5.5 16.7192 6 16.7192ZM9 4.71917C9.5 4.31917 10.1 4.11918 10.7 3.91918C11.2 3.81918 11.5 3.21917 11.4 2.71917C11.3 2.21917 10.7 1.91916 10.2 2.01916C9.4 2.21916 8.59999 2.6192 7.89999 3.1192C7.49999 3.4192 7.4 4.11916 7.7 4.51916C7.9 4.81916 8.2 4.91918 8.5 4.91918C8.6 4.91918 8.8 4.81917 9 4.71917ZM18.2 18.9192C18.7 17.2192 19 15.5192 19 13.7192V8.71917C19 5.71917 17.1 3.1192 14.3 2.1192C13.8 1.9192 13.2 2.21917 13 2.71917C12.8 3.21917 13.1 3.81916 13.6 4.01916C15.6 4.71916 17 6.61917 17 8.71917V13.7192C17 15.3192 16.8 16.8191 16.3 18.3191C16.1 18.8191 16.4 19.4192 16.9 19.6192C17 19.6192 17.1 19.6192 17.2 19.6192C17.7 19.6192 18 19.3192 18.2 18.9192Z"
                                                                            fill="black"/>
																	</svg>
																</span>
                                                                <!--end::Svg Icon-->
															</span>
															<span class="menu-title">Authentication</span>
															<span class="menu-arrow"></span>
														</span>
                                                <div
                                                    class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                    <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                         data-kt-menu-placement="right-start"
                                                         class="menu-item menu-lg-down-accordion">
																<span class="menu-link py-3">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Basic Flow</span>
																	<span class="menu-arrow"></span>
																</span>
                                                        <div
                                                            class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/flows/basic/sign-in.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Sign-in</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/flows/basic/sign-up.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Sign-up</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/flows/basic/two-steps.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Two-steps</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/flows/basic/password-reset.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Password Reset</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/flows/basic/new-password.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">New Password</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                         data-kt-menu-placement="right-start"
                                                         class="menu-item menu-lg-down-accordion">
																<span class="menu-link py-3">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Aside Flow</span>
																	<span class="menu-arrow"></span>
																</span>
                                                        <div
                                                            class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/flows/aside/sign-in.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Sign-in</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/flows/aside/sign-up.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Sign-up</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/flows/aside/two-steps.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Two-steps</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/flows/aside/password-reset.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Password Reset</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/flows/aside/new-password.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">New Password</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                         data-kt-menu-placement="right-start"
                                                         class="menu-item menu-lg-down-accordion">
																<span class="menu-link py-3">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Dark Flow</span>
																	<span class="menu-arrow"></span>
																</span>
                                                        <div
                                                            class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/flows/dark/sign-in.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Sign-in</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/flows/dark/sign-up.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Sign-up</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/flows/dark/two-steps.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Two-steps</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/flows/dark/password-reset.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Password Reset</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/flows/dark/new-password.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">New Password</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                         data-kt-menu-placement="right-start"
                                                         class="menu-item menu-lg-down-accordion">
																<span class="menu-link py-3">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Extended</span>
																	<span class="menu-arrow"></span>
																</span>
                                                        <div
                                                            class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/extended/multi-steps-sign-up.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Multi-steps Sign-up</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/extended/free-trial-sign-up.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Free Trial Sign-up</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/extended/coming-soon.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Coming Soon</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/general/welcome.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Welcome Message</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/general/verify-email.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Verify Email</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/general/password-confirmation.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span
                                                                        class="menu-title">Password Confirmation</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/general/deactivation.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Account Deactivation</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/general/error-404.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Error 404</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/general/error-500.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Error 500</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                         data-kt-menu-placement="right-start"
                                                         class="menu-item menu-lg-down-accordion">
																<span class="menu-link py-3">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Email Templates</span>
																	<span class="menu-arrow"></span>
																</span>
                                                        <div
                                                            class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/email/verify-email.html"
                                                                   target="blank">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Verify Email</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/email/invitation.html"
                                                                   target="blank">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Account Invitation</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/email/password-reset.html"
                                                                   target="blank">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Password Reset</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/authentication/email/password-change.html"
                                                                   target="blank">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Password Changed</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                 data-kt-menu-placement="right-start"
                                                 class="menu-item menu-lg-down-accordion">
														<span class="menu-link py-3">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/art/art009.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.3"
                                                                              d="M21 18.3V4H20H5C4.4 4 4 4.4 4 5V20C10.9 20 16.7 15.6 19 9.5V18.3C18.4 18.6 18 19.3 18 20C18 21.1 18.9 22 20 22C21.1 22 22 21.1 22 20C22 19.3 21.6 18.6 21 18.3Z"
                                                                              fill="black"/>
																		<path
                                                                            d="M22 4C22 2.9 21.1 2 20 2C18.9 2 18 2.9 18 4C18 4.7 18.4 5.29995 18.9 5.69995C18.1 12.6 12.6 18.2 5.70001 18.9C5.30001 18.4 4.7 18 4 18C2.9 18 2 18.9 2 20C2 21.1 2.9 22 4 22C4.8 22 5.39999 21.6 5.79999 20.9C13.8 20.1 20.1 13.7 20.9 5.80005C21.6 5.40005 22 4.8 22 4Z"
                                                                            fill="black"/>
																	</svg>
																</span>
                                                                <!--end::Svg Icon-->
															</span>
															<span class="menu-title">Modals</span>
															<span class="menu-arrow"></span>
														</span>
                                                <div
                                                    class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                    <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                         data-kt-menu-placement="right-start"
                                                         class="menu-item menu-lg-down-accordion">
																<span class="menu-link py-3">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">General</span>
																	<span class="menu-arrow"></span>
																</span>
                                                        <div
                                                            class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/modals/general/invite-friends.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Invite Friends</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/modals/general/view-users.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">View Users</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/modals/general/upgrade-plan.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Upgrade Plan</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/modals/general/share-earn.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Share &amp; Earn</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                         data-kt-menu-placement="right-start"
                                                         class="menu-item menu-lg-down-accordion">
																<span class="menu-link py-3">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Forms</span>
																	<span class="menu-arrow"></span>
																</span>
                                                        <div
                                                            class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/modals/forms/new-target.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">New Target</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/modals/forms/new-card.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">New Card</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/modals/forms/new-address.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">New Address</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/modals/forms/create-api-key.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Create API Key</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                         data-kt-menu-placement="right-start"
                                                         class="menu-item menu-lg-down-accordion">
																<span class="menu-link py-3">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Wizards</span>
																	<span class="menu-arrow"></span>
																</span>
                                                        <div
                                                            class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/modals/wizards/two-factor-authentication.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Two Factor Auth</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/modals/wizards/create-app.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Create App</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/modals/wizards/create-account.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Create Account</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/modals/wizards/create-project.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Create Project</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/modals/wizards/offer-a-deal.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Offer a Deal</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                         data-kt-menu-placement="right-start"
                                                         class="menu-item menu-lg-down-accordion">
																<span class="menu-link py-3">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
																	<span class="menu-title">Search</span>
																	<span class="menu-arrow"></span>
																</span>
                                                        <div
                                                            class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/modals/search/users.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Users</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item">
                                                                <a class="menu-link py-3"
                                                                   href="../../demo1/dist/modals/search/select-location.html">
																			<span class="menu-bullet">
																				<span class="bullet bullet-dot"></span>
																			</span>
                                                                    <span class="menu-title">Select Location</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                 data-kt-menu-placement="right-start"
                                                 class="menu-item menu-lg-down-accordion">
														<span class="menu-link py-3">
															<span class="menu-icon">
																<!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
																<span class="svg-icon svg-icon-2">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<path
                                                                            d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                                                            fill="black"/>
																		<path
                                                                            d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                                                            fill="black"/>
																		<path opacity="0.3"
                                                                              d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                                                              fill="black"/>
																		<path opacity="0.3"
                                                                              d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                                                              fill="black"/>
																	</svg>
																</span>
                                                                <!--end::Svg Icon-->
															</span>
															<span class="menu-title">Widgets</span>
															<span class="menu-arrow"></span>
														</span>
                                                <div
                                                    class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                    <div class="menu-item">
                                                        <a class="menu-link py-3"
                                                           href="../../demo1/dist/widgets/lists.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                            <span class="menu-title">Lists</span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link py-3"
                                                           href="../../demo1/dist/widgets/statistics.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                            <span class="menu-title">Statistics</span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link py-3"
                                                           href="../../demo1/dist/widgets/charts.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                            <span class="menu-title">Charts</span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link py-3"
                                                           href="../../demo1/dist/widgets/mixed.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                            <span class="menu-title">Mixed</span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link py-3"
                                                           href="../../demo1/dist/widgets/tables.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                            <span class="menu-title">Tables</span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link py-3"
                                                           href="../../demo1/dist/widgets/feeds.html">
																	<span class="menu-bullet">
																		<span class="bullet bullet-dot"></span>
																	</span>
                                                            <span class="menu-title">Feeds</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>--}}
                                <!--end::Menu-->
                            </div>
                            <!--end::Menu wrapper-->
                        </div>
                        <!--end::Navbar-->
                        <!--begin::Topbar-->
                        <div class="d-flex align-items-stretch flex-shrink-0">
                            <!--begin::Toolbar wrapper-->
                            <div class="d-flex align-items-stretch flex-shrink-0">
                                <!--begin::Quick links-->
                                <div class="d-flex align-items-center ms-1 ms-lg-3">
                                    <!--begin::Menu wrapper-->
                                    <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                                         data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                         data-kt-menu-placement="bottom-end">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                        <span class="svg-icon svg-icon-1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
														<rect x="2" y="2" width="9" height="9" rx="2" fill="black"/>
														<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
                                                              fill="black"/>
														<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
                                                              fill="black"/>
														<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
                                                              fill="black"/>
													</svg>
												</span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column w-250px w-lg-325px"
                                         data-kt-menu="true">
                                        <!--begin::Heading-->
                                        <div class="d-flex flex-column flex-center bgi-no-repeat rounded-top px-9 py-10"
                                             style="background-image:url('assets/media/misc/pattern-1.jpg')">
                                            <!--begin::Title-->
                                            <h3 class="text-white fw-bold mb-3">Quick Links</h3>
                                            <!--end::Title-->
                                            <!--begin::Status-->
                                            <span class="badge bg-primary py-2 px-3">25 pending tasks</span>
                                            <!--end::Status-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin:Nav-->
                                        <div class="row g-0">
                                            <!--begin:Item-->
                                            <div class="col-6">
                                                <a href="../../demo1/dist/pages/projects/budget.html"
                                                   class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
                                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin009.svg-->
                                                    <span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                     height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3"
                                                                          d="M15.8 11.4H6C5.4 11.4 5 11 5 10.4C5 9.80002 5.4 9.40002 6 9.40002H15.8C16.4 9.40002 16.8 9.80002 16.8 10.4C16.8 11 16.3 11.4 15.8 11.4ZM15.7 13.7999C15.7 13.1999 15.3 12.7999 14.7 12.7999H6C5.4 12.7999 5 13.1999 5 13.7999C5 14.3999 5.4 14.7999 6 14.7999H14.8C15.3 14.7999 15.7 14.2999 15.7 13.7999Z"
                                                                          fill="black"/>
																	<path
                                                                        d="M18.8 15.5C18.9 15.7 19 15.9 19.1 16.1C19.2 16.7 18.7 17.2 18.4 17.6C17.9 18.1 17.3 18.4999 16.6 18.7999C15.9 19.0999 15 19.2999 14.1 19.2999C13.4 19.2999 12.7 19.2 12.1 19.1C11.5 19 11 18.7 10.5 18.5C10 18.2 9.60001 17.7999 9.20001 17.2999C8.80001 16.8999 8.49999 16.3999 8.29999 15.7999C8.09999 15.1999 7.80001 14.7 7.70001 14.1C7.60001 13.5 7.5 12.8 7.5 12.2C7.5 11.1 7.7 10.1 8 9.19995C8.3 8.29995 8.79999 7.60002 9.39999 6.90002C9.99999 6.30002 10.7 5.8 11.5 5.5C12.3 5.2 13.2 5 14.1 5C15.2 5 16.2 5.19995 17.1 5.69995C17.8 6.09995 18.7 6.6 18.8 7.5C18.8 7.9 18.6 8.29998 18.3 8.59998C18.2 8.69998 18.1 8.69993 18 8.79993C17.7 8.89993 17.4 8.79995 17.2 8.69995C16.7 8.49995 16.5 7.99995 16 7.69995C15.5 7.39995 14.9 7.19995 14.2 7.19995C13.1 7.19995 12.1 7.6 11.5 8.5C10.9 9.4 10.5 10.6 10.5 12.2C10.5 13.3 10.7 14.2 11 14.9C11.3 15.6 11.7 16.1 12.3 16.5C12.9 16.9 13.5 17 14.2 17C15 17 15.7 16.8 16.2 16.4C16.8 16 17.2 15.2 17.9 15.1C18 15 18.5 15.2 18.8 15.5Z"
                                                                        fill="black"/>
																</svg>
															</span>
                                                    <!--end::Svg Icon-->
                                                    <span class="fs-5 fw-bold text-gray-800 mb-0">Accounting</span>
                                                    <span class="fs-7 text-gray-400">eCommerce</span>
                                                </a>
                                            </div>
                                            <!--end:Item-->
                                            <!--begin:Item-->
                                            <div class="col-6">
                                                <a href="../../demo1/dist/pages/projects/settings.html"
                                                   class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-bottom">
                                                    <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                                                    <span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                     height="24" viewBox="0 0 24 24" fill="none">
																	<path
                                                                        d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z"
                                                                        fill="black"/>
																	<path opacity="0.3"
                                                                          d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z"
                                                                          fill="black"/>
																</svg>
															</span>
                                                    <!--end::Svg Icon-->
                                                    <span class="fs-5 fw-bold text-gray-800 mb-0">Administration</span>
                                                    <span class="fs-7 text-gray-400">Console</span>
                                                </a>
                                            </div>
                                            <!--end:Item-->
                                            <!--begin:Item-->
                                            <div class="col-6">
                                                <a href="../../demo1/dist/pages/projects/list.html"
                                                   class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end">
                                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
                                                    <span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                     height="24" viewBox="0 0 24 24" fill="none">
																	<path
                                                                        d="M18 21.6C16.6 20.4 9.1 20.3 6.3 21.2C5.7 21.4 5.1 21.2 4.7 20.8L2 18C4.2 15.8 10.8 15.1 15.8 15.8C16.2 18.3 17 20.5 18 21.6ZM18.8 2.8C18.4 2.4 17.8 2.20001 17.2 2.40001C14.4 3.30001 6.9 3.2 5.5 2C6.8 3.3 7.4 5.5 7.7 7.7C9 7.9 10.3 8 11.7 8C15.8 8 19.8 7.2 21.5 5.5L18.8 2.8Z"
                                                                        fill="black"/>
																	<path opacity="0.3"
                                                                          d="M21.2 17.3C21.4 17.9 21.2 18.5 20.8 18.9L18 21.6C15.8 19.4 15.1 12.8 15.8 7.8C18.3 7.4 20.4 6.70001 21.5 5.60001C20.4 7.00001 20.2 14.5 21.2 17.3ZM8 11.7C8 9 7.7 4.2 5.5 2L2.8 4.8C2.4 5.2 2.2 5.80001 2.4 6.40001C2.7 7.40001 3.00001 9.2 3.10001 11.7C3.10001 15.5 2.40001 17.6 2.10001 18C3.20001 16.9 5.3 16.2 7.8 15.8C8 14.2 8 12.7 8 11.7Z"
                                                                          fill="black"/>
																</svg>
															</span>
                                                    <!--end::Svg Icon-->
                                                    <span class="fs-5 fw-bold text-gray-800 mb-0">Projects</span>
                                                    <span class="fs-7 text-gray-400">Pending Tasks</span>
                                                </a>
                                            </div>
                                            <!--end:Item-->
                                            <!--begin:Item-->
                                            <div class="col-6">
                                                <a href="../../demo1/dist/pages/projects/users.html"
                                                   class="d-flex flex-column flex-center h-100 p-6 bg-hover-light">
                                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                                    <span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                     height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3"
                                                                          d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                                                          fill="black"/>
																	<path
                                                                        d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                                                                        fill="black"/>
																</svg>
															</span>
                                                    <!--end::Svg Icon-->
                                                    <span class="fs-5 fw-bold text-gray-800 mb-0">Customers</span>
                                                    <span class="fs-7 text-gray-400">Latest cases</span>
                                                </a>
                                            </div>
                                            <!--end:Item-->
                                        </div>
                                        <!--end:Nav-->
                                        <!--begin::View more-->
                                        <div class="py-2 text-center border-top">
                                            <a href="../../demo1/dist/pages/profile/activity.html"
                                               class="btn btn-color-gray-600 btn-active-color-primary">View All
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                <span class="svg-icon svg-icon-5">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="18" y="13" width="13" height="2"
                                                                  rx="1" transform="rotate(-180 18 13)" fill="black"/>
															<path
                                                                d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                                fill="black"/>
														</svg>
													</span>
                                                <!--end::Svg Icon--></a>
                                        </div>
                                        <!--end::View more-->
                                    </div>
                                    <!--end::Menu-->
                                    <!--end::Menu wrapper-->
                                </div>
                                <!--end::Quick links-->
                                <!--begin::User-->
                                <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                                    <!--begin::Menu wrapper-->
                                    <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                                         data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                         data-kt-menu-placement="bottom-end">
                                        <img src="assets/media/avatars/blank.png" alt="user"/>
                                    </div>
                                    <!--begin::Menu-->
                                    <div
                                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content d-flex align-items-center px-3">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-50px me-5">
                                                    <img alt="Logo" src="assets/media/avatars/150-26.jpg"/>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Username-->
                                                <div class="d-flex flex-column">
                                                    <div class="fw-bolder d-flex align-items-center fs-5">Max Smith
                                                        <span
                                                            class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span>
                                                    </div>
                                                    <a href="#" class="fw-bold text-muted text-hover-primary fs-7">max@kt.com</a>
                                                </div>
                                                <!--end::Username-->
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a href="../../demo1/dist/account/overview.html" class="menu-link px-5">My
                                                Profile</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a href="../../demo1/dist/pages/projects/list.html" class="menu-link px-5">
                                                <span class="menu-text">My Projects</span>
                                                <span class="menu-badge">
															<span
                                                                class="badge badge-light-danger badge-circle fw-bolder fs-7">3</span>
														</span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5" data-kt-menu-trigger="hover"
                                             data-kt-menu-placement="left-start">
                                            <a href="#" class="menu-link px-5">
                                                <span class="menu-title">My Subscription</span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <!--begin::Menu sub-->
                                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="../../demo1/dist/account/referrals.html"
                                                       class="menu-link px-5">Referrals</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="../../demo1/dist/account/billing.html"
                                                       class="menu-link px-5">Billing</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="../../demo1/dist/account/statements.html"
                                                       class="menu-link px-5">Payments</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="../../demo1/dist/account/statements.html"
                                                       class="menu-link d-flex flex-stack px-5">Statements
                                                        <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                           data-bs-toggle="tooltip"
                                                           title="View your statements"></i></a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator my-2"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3">
                                                        <label
                                                            class="form-check form-switch form-check-custom form-check-solid">
                                                            <input class="form-check-input w-30px h-20px"
                                                                   type="checkbox" value="1" checked="checked"
                                                                   name="notifications"/>
                                                            <span
                                                                class="form-check-label text-muted fs-7">Notifications</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu sub-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a href="../../demo1/dist/account/statements.html" class="menu-link px-5">My
                                                Statements</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5" data-kt-menu-trigger="hover"
                                             data-kt-menu-placement="left-start">
                                            <a href="#" class="menu-link px-5">
														<span class="menu-title position-relative">Language
														<span
                                                            class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English
														<img class="w-15px h-15px rounded-1 ms-2"
                                                             src="assets/media/flags/united-states.svg" alt=""/></span></span>
                                            </a>
                                            <!--begin::Menu sub-->
                                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="../../demo1/dist/account/settings.html"
                                                       class="menu-link d-flex px-5 active">
															<span class="symbol symbol-20px me-4">
																<img class="rounded-1"
                                                                     src="assets/media/flags/united-states.svg" alt=""/>
															</span>English</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="../../demo1/dist/account/settings.html"
                                                       class="menu-link d-flex px-5">
															<span class="symbol symbol-20px me-4">
																<img class="rounded-1"
                                                                     src="assets/media/flags/spain.svg" alt=""/>
															</span>Spanish</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="../../demo1/dist/account/settings.html"
                                                       class="menu-link d-flex px-5">
															<span class="symbol symbol-20px me-4">
																<img class="rounded-1"
                                                                     src="assets/media/flags/germany.svg" alt=""/>
															</span>German</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="../../demo1/dist/account/settings.html"
                                                       class="menu-link d-flex px-5">
															<span class="symbol symbol-20px me-4">
																<img class="rounded-1"
                                                                     src="assets/media/flags/japan.svg" alt=""/>
															</span>Japanese</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="../../demo1/dist/account/settings.html"
                                                       class="menu-link d-flex px-5">
															<span class="symbol symbol-20px me-4">
																<img class="rounded-1"
                                                                     src="assets/media/flags/france.svg" alt=""/>
															</span>French</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu sub-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5 my-1">
                                            <a href="../../demo1/dist/account/settings.html" class="menu-link px-5">Account
                                                Settings</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a href="../../demo1/dist/authentication/flows/basic/sign-in.html"
                                               class="menu-link px-5">Sign Out</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <div class="menu-content px-5">
                                                <label
                                                    class="form-check form-switch form-check-custom form-check-solid pulse pulse-success"
                                                    for="kt_user_menu_dark_mode_toggle">
                                                    <input class="form-check-input w-30px h-20px" type="checkbox"
                                                           value="1" name="mode" id="kt_user_menu_dark_mode_toggle"
                                                           data-kt-url="../../demo1/dist/index.html"/>
                                                    <span class="pulse-ring ms-n1"></span>
                                                    <span class="form-check-label text-gray-600 fs-7">Dark Mode</span>
                                                </label>
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
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
                            <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                        </li>
                        <li class="menu-item">
                            <a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a>
                        </li>
                        <li class="menu-item">
                            <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
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

<script>var hostUrl = "assets/";</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->

<!--end::Global Javascript Bundle-->
<!--end::Javascript-->
</html>
