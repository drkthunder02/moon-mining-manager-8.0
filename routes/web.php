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

// Login pages.
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/admin', function () {
    return view('admin-login');
})->name('admin-login');

// Public list of upcoming mining timers.
Route::middleware(['login'])->prefix('timers')->group(function () {
    Route::get('/', 'TimerController@home');
    Route::post('/claim/{claim}/{refinery}', 'TimerController@claim');
    Route::get('/clear/{claim}/{refinery}', 'TimerController@clear');
});

// Search interface.
Route::get('/search', 'SearchController@search');

// Admin interface home.
Route::get('/', 'AppController@home')->middleware('admin');

// Access management.
Route::middleware(['admin'])->prefix('access')->group(function () {
    Route::get('/', 'AppController@showAuthorisedUsers');
    //Route::get('/new', 'AppController@showUserAccessHistory');
    Route::post('/admin/{id}', 'AppController@makeUserAdmin');
    Route::post('/whitelist/{id}', 'AppController@whitelistUser');
    Route::post('/blacklist/{id}', 'AppController@blacklistUser');
    Route::post('/toggle-form-mail/{id}', 'AppController@toggleFormMail');
});

// Reports.
Route::middleware(['admin'])->prefix('reports')->group(function () {
    Route::get('/{year?}/{month?}', 'ReportsController@main')->where([
        'year' => '[0-9]{4}',
        'month' => '[0-9]{2}'
    ]);
    Route::get('/fix', 'ReportsController@fix');
    Route::get('/regenerate', 'ReportsController@regenerate');
});

// Miner reporting.
Route::middleware(['admin'])->prefix('miners')->group(function () {
    Route::get('/', 'MinerController@showMiners');
    Route::get('/{id}', 'MinerController@showMinerDetails');
});

// Renter management.
Route::middleware(['admin'])->prefix('renters')->group(function () {
    Route::get('/', 'RenterController@showRenters');
    Route::get('/expired', 'RenterController@showExpiredRenters');
    Route::get('/new', 'RenterController@addNewRenter');
    Route::post('/new', 'RenterController@saveNewRenter');
    Route::get('/{id}', 'RenterController@editRenter');
    Route::post('/{id}', 'RenterController@updateRenter');
    Route::get('/refinery/{id}', 'RenterController@refineryDetails');
    Route::get('/character/{id}', 'RenterController@renterDetails');
});

// Public list of available moons.
Route::middleware(['login'])->prefix('moons')->group(function () {
    Route::get('/', 'MoonController@index');
});

// Contact form
Route::middleware(['login'])->prefix('contact-form')->group(function () {
    Route::get('/', 'ContactFormController@index');
    Route::post('/', 'ContactFormController@send');
});

// Moon composition importer.
Route::middleware(['admin'])->prefix('moon-admin')->group(function () {
    Route::get('/list', 'MoonAdminController@index');
    Route::post('/update-status', 'MoonAdminController@updateStatus');
    Route::get('/', 'MoonAdminController@admin');
    Route::post('/import', 'MoonAdminController@import');
    Route::post('/import_survey_data', 'MoonAdminController@importSurveyData');
    Route::get('/export', 'MoonAdminController@export');
    Route::get('/calculate', 'MoonAdminController@calculate');
});

Route::middleware(['admin'])->prefix('extractions')->group(function () {
    Route::get('/', 'ExtractionsController@index');
});

// Payment management.
Route::middleware(['admin'])->prefix('payment')->group(function () {
    Route::get('/', 'PaymentController@listManualPayments');
    Route::get('/new', 'PaymentController@addNewPayment');
    Route::post('/new', 'PaymentController@insertNewPayment');
});

// Tax management.
Route::middleware(['admin'])->prefix('taxes')->group(function () {
    Route::get('/', 'TaxController@showTaxRates');
    Route::get('/history', 'TaxController@showHistory');
    Route::post('/update_value/{id}', 'TaxController@updateValue');
    Route::post('/update_rate/{id}', 'TaxController@updateTaxRate');
    Route::post('/update_master_rate', 'TaxController@updateMasterTaxRate');
    //Route::get('/load', 'TaxController@loadInitialTaxRates');
});

// Email template management.
Route::middleware(['admin'])->prefix('emails')->group(function () {
    Route::get('/', 'EmailController@showEmails');
    Route::post('/update', 'EmailController@updateEmails');
});

// Handle EVE SSO requests and callbacks.
Route::get('/sso', 'Auth\AuthController@redirectToProvider');
Route::get('/admin-sso', 'Auth\AuthController@redirectToProviderForAdmin');
Route::get('/callback', 'Auth\AuthController@handleProviderCallback');

// Logout.
Route::get('/logout', 'AppController@logout');
