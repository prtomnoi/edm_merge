<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers as AppController;
use App\Http\Controllers\Backend as Backend;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');

});
Route::resource('news-activity', AppController\NewsController::class);

Route::prefix('edm-media')->group(function () {
    Route::resource('benefit', AppController\BenefitController::class);
    Route::resource('vtuber-community', AppController\CommunityController::class);
    Route::resource('influencer', AppController\InfluencerController::class);
    Route::resource('branding', AppController\BrandingController::class);
    Route::resource('our-campaign', AppController\OurController::class);
    Route::resource('contact-us', AppController\ContactController::class);
    Route::get('/index', function (){
        // return view('edm-media/index');
        return redirect()->route('branding.index');
    });
});

Route::prefix('edm-management')->group(function () {
    Route::get('/index', function (){
        return view('edm-management.index');
    });
    Route::resource('our-work', AppController\edm_management\OurController::class);
});


// ADMIN
Route::get('/test-connection', function () {
    try {
        DB::connection()->getPdo();
        return "Database connection is successful!";
    } catch (\Exception $e) {
        return "Database connection failed: " . $e->getMessage();
    }
});


// Route::get('/', function () { return view('login'); });
Route::get('/admin', [Backend\LoginController::class, 'getLogin']);
Route::post('/admin', [Backend\LoginController::class, 'postLogin']);
Route::get('logout', [Backend\LoginController::class, 'logOut'])->name('logOut');
// Route::get('regis', [LoginController::class, 'createDummy']);

Route::group(['prefix' => 'admin', 'middleware' => ['Admin']], function () {

    Route::get('/index' , [Backend\HomeController::class , 'index'])->name('admin.home');
    Route::post('/uploadimage_text', [Backend\FunctionController::class, 'uploadimage_text'])->name('upload');
    //== News
    Route::resource('/news' , Backend\NewsController::class);
    Route::get('/news/status/{id}', [Backend\NewsController::class, 'status'])->where(['id' => '[0-9]+']);
    //== Influencer
    Route::resource('/influencer' , Backend\InfluencerController::class);
    Route::get('/influencer/status/{id}', [Backend\InfluencerController::class, 'status'])->where(['id' => '[0-9]+']);
    //== Campaign
    Route::resource('/campaign' , Backend\CampaignController::class);
    Route::get('/campaign/status/{id}', [Backend\CampaignController::class, 'status'])->where(['id' => '[0-9]+']);
    //== Account
    Route::resource('/account' , Backend\AccountController::class);

    //== VTuber Gallery
    Route::resource('/vtuber-gallery', Backend\VTuberGalleryController::class);
    Route::get('/vtuber-gallery/status/{id}', [Backend\VTuberGalleryController::class, 'status'])->where(['id' => '[0-9]+']);

      //== Branding Gallery
      Route::resource('/branding-gallery', Backend\BrandingGalleryController::class);
      Route::get('/branding-gallery/status/{id}', [Backend\BrandingGalleryController::class, 'status'])->where(['id' => '[0-9]+']);

      //== InfluencerVideo
      Route::resource('/influencer-video', Backend\InfluencerVideoController::class);
      Route::get('/influencer-video/status/{id}', [Backend\InfluencerVideoController::class, 'status'])->where(['id' => '[0-9]+']);

      //== VTuberVideo
      Route::resource('/vtuber-video', Backend\VtuberVideoController::class);
      Route::get('/vtuber-video/status/{id}', [Backend\VtuberVideoController::class, 'status'])->where(['id' => '[0-9]+']);

      Route::resource('table-settings', Backend\TableSettingController::class);

      Route::resource('groups', Backend\GroupController::class);

      Route::resource('portfolios', Backend\PortfolioController::class);
      Route::get('/portfolios/status/{id}', [Backend\PortfolioController::class, 'status'])->where(['id' => '[0-9]+']);

      Route::get('/load-api-data', Backend\ApiController::class);

      Route::resource('portfolio-items', Backend\PortfolioItemController::class);
      Route::get('/portfolio-items/status/{id}', [Backend\PortfolioItemController::class, 'status'])->where(['id' => '[0-9]+']);
      Route::get('portfolio-items-image/{id}', [Backend\PortfolioItemController::class , 'delete_image'])->where(['id' => '[0-9]+']);

});
