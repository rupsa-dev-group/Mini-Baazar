<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use  App\Http\Controllers\Admin\McategoryController;
use App\Http\Controllers\Admin\ScategoryController;
use App\Http\Controllers\Admin\SscategoryController;
use App\Http\Controllers\Admin\ProductoptionsController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ManufacturerController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StateController;


// Route::get('/', function () {
//   return view('admin.dashboard');
// });

Route::middleware(['auth', 'admin'])->group(function () {

  Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('dashboard.index');

  Route::group(['prefix' => 'maincategories'], function () {
    Route::get('/', [McategoryController::class, 'index'])->name('maincategories.views');
    Route::match(array('GET', 'POST'), '/add', [McategoryController::class, 'add_views'])->name('maincategories.addadd_views');
    Route::match(array('GET', 'POST'), '/add/{id}', [McategoryController::class, 'add_views']);
    Route::post('/save', [McategoryController::class, 'save'])->name('maincategories.save');
    Route::post('/status_update', [McategoryController::class, 'status_update']);
    Route::post('/mcategory_delete', [McategoryController::class, 'mcategory_delete']);
  });


  Route::group(['prefix' => 'subcategories'], function () {


    Route::get('/', [ScategoryController::class, 'index']);
    Route::match(array('GET', 'POST'), '/add', [ScategoryController::class, 'add_views']);
    Route::match(array('GET', 'POST'), '/add/{id}', [ScategoryController::class, 'add_views']);
    Route::post('/save', [ScategoryController::class, 'save'])->name('subcategories.save');

    Route::post('/status_update', [ScategoryController::class, 'status_update']);
    Route::post('/mcategory_delete', [ScategoryController::class, 'mcategory_delete']);

  });


  Route::group(['prefix' => 'subsubcategories'], function () {

    Route::get('/', [SscategoryController::class, 'index']);
    Route::match(array('GET', 'POST'), '/add', [SscategoryController::class, 'add_views']);
    Route::match(array('GET', 'POST'), '/onchange_category', [SscategoryController::class, 'onchange_category']);
    Route::match(array('GET', 'POST'), '/add/{id}', [SscategoryController::class, 'add_views']);
    Route::post('/save', [SscategoryController::class, 'save'])->name('subsubcategories.save');

    Route::post('/status_update', [SscategoryController::class, 'status_update']);
    Route::post('/sscategory_delete', [SscategoryController::class, 'sscategory_delete']);
  });


  Route::group(['prefix' => 'options'], function () {
    Route::get('/', [ProductoptionsController::class, 'index']);
    Route::match(array('GET', 'POST'), '/add', [ProductoptionsController::class, 'add_views']);
    Route::match(array('GET', 'POST'), '/add/{id}', [ProductoptionsController::class, 'add_views']);
    Route::post('/save', [ProductoptionsController::class, 'save'])->name('option.save');
    Route::post('/status_update', [ProductoptionsController::class, 'status_update']);
    Route::post('/option_delete', [ProductoptionsController::class, 'option_delete']);

  });


  Route::group(['prefix' => 'coupon'], function () {
    Route::get('/', [CouponController::class, 'index']);
    Route::match(array('GET', 'POST'), '/add', [CouponController::class, 'add_views']);
    Route::match(array('GET', 'POST'), '/add/{id}', [CouponController::class, 'add_views']);
    Route::post('/save', [CouponController::class, 'save'])->name('coupon.save');
    Route::post('/status_update', [CouponController::class, 'status_update']);
    Route::post('/coupon_delete', [CouponController::class, 'coupon_delete']);
  });



  Route::group(['prefix' => 'manufacturer'], function () {

    Route::get('/', [ManufacturerController::class, 'index']);
    Route::match(array('GET', 'POST'), '/add', [ManufacturerController::class, 'add_views']);
    Route::match(array('GET', 'POST'), '/add/{id}', [ManufacturerController::class, 'add_views']);
    Route::post('/save', [ManufacturerController::class, 'save'])->name('manufacturer.save');
    Route::post('/status_update', [ManufacturerController::class, 'status_update']);
    Route::post('/manufacturer_delete', [ManufacturerController::class, 'manufacturer_delete']);

  });


  Route::group(['prefix' => 'country'], function () {


    Route::get('/add', function () {

    });


    Route::get('/', [CountryController::class, 'index'])->name('country.views');
    Route::match(array('GET', 'POST'), '/add', [CountryController::class, 'add_views'])->name('country.addadd_views');
    Route::match(array('GET', 'POST'), '/add/{id}', [CountryController::class, 'add_views']);
    Route::post('/save', [CountryController::class, 'save'])->name('country.save');
    Route::post('/status_update', [CountryController::class, 'status_update']);
    Route::post('/country_delete', [CountryController::class, 'country_delete']);

  });




  Route::group(['prefix' => 'state'], function () {
    // StateController
    Route::get('/', [StateController::class, 'index'])->name('state.views');
    Route::match(array('GET', 'POST'), '/add', [StateController::class, 'add_views'])->name('state.addadd_views');
    Route::match(array('GET', 'POST'), '/add/{id}', [StateController::class, 'add_views']);
    Route::post('/save', [StateController::class, 'save'])->name('state.save');
    Route::post('/status_update', [StateController::class, 'status_update']);
    Route::post('/state_delete', [StateController::class, 'state_delete']);

  });

  Route::group(['prefix' => 'shipping'], function () {


    Route::get('/add', function () {
      return view('admin.system.shipping.addshipping');
    });

  });

  //   Admin Login

  Route::get('/admin', function () {
    return view('admin.login.login');
  });


  Route::get('admin/manage-product',[ProductController::class,'manageProduct'])->name('manage_product');
  Route::get('admin/add-product',[ProductController::class,'addProduct'])->name('add_product');


  // payment gateway

  Route::get('/payment_gateway', function () {
    return view('admin.system.paymentgateway.payment_gateway');
  });

});


