<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PageController;



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

Route::get('/', [AppController::class, 'home'])->name('/');

Route::get('/category/{slug}', [AppController::class, 'category']);

Route::get('/product/{slug}', [AppController::class, 'product']);

Route::get('/Page/{slug}',[PageController::class,'viewWebpage'])->name('page');	


Route::get('shop-grid-right',function(){
    return view('shop-grid-right');
});

Route::get('/contact-us', function () {
    return view('page-contact');
})->name('contact-us');



Route::get('/checkout',[CheckOutController::class,'checkOut'])->name('checkout');


Route::post('/add-payment',[PaymentController::class,'addPayment'])->name('add-payment');

Route::get('hash',function(){
	
	return bcrypt(12345678);
});



Route::get('/admin/login', function () {
return view('admin.login');	
});
Route::post('login', [LoginController::class,'login'])->name('login');

Route::post('/insert-qout', [ProductsController::class, 'insertQuot'])->name('insert-qout');


Route::middleware(['Checkadmin'])->group(function () {
Route::get('/paperadmin', function () {
		return redirect('paperadmin/dashboard');
})->name('dashboard');


Route::get('/paperadmin/logout',[LoginController::class, 'logout']);

Route::get('/paperadmin/forgot-password', function () {
    return view('admin/forgot-password');
});


	
// Dashboard Page


Route::get('/paperadmin/dashboard', function () {
		return view('admin/dashboard');
})->name('dashboard');
	
	Route::get('/paperadmin/viewPage/{id}',[PageController::class,'viewPage'])->name('view-page');	
		Route::get('/paperadmin/add_page',[PageController::class,'newPage'])->name('new-page');	
	Route::post('/paperadmin/store_page',[PageController::class,'store'])->name('store_page');
	Route::get('/paperadmin/delete_page/{id}',[PageController::class,'deletePage'])->name('delete_page');	
	
	
	Route::post('/update_page',[PageController::class,'updatePage'])->name('update_page');



// Products Page

Route::get('/paperadmin/all-payment',[PaymentController::class,'allPayments'])->name('all-payment');

Route::get('/paperadmin/products', [ProductsController::class, 'products']);

Route::get('/paperadmin/products/add', [ProductsController::class, 'add']);

Route::post('/paperadmin/products/add-product', [ProductsController::class, 'add_product']);
	
Route::post('/paperadmin/products/update-product', [ProductsController::class, 'update_product']);

Route::get('/paperadmin/products/delete/{id}', [ProductsController::class, 'delete']);
	

Route::get('/paperadmin/size/delete/{id}', [ProductsController::class, 'delete_size']);

Route::get('/paperadmin/color/delete/{id}', [ProductsController::class, 'delete_color']);
	

Route::get('/paperadmin/products/detail/{id}', [ProductsController::class, 'detail']);
	
	
Route::get('/paperadmin/size/edit/{id}', [ProductsController::class, 'showsize']);

		
Route::get('/paperadmin/products/edit/{id}', [ProductsController::class, 'show']);

// Categories

Route::get('/paperadmin/categories', [CategoriesController::class, 'categories']);

Route::get('/paperadmin/categories/add', [CategoriesController::class, 'add']);

Route::post('/paperadmin/categories/add-category', [CategoriesController::class, 'add_category']);

Route::get('/paperadmin/categories/delete/{id}', [CategoriesController::class, 'delete']);

Route::get('/paperadmin/send/quot/{id}', [PaymentController::class, 'resendquotation']);
	
Route::get('/paperadmin/delete/quot/{id}', [PaymentController::class, 'deleteQuotaion']);
	
Route::get('/paperadmin/categories/edit/{id}', [CategoriesController::class, 'edit']);

Route::post('/paperadmin/categories/update', [CategoriesController::class, 'update']);
// Customers
Route::get('/paperadmin/admin-customers',[CustomerController::class,'viewAllCustomer'])->name('admin-customers');
Route::get('/paperadmin/admin-orders',[CustomerController::class,'viewAllorders'])->name('admin-orders');

Route::get('admin-sizes',[ProductsController::class,'adminMultiSizes'])->name('admin-sizes');

Route::get('admin-colours',[ProductsController::class,'adminMultiColors'])->name('admin-colours');

Route::post('admin-add-multi-sizes',[ProductsController::class,'addProductSizes'])->name('admin-add-multi-sizes');

Route::post('admin-add-multi-colors',[ProductsController::class,'addProductColors'])->name('admin-add-multi-colors');

Route::get('/paperadmin/customers', function () {
    return view('admin/customers');
});

});
