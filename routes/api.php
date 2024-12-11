<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers as AppController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\CampaignController;
use App\Http\Controllers\Api\InfluencerController;
use App\Http\Controllers\Api\VtuberGalleryController;
use App\Http\Controllers\Api\BrandingGalleryController;
use App\Http\Controllers\Api\EiPortfolioController;
use App\Http\Controllers\Api\VtuberVideoController;
use App\Http\Controllers\Api\InfluencerVideoController;
use App\Http\Controllers\Api\PortfolioController;
use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\PortfolioItemController;
use App\Http\Controllers\Api\TableSettingsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// contract us
Route::resource('contact_centers', AppController\ContactCenterController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//ADMIN
Route::get('/', function(){
    return response()->json([
        'success' => true,
        'message' => 'WELCOME TO EDM API',
        'current_data' => date('Y-m-d H:i:s'),
    ],200);
});
Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{id}', [NewsController::class, 'show']);
Route::get('/news-limit/{limit}', [NewsController::class, 'indexLimit']);
Route::get('/news-pin', [NewsController::class, 'pin']);
Route::get('/news-top', [NewsController::class, 'top']);
Route::get('/news/provider/{id}', [NewsController::class, 'provider']);
Route::get('/campaigns', [CampaignController::class, 'index']);
Route::get('/campaigns-top', [CampaignController::class, 'top']);
Route::get('/campaigns-limit/{id}', [CampaignController::class, 'limit']);
Route::get('/campaigns/{id}', [CampaignController::class, 'show']);
Route::get('/influencers', [InfluencerController::class, 'index']);
Route::get('/influencers/{id}', [InfluencerController::class, 'show']);
Route::get('/influencers-limit/{limit}', [InfluencerController::class, 'showLimit']);
Route::get('/influencers-random', [InfluencerController::class, 'random']);
Route::get('/influencers-type/{type}', [InfluencerController::class, 'showBytype']);
Route::get('/influencers-pin', [InfluencerController::class, 'showPin']);
Route::get('/vtuber-gallery', [VtuberGalleryController::class, 'index']);
Route::get('/vtuber-gallery/{id}', [VtuberGalleryController::class, 'show']);
Route::get('/branding-gallery', [BrandingGalleryController::class, 'index']);
Route::get('/branding-gallery/{id}', [BrandingGalleryController::class, 'show']);
Route::get('/vtuber-video', [VtuberVideoController::class, 'index']);
Route::get('/vtuber-video/{id}', [VtuberVideoController::class, 'show']);
Route::get('/influencer-video', [InfluencerVideoController::class, 'index']);
Route::get('/influencer-video/{id}', [InfluencerVideoController::class, 'show']);
Route::get('/portfolios', [PortfolioController::class, 'index']);
Route::get('/portfolios-group/{id}', [PortfolioController::class, 'group']);
Route::get('/groups', [GroupController::class, 'index']);
Route::get('/portfolio-items', [PortfolioItemController::class, 'index']);
Route::get('/portfolio-items/{id}', [PortfolioItemController::class, 'show']);
Route::get('/portfolio-items-limit/{limit}', [PortfolioItemController::class, 'indexLimit']);
Route::get('/portfolio-items-top', [PortfolioItemController::class, 'top']);

Route::get('/settings', [TableSettingsController::class, 'index']);
Route::get('/settings/{id}', [TableSettingsController::class, 'show']);

Route::get('/ei-portfolio', [EiPortfolioController::class, 'index']);
Route::get('/ei-portfolio/{id}', [EiPortfolioController::class, 'show']);
Route::get('/ei-portfolio-limit/{limit}', [EiPortfolioController::class, 'indexLimit']);

