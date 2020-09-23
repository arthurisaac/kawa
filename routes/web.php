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

Route::get('/', function () {
    return view('welcome');
});

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
Route::get('search', 'SecuriteMaincouranteController@search')->name('search');
Route::get('deleteDepartSite', 'SecuriteMaincouranteController@deleteDepartSite')->name('deleteDepartSite');


/*
 * TRANSPORT
 */

Route::resource('vehicule', 'VehiculeController');
Route::get('vehicule-liste', [\App\Http\Controllers\VehiculeController::class, 'liste']);

Route::resource('depart-tournee', 'DepartTourneeController');
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
 * LOGISTIQUE
 */

Route::resource('carte-carburant', 'CarburantCarteController');
Route::resource('carb-chargement-ticket', 'CarburantChargementTicketController');

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
