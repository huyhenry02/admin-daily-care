<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CleanerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('auth.showLogin');
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.showLogin');
    Route::post('/post_login', [AuthController::class, 'postLogin'])->name('auth.post_login');
    Route::get('/logout', [AuthController::class, 'postLogout'])->name('auth.postLogout');
});

Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth'
], function () {
    Route::group([
        'prefix' => 'account'
    ], function () {
        Route::get('/', [AccountController::class, 'showIndex'])->name('account.showIndex');
        Route::get('/create', [AccountController::class, 'showCreate'])->name('account.showCreate');
        Route::get('/update', [AccountController::class, 'showUpdate'])->name('account.showUpdate');
        Route::get('/detail', [AccountController::class, 'showDetail'])->name('account.showDetail');
    });

    Route::group([
        'prefix' => 'advertisement'
    ], function () {
        Route::get('/', [AdvertisementController::class, 'showIndex'])->name('advertisement.showIndex');
        Route::get('/create', [AdvertisementController::class, 'showCreate'])->name('advertisement.showCreate');
        Route::get('/update/{advertisement}', [AdvertisementController::class, 'showUpdate'])->name('advertisement.showUpdate');

        Route::post('/create', [AdvertisementController::class, 'postCreate'])->name('advertisement.postCreate');
        Route::post('/update/{advertisement}', [AdvertisementController::class, 'putAdvertisement'])->name('advertisement.putAdvertisement');
        Route::get('/delete/{advertisement}', [AdvertisementController::class, 'delete'])->name('advertisement.delete');

    });

    Route::group([
        'prefix' => 'cleaner'
    ], function () {
        Route::get('/', [CleanerController::class, 'showIndex'])->name('cleaner.showIndex');
        Route::get('/contract', [CleanerController::class, 'showIndexContract'])->name('cleaner.showIndexContract');
        Route::get('/create', [CleanerController::class, 'showCreate'])->name('cleaner.showCreate');
        Route::get('/update/{cleaner}', [CleanerController::class, 'showUpdate'])->name('cleaner.showUpdate');
        Route::get('/detail/{cleaner}', [CleanerController::class, 'showDetail'])->name('cleaner.showDetail');

        Route::post('/create', [CleanerController::class, 'postCreate'])->name('cleaner.postCreate');
        Route::post('/put/{cleaner}', [CleanerController::class, 'putEditCleaner'])->name('cleaner.putEditCleaner');
        Route::post('/create-contract', [CleanerController::class, 'postCreateContract'])->name('cleaner.postCreateContract');
        Route::post('/update-contract', [CleanerController::class, 'putEditContract'])->name('cleaner.putEditContract');
        Route::get('/delete/{contract}', [CleanerController::class, 'deleteContract'])->name('cleaner.deleteContract');

    });

    Route::group([
        'prefix' => 'customer'
    ], function () {
        Route::get('/', [CustomerController::class, 'showIndex'])->name('customer.showIndex');
        Route::get('/create', [CustomerController::class, 'showCreate'])->name('customer.showCreate');
        Route::get('/update', [CustomerController::class, 'showUpdate'])->name('customer.showUpdate');
        Route::get('/detail/{customer}', [CustomerController::class, 'showDetail'])->name('customer.showDetail');
    });

    Route::group([
        'prefix' => 'order'
    ], function () {
        Route::get('/', [OrderController::class, 'showIndex'])->name('order.showIndex');
        Route::get('/complain-customer', [OrderController::class, 'showComplainCustomer'])->name('order.showComplainCustomer');
        Route::get('/complain-cleaner', [OrderController::class, 'showComplainCleaner'])->name('order.showComplainCleaner');
        Route::get('/complain-detail/{complaint}', [OrderController::class, 'showDetailComplaint'])->name('order.showDetailComplaint');
        Route::get('/create', [OrderController::class, 'showCreate'])->name('order.showCreate');
        Route::get('/update', [OrderController::class, 'showUpdate'])->name('order.showUpdate');
        Route::get('/detail/{order}', [OrderController::class, 'showDetail'])->name('order.showDetail');
    });
    Route::group([
        'prefix' => 'service'
    ], function () {
        Route::get('/', [ServiceController::class, 'showIndex'])->name('service.showIndex');
        Route::get('/create', [ServiceController::class, 'showCreate'])->name('service.showCreate');
        Route::get('/update', [ServiceController::class, 'showUpdate'])->name('service.showUpdate');
        Route::get('/detail', [ServiceController::class, 'showDetail'])->name('service.showDetail');

        Route::post('/create', [ServiceController::class, 'postCreate'])->name('service.postCreate');
        Route::get('/delete/{service}', [ServiceController::class, 'delete'])->name('service.delete');
    });
    Route::group([
        'prefix' => 'report'
    ], function () {
        Route::get('/customer', [ReportController::class, 'showReportCustomer'])->name('report.showReportCustomer');
        Route::get('/order', [ReportController::class, 'showReportOrder'])->name('report.showReportOrder');
        Route::get('/revenue', [ReportController::class, 'showReportRevenue'])->name('report.showReportRevenue');
    });

});
