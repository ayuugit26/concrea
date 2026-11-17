<?php
use App\Http\Controllers\{HomeController, EnquiryController, CatalogController};
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/collection/{category:slug}', [CatalogController::class, 'category'])->name('category.show');
Route::get('/pieces/{product:slug}', [CatalogController::class, 'product'])->name('product.show');

Route::post('/enquiry', [EnquiryController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('enquiry.store');