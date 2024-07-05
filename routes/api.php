<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZayavkaController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\LangController;
use App\Http\Controllers\Api\OtziviController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\PortfolioController;
use App\Http\Controllers\Api\PortfolioCategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductCategoryController;
use App\Http\Controllers\Api\SertificateController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\ServicController;
use App\Http\Controllers\Api\TranslationController;
use App\Http\Controllers\Api\ServiceCategoryController;
use App\Http\Controllers\Api\UserController;


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
//Route::get('zayavkas', [ZayavkaController::class, 'index']);
//Route::post('zayavkas', [ZayavkaController::class, 'store']);
//Route::get('zayavkas/{id}', [ZayavkaController::class, 'show']);
//Route::put('zayavkas/{id}', [ZayavkaController::class, 'update']);
//Route::delete('zayavkas/{id}', [ZayavkaController::class, 'destroy']);
// Route::get('posts/categories', [ApiController::class, "categories"])->name('post_category');
// Route::get('product/categories', [ApiController::class, "product_category"])->name('product_category');
// Route::get('portfolio/categories', [ApiController::class, "portfolio_category"])->name('portfolio_category');
// Route::get('service/categories', [ApiController::class, "service_category"])->name('service_category');

// Route::get('/categories', [ApiController::class, "categories"]);






Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{id}', [CategoryController::class, 'show']);

Route::get('faqs', [FaqController::class, 'index']);
Route::get('faqs/{id}', [FaqController::class, 'show']);

Route::get('banners', [GalleryController::class, 'index']);
Route::get('banners/{id}', [GalleryController::class, 'show']);

// Route::apiResource('categories', CategoryController::class);
// Route::apiResource('faqs', FaqController::class);
// Route::apiResource('galleries', GalleryController::class);
Route::apiResource('groups', GroupController::class);
Route::apiResource('langs', LangController::class);
Route::apiResource('otzivis', OtziviController::class);
Route::apiResource('partners', PartnerController::class);
Route::apiResource('portfolios', PortfolioController::class);
Route::apiResource('portfolio-categories', PortfolioCategoryController::class);
Route::apiResource('posts', PostController::class);
Route::apiResource('products', ProductController::class);
Route::get('product/category', [ProductController::class,'filter']);
Route::get('portfolio/category', [PortfolioController::class,'filter']);
Route::get('post/category', [PostController::class,'filter']);
Route::get('service/category', [PostController::class,'filter']);
Route::apiResource('product-categories', ProductCategoryController::class);
Route::apiResource('sertificate', SertificateController::class);
Route::apiResource('services', ServicController::class);
Route::apiResource('service-categories', ServiceCategoryController::class);
Route::apiResource('teams', TeamController::class);
Route::apiResource('translations', TranslationController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('zayavkas', ZayavkaController::class);


