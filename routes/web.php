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

// Service
Route::resource('securite-service', 'SecuriteServiceController');
Route::get('securite-service-liste', [\App\Http\Controllers\SecuriteServiceController::class, 'liste']);

/*
 * Route Transport
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
Route::resource('carburant-comptant', 'CarburantComptantController');
Route::resource('carburant-prevision', 'CarburantPrevisionController');

/*
 * Commercial
 */
Route::resource('commercial-client', 'CommercialClientController');
Route::get('commercial-client', [\App\Http\Controllers\CommercialClientController::class, 'liste']);

Route::resource('commercial-site', 'CommercialSiteController');

/*
 * LOGISTIQUE
 */

Route::resource('carte-carburant', 'CarburantCarteController');
Route::resource('carb-chargement-ticket', 'CarburantChargementTicketController');
