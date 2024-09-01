<?php

use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductDiscountController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Vender\VenderMainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'rolemanager:customer'])->name('dashboard');

//admin route
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function() {
        Route::controller(AdminMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('admin');
            Route::get('/settings', 'setting')->name('admin.setting');
            Route::get('/manage/user', 'manage_user')->name('admin.manage.user');
            Route::get('/manage/stores', 'manage_stores')->name('admin.manage.stores');
            Route::get('/cart/history', 'cart_history')->name('admin.cart.history');
            Route::get('/order/history', 'order_history')->name('admin.order.history');
        });



        Route::controller(CategoryController::class)->group(function () {
            Route::get('/category/create', 'index')->name('category.create');
            Route::get('/category/manage', 'manage')->name('category.manage');
       
        });

        
        Route::controller(SubCategoryController::class)->group(function () {
            Route::get('/Subcategory/create', 'index')->name('Subcategory.create');
            Route::get('/Subcategory/manage', 'manage')->name('Subcategory.manage');
       
        });

        Route::controller(ProductController::class)->group(function () {
            Route::get('/Product/manage_product_preview', 'index')->name('Product.manage');
            Route::get('/Product/manage', 'manage')->name('Product.review.manage');
       
        });

        Route::controller(ProductAttributeController::class)->group(function () {
            Route::get('/product_attribute/create', 'index')->name('Productattribute.create');
            Route::get('/product_attribute/manage', 'review_manage')->name('Productattribute.manage');
       
        });

        Route::controller(ProductDiscountController::class)->group(function () {
            Route::get('/discount/create', 'index')->name('discount.create');
            Route::get('/discount/manage', 'review_manage')->name('discount.manage');
       
        });


        Route::controller(PaymentController::class)->group(function () {
            Route::get('/payment/add', 'index')->name('payment.add');
            Route::get('/payment/manage', 'payment_manage')->name('payment.manage');
       
        });
    });
  
});
    
  

    


//Vender route
Route::middleware(['auth', 'verified', 'rolemanager:vender'])->group(function () {
    Route::prefix('seller')->group(function() {
        Route::controller(SellerMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('seller');
            
        });



        
    });
  
});
    


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
