<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', 'WelcomeController');
Route::get('logout', [\App\Http\Controllers\UserController::class, 'logout']);

/*
 *  USER
 */

Route::resource('user', 'UserController');

Route::get('login', [\App\Http\Controllers\UserController::class, 'login']);
Route::post('auth', [\App\Http\Controllers\UserController::class, 'auth']);
Route::get('users', [\App\Http\Controllers\UserController::class, 'liste']);
Route::get('users', [\App\Http\Controllers\UserController::class, 'liste']);

/*
 *  SECURITE
 */


Route::resource('securite-service', 'SecuriteServiceController');
Route::get('securite-service-liste', [\App\Http\Controllers\SecuriteServiceController::class, 'liste']);

Route::resource('saisie', 'SaisieHSController');
Route::get('saisie-liste', [\App\Http\Controllers\SaisieHSController::class, 'liste']);

Route::resource('materiel', 'SecuriteMaterielController');
Route::get('materiel-liste', [\App\Http\Controllers\SecuriteMaterielController::class, 'liste']);

Route::resource('maincourante', 'SecuriteMaincouranteController');
Route::get('maincourante-liste', [\App\Http\Controllers\SecuriteMaincouranteController::class, 'liste']);
Route::get('maincourante-synthese', [\App\Http\Controllers\SecuriteMaincouranteController::class, 'synthesesListe']);

Route::get('maincourante-departcentreliste', [\App\Http\Controllers\SecuriteMaincouranteController::class, 'departCentreListe']);
Route::get('maincourante-departcentre/{id}/edit', [\App\Http\Controllers\SecuriteMaincouranteController::class, 'editDepartCentre']);
Route::delete('maincourante-departcentre/{id}', [\App\Http\Controllers\SecuriteMaincouranteController::class, 'deleteDepartCentre']);
Route::patch('maincourante-departcentre/{id}', [\App\Http\Controllers\SecuriteMaincouranteController::class, 'updatedepartCentre']);

Route::get('maincourante-arriveesiteliste', [\App\Http\Controllers\SecuriteMaincouranteController::class, 'arriveeSiteListe']);
Route::get('maincourante-arriveesiteliste/{id}/edit', [\App\Http\Controllers\SecuriteMaincouranteController::class, 'editArriveeSite']);
Route::delete('maincourante-arriveesiteliste/{id}', [\App\Http\Controllers\SecuriteMaincouranteController::class, 'deleteArriveeSite']);
Route::patch('maincourante-arriveesiteliste/{id}', [\App\Http\Controllers\SecuriteMaincouranteController::class, 'updateArriveeColis']);

Route::get('maincourante-departsiteliste', [\App\Http\Controllers\SecuriteMaincouranteController::class, 'departSiteListe']);
Route::get('maincourante-departsite/{id}/edit', [\App\Http\Controllers\SecuriteMaincouranteController::class, 'editDepartSite']);
Route::delete('maincourante-departsite/{id}', [\App\Http\Controllers\SecuriteMaincouranteController::class, 'deleteDepartSite']);
Route::patch('maincourante-departsite/{id}', [\App\Http\Controllers\SecuriteMaincouranteController::class, 'updateDepartSite']);

Route::get('maincourante-arriveecentreliste', [\App\Http\Controllers\SecuriteMaincouranteController::class, 'arriveeCentreListe']);
Route::get('maincourante-arriveecentre/{id}/edit', [\App\Http\Controllers\SecuriteMaincouranteController::class, 'editArriveeCentre']);
Route::delete('maincourante-arriveecentre/{id}', [\App\Http\Controllers\SecuriteMaincouranteController::class, 'deleteArriveeCentre']);
Route::patch('maincourante-arriveecentre/{id}', [\App\Http\Controllers\SecuriteMaincouranteController::class, 'updateArriveeCentre']);

Route::get('search', 'SecuriteMaincouranteController@search')->name('search');
Route::get('deleteDepartSite', 'SecuriteMaincouranteController@deleteDepartSite')->name('deleteDepartSite');


/*
 * TRANSPORT
 */

Route::resource('vehicule', 'VehiculeController');
Route::get('vehicule-liste', [\App\Http\Controllers\VehiculeController::class, 'liste']);

Route::resource('depart-tournee', 'DepartTourneeController');
Route::get('depart-tournee-liste', [\App\Http\Controllers\DepartTourneeController::class, 'liste']);

Route::resource('arrivee-tournee', 'ArriveeTourneeController');
Route::resource('entretien-vehicule', 'EntretienVehiculeController');

Route::resource('vidange-generale', 'VidangeGeneraleController');
Route::resource('vidange-pont', 'VidangePontController');
Route::resource('vidange-courroie', 'VidangeCourroieController');
Route::resource('vidange-vignette', 'VidangeVignetteController');
Route::resource('vidange-transport', 'VidangeTransportController');
Route::resource('vidange-assurance', 'VidangeAssuranceController');
Route::resource('vidange-patente', 'VidangePatenteController');
Route::resource('vidange-visite', 'VidangeVisiteController');
Route::resource('vidange-stationnement', 'VidangeStationnementController');

Route::resource('ticket-carburant', 'CarburantTicketController');
Route::get('ticket-carburant-liste', [\App\Http\Controllers\CarburantTicketController::class, 'liste']);
Route::resource('carburant-comptant', 'CarburantComptantController');
Route::get('carburant-comptant-liste', [\App\Http\Controllers\CarburantComptantController::class, 'liste']);
Route::resource('carburant-prevision', 'CarburantPrevisionController');

Route::resource('etat-bordereau', 'EtatBordereauController');
Route::get('etat-bordereau-tournee-sur-periode', [\App\Http\Controllers\EtatBordereauController::class, 'tourneeSurPeriode']);
Route::get('etat-bordereau-sur-periode', [\App\Http\Controllers\EtatBordereauController::class, 'surPeriode']);
Route::get('etat-bordereau-rentabilite-tournee', [\App\Http\Controllers\EtatBordereauController::class, 'rentabiliteTournee']);
Route::get('etat-bordereau-par-site', [\App\Http\Controllers\EtatBordereauController::class, 'parSite']);
Route::get('etat-bordereau-par-client', [\App\Http\Controllers\EtatBordereauController::class, 'parClient']);
Route::get('etat-bordereau-par-vehicule', [\App\Http\Controllers\EtatBordereauController::class, 'parVehicule']);
Route::get('etat-bordereau-par-convoyeur', [\App\Http\Controllers\EtatBordereauController::class, 'parConvoyeur']);
Route::get('etat-bordereau-fond-transporte', [\App\Http\Controllers\EtatBordereauController::class, 'fondTransport']);

Route::get('heure-supp-recap', [\App\Http\Controllers\HeureSuppController::class, 'recap']);
Route::get('heure-supp-detaille', [\App\Http\Controllers\HeureSuppController::class, 'detaille']);

Route::resource('conteneur', 'ConteneurController');
Route::get('conteneur-liste', [\App\Http\Controllers\ConteneurController::class, 'liste']);


/*
 * COMMERCIAL
 */

Route::resource('commercial-client', 'CommercialClientController');
Route::get('commercial-client-liste', [\App\Http\Controllers\CommercialClientController::class, 'liste']);

Route::resource('commercial-site', 'CommercialSiteController');
Route::get('commercial-site-liste', [\App\Http\Controllers\CommercialSiteController::class, 'liste']);

/*
 * RH
 */

Route::resource('personnel', 'PersonnelController');
Route::get('personnel-liste', [\App\Http\Controllers\PersonnelController::class, 'liste']);
Route::resource('convoyeur', 'ConvoyeurController');
Route::get('convoyeur-liste', [\App\Http\Controllers\ConvoyeurController::class, 'liste']);

/*
 * CAISSE CENTRALE
 */

Route::resource('caisse-service', 'CaisseServiceController');
Route::get('caisse-service-liste', [\App\Http\Controllers\CaisseServiceController::class, 'liste']);
Route::resource('ctv', 'CaisseCtvController');
Route::get('ctv-liste', [\App\Http\Controllers\CaisseCtvController::class, 'liste']);
Route::resource('caisse-entree-colis', 'CaisseEntreeColisController');
Route::get('caisse-entree-colis-liste', [\App\Http\Controllers\CaisseEntreeColisController::class, 'liste']);
Route::resource('caisse-sortie-colis', 'CaisseSortieColisController');
Route::get('caisse-sortie-colis-liste', [\App\Http\Controllers\CaisseSortieColisController::class, 'liste']);
Route::resource('caisse-video-surveillance', 'CaisseVideoSurveillanceController');
Route::get('caisse-video-surveillance-liste', [\App\Http\Controllers\CaisseVideoSurveillanceController::class, 'liste']);


/*
 * LOGISTIQUE
 */

Route::resource('carte-carburant', 'CarburantCarteController');
Route::get('carte-carburant-liste', [\App\Http\Controllers\CarburantCarteController::class, 'liste']);

Route::resource('carb-chargement-ticket', 'CarburantChargementTicketController');
Route::get('carb-chargement-ticket-create', [\App\Http\Controllers\CarburantChargementTicketController::class, 'create']);

Route::get('carb-chargement', [\App\Http\Controllers\CarburantChargementTicketController::class, 'carbCharg']);
Route::get('carb-ticket', [\App\Http\Controllers\CarburantChargementTicketController::class, 'carbTicket']);
Route::get('carb-vehicule', [\App\Http\Controllers\CarburantChargementTicketController::class, 'carbVehicule']);
Route::get('etat-carburant', [\App\Http\Controllers\CarburantChargementTicketController::class, 'etatCarburant']);

Route::resource('logistique-fournisseur', 'LogistiqueFournisseurController');
Route::get('logistique-fournisseur-liste', [\App\Http\Controllers\LogistiqueFournisseurController::class, 'liste']);

Route::resource('logistique-produit', 'LogistiqueProduitController');
Route::get('logistique-produit-liste', [\App\Http\Controllers\LogistiqueProduitController::class, 'liste']);

Route::resource('logistique-entree-stock', 'LogistiqueEntreeStockController');
Route::get('logistique-entree-stock-liste', [\App\Http\Controllers\LogistiqueEntreeStockController::class, 'liste']);

Route::get('logistique-etat-bordereau-utilise', [\App\Http\Controllers\LogistiqueEtatBordereauController::class, 'index']);

Route::resource('logistique-sortie-stock', 'LogistiqueSortieStockController');
Route::get('logistique-sortie-stock-liste', [\App\Http\Controllers\LogistiqueSortieStockController::class, 'liste']);
Route::get('logistique-etat-stock', [\App\Http\Controllers\LogistiqueEtatStockController::class, 'index']);

Route::resource('logistique-entree-bordereau', 'LogistiqueEntreeBordereauController');
Route::get('logistique-entree-bordereau-liste', [\App\Http\Controllers\LogistiqueEntreeBordereauController::class, 'liste']);

Route::resource('logistique-sortie-bordereau', 'LogistiqueSortieBordereauController');
Route::get('logistique-sortie-bordereau-liste', [\App\Http\Controllers\LogistiqueSortieBordereauController::class, 'liste']);

Route::resource('logistique-entree-securipack', 'LogistiqueEntreeSecuripackController');
Route::get('logistique-entree-securipack-liste', [\App\Http\Controllers\LogistiqueEntreeSecuripackController::class, 'liste']);
Route::get('logistique-entree-securipack-recherche', [\App\Http\Controllers\LogistiqueEntreeSecuripackController::class, 'rechercher']);

Route::resource('logistique-sortie-securipack', 'LogistiqueSortieSecuripackController');
Route::get('logistique-sortie-securipack-liste', [\App\Http\Controllers\LogistiqueSortieSecuripackController::class, 'liste']);

Route::resource('logistique-entree-carnet', 'LogistiqueEntreeCarnetController');
Route::get('logistique-entree-carnet-liste', [\App\Http\Controllers\LogistiqueEntreeCarnetController::class, 'liste']);

Route::resource('logistique-sortie-carnet', 'LogistiqueSortieCarnetController');
Route::get('logistique-sortie-carnet-liste', [\App\Http\Controllers\LogistiqueSortieCarnetController::class, 'liste']);

Route::resource('logistique-entree-maintenance', 'LogistiqueEntreeMaintenanceController');
Route::get('logistique-entree-maintenance-liste', [\App\Http\Controllers\LogistiqueEntreeMaintenanceController::class, 'liste']);

Route::resource('logistique-sortie-maintenance', 'LogistiqueSortieMaintenanceController');
Route::get('logistique-sortie-maintenance-liste', [\App\Http\Controllers\LogistiqueSortieMaintenanceController::class, 'liste']);

Route::resource('logistique-entree-approvision', 'LogistiqueEntreeApprovisionController');
Route::get('logistique-entree-approvision-liste', [\App\Http\Controllers\LogistiqueEntreeApprovisionController::class, 'liste']);

Route::resource('logistique-sortie-approvision', 'LogistiqueSortieApprovisionController');
Route::get('logistique-sortie-approvision-liste', [\App\Http\Controllers\LogistiqueSortieApprovisionController::class, 'liste']);

Route::resource('logistique-entree-bon-commande', 'LogistiqueEntreeBonController');
Route::get('logistique-entree-bon-commande-liste', [\App\Http\Controllers\LogistiqueEntreeBonController::class, 'liste']);

Route::resource('logistique-sortie-bon-commande', 'LogistiqueSortieBonController');
Route::get('logistique-sortie-bon-commande-liste', [\App\Http\Controllers\LogistiqueSortieBonController::class, 'liste']);

Route::resource('logistique-entree-ticket', 'LogistiqueEntreeTicketController');
Route::get('logistique-entree-ticket-liste', [\App\Http\Controllers\LogistiqueEntreeTicketController::class, 'liste']);

Route::resource('logistique-sortie-ticket', 'LogistiqueSortieTicketController');
Route::get('logistique-sortie-ticket-liste', [\App\Http\Controllers\LogistiqueSortieTicketController::class, 'liste']);


/*
 * ACHAT
 */

Route::resource('achat-fournisseur', 'AchatFournisseurController');
Route::get('achat-fournisseur-liste', [\App\Http\Controllers\AchatFournisseurController::class, 'liste']);

Route::resource('achat-demande', 'AchatDemandeController');
Route::get('achat-demande-liste', [\App\Http\Controllers\AchatDemandeController::class, 'liste']);

Route::resource('achat-bon', 'AchatBonController');
Route::get('achat-bon-liste', [\App\Http\Controllers\AchatBonController::class, 'liste']);

Route::get('achat-suivi', [\App\Http\Controllers\AchatSuiviController::class, 'liste']);

Route::resource('achat-produit', 'AchatProduitController');
Route::get('achat-produit-liste', [\App\Http\Controllers\AchatProduitController::class, 'liste']);


Route::get('achat-recherche-par-produit', [\App\Http\Controllers\AchatProduitController::class, 'rechercheParProduit']);
Route::get('achat-recherche-par-budget', [\App\Http\Controllers\AchatProduitController::class, 'rechercheParBudget']);
Route::get('achat-recherche-par-centre', [\App\Http\Controllers\AchatProduitController::class, 'rechercheParCentre']);
Route::get('achat-recherche-par-service', [\App\Http\Controllers\AchatProduitController::class, 'rechercheParService']);

/*
 * COMPTABILITE
 */

Route::resource('comptabilite-fature', 'ComptabiliteFactureController');
Route::get('comptabilite-fature-liste', [\App\Http\Controllers\ComptabiliteFactureController::class, 'liste']);

Route::resource('comptabilite-reglement-fature', 'ComptabiliteReglementFactureController');
Route::get('comptabilite-reglement-fature-liste', [\App\Http\Controllers\ComptabiliteReglementFactureController::class, 'liste']);

Route::resource('comptabilite-entree-caisse', 'ComptabiliteEntreeCaisseController');
Route::get('comptabilite-entree-caisse-liste', [\App\Http\Controllers\ComptabiliteEntreeCaisseController::class, 'liste']);

Route::resource('comptabilite-sortie-caisse', 'ComptabiliteSortieCaisseController');
Route::get('comptabilite-sortie-caisse-liste', [\App\Http\Controllers\ComptabiliteSortieCaisseController::class, 'liste']);

Route::resource('comptabilite-degradation', 'ComptabiliteDegradationController');
Route::get('comptabilite-degradation-liste', [\App\Http\Controllers\ComptabiliteDegradationController::class, 'liste']);

Route::get('comptabilite-etat-client-periode', [\App\Http\Controllers\ComptabiliteEtatController::class, 'clientPeriode']);
Route::get('comptabilite-etat-facturation-client', [\App\Http\Controllers\ComptabiliteEtatController::class, 'facturationClient']);
Route::get('comptabilite-etat-facturation-globale', [\App\Http\Controllers\ComptabiliteEtatController::class, 'facturationGlobale']);
Route::get('comptabilite-etat-fond-facturation', [\App\Http\Controllers\ComptabiliteEtatController::class, 'fondFacturation']);
Route::get('comptabilite-etat-fond-par-client', [\App\Http\Controllers\ComptabiliteEtatController::class, 'fondParClient']);
Route::get('comptabilite-etat-solde-caisse', [\App\Http\Controllers\ComptabiliteEtatController::class, 'soldeCaisse']);
Route::get('comptabilite-etat-securite-tournee', [\App\Http\Controllers\ComptabiliteEtatController::class, 'securiteTournee']);
Route::get('comptabilite-etat-tracabilite', [\App\Http\Controllers\ComptabiliteEtatController::class, 'tracabilite']);

/*
 * REGULATION
 */

Route::resource('regulation-service', 'RegulationServiceController');
Route::get('regulation-service-liste', [\App\Http\Controllers\RegulationServiceController::class, 'liste']);

Route::resource('regulation-bordereau', 'RegulationBordereauController');
Route::get('regulation-bordereau-liste', [\App\Http\Controllers\RegulationBordereauController::class, 'liste']);

Route::resource('regulation-securipack', 'RegulationSecuripackController');
Route::get('regulation-securipack-liste', [\App\Http\Controllers\RegulationSecuripackController::class, 'liste']);

Route::resource('regulation-scelle', 'RegulationScelleController');
Route::get('regulation-scelle-liste', [\App\Http\Controllers\RegulationScelleController::class, 'liste']);

Route::resource('regulation-confirmation', 'RegulationConfirmationController');
Route::get('regulation-confirmation-liste', [\App\Http\Controllers\RegulationConfirmationController::class, 'liste']);

Route::resource('regulation-facturation', 'RegulationFacturationController');
Route::get('regulation-facturation-liste', [\App\Http\Controllers\RegulationFacturationController::class, 'liste']);

Route::get('regulation-etat-securipack-utilise', [\App\Http\Controllers\RegulationEtatController::class, 'securipackUtilise']);
Route::get('regulation-etat-securipack-vendu', [\App\Http\Controllers\RegulationEtatController::class, 'securipackVendu']);

Route::get('regulation-etat-scelle-utilise', [\App\Http\Controllers\RegulationEtatController::class, 'scelleUtilise']);
Route::get('regulation-etat-scelle-vendu', [\App\Http\Controllers\RegulationEtatController::class, 'scelleVendu']);

Route::resource('regulation-depart-tournee', 'RegulationDepartTourneeController');
Route::get('regulation-depart-tournee-liste', [\App\Http\Controllers\RegulationDepartTourneeController::class, 'liste']);

Route::resource('regulation-stock-entree', 'RegulationStockEntreeController');
Route::get('regulation-stock-entree-liste', [\App\Http\Controllers\RegulationStockEntreeController::class, 'liste']);

Route::resource('regulation-stock-sortie', 'RegulationStockEntreeController');
Route::get('regulation-stock-stock-liste', [\App\Http\Controllers\RegulationStockEntreeController::class, 'liste']);


/*
 * VIRGILOMETREIE
 */

Route::resource('virgilometrie', 'VirgilometrieController');
Route::get('virgilometrie-liste', [\App\Http\Controllers\VirgilometrieController::class, 'liste']);

/*
 * INFORMATIQUE
 */

Route::resource('informatique-achat-materiel', 'InformatiqueMaterielController');
Route::get('informatique-achat-materiel-liste', [\App\Http\Controllers\InformatiqueMaterielController::class, 'liste']);

Route::resource('informatique-mission', 'InformatiqueMissionController');
Route::get('informatique-mission-liste', [\App\Http\Controllers\InformatiqueMissionController::class, 'liste']);

Route::resource('informatique-maintenance', 'InformatiqueOperationMaintenanceController');
Route::get('informatique-maintenance-liste', [\App\Http\Controllers\InformatiqueOperationMaintenanceController::class, 'liste']);

Route::resource('informatique-fournisseur', 'InformatiqueFournisseurController');
Route::get('informatique-fournisseur-liste', [\App\Http\Controllers\InformatiqueFournisseurController::class, 'liste']);

/*
 * SSB
 */
Route::resource('ssb', 'SSBController');
Route::get('ssb-liste', [\App\Http\Controllers\SSBController::class, 'liste']);

Route::resource('ssb-commercial', 'SsbCommercialController');
Route::get('ssb-commercial-liste', [\App\Http\Controllers\SsbCommercialController::class, 'liste']);

Route::resource('ssb-site', 'SsbSiteController');
Route::get('ssb-site-liste', [\App\Http\Controllers\SsbSiteController::class, 'liste']);
