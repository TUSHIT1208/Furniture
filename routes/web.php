<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::get("/",[TemplateController::class,"index"]);
Route::get("/shop",[TemplateController::class,"shop"]);
Route::get("/about",[TemplateController::class,"about"]);
Route::get("/blog",[TemplateController::class,"blog"]);
Route::get("/cart",[TemplateController::class,"cart"]);
Route::get("/checkout",[TemplateController::class,"checkout"]);
Route::get("/thankyou",[TemplateController::class,"thanks"]);
Route::get("/login",[TemplateController::class,"login"]);
Route::post("/check",[TemplateController::class,"check_login"]);
Route::get("/dash",[TemplateController::class,"dash"]);

Route::resource("client",ClientController::class);
Route::get("/logout",[ClientController::class,'logout']);

Route::resource("category",CategoryController::class);

Route::resource("product",ProductController::class);

Route::post('/cart/store/{id}', [CartController::class, 'store'])   ;
Route::post('/removecart/{id}', [CartController::class, 'remove_cart']);
Route::resource("addcart", CartController::class)->except(['store']);

Route::post("/storewishlist/{id}",[WishlistController::class,"store"]);
Route::post("/remove_wishlist/{id}",[WishlistController::class,"remove_wishlist"]);
Route::resource('addwishlist', WishlistController::class);


