 <?php
use Illuminate\Http\Request;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductCategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\QoutController;
use App\Http\Controllers\API\ProductPriceController;
use App\Http\Controllers\API\ProductSizesController;
use App\Http\Controllers\API\ProductColorController;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => 'v1'
], function () {
    Route::post('/login',[AuthController::class,"login"])->name('login');
    Route::post('/signup',[AuthController::class,"signup"])->name('signup');
    Route::get('/email/verify/{id}',[VerificationController::class,"verify"])->name('verification.verify');
    Route::get('email/resend', [VerificationController::class,"resend"])->name('verification.resend');
    Route::post('/forgot',[AuthController::class,"forgot"])->name('forgot');
    Route::post('/password/reset',[AuthController::class,"reset_password"]);
    Route::post('/otp_validate',[AuthController::class,"otp_validate"])->name('otp_validate');


    Route::post('insert-categories',[ProductCategoryController::class,'insertCategories'])->name('insert-categories ');
	Route::get('product-categories',[ProductCategoryController::class,'getCategories'])->name('product-categories');
	
	Route::post('product-by-categories',[ProductCategoryController::class,'getProductByCategory'])->name('product-by-categories');

	Route::post('/add-quotation',[QoutController::class,"insertQuot"])->name('add-quotation');  	
	
	
	Route::get('/all-quotation',[QoutController::class,"allQutations"])->name('all-quotation');  


	Route::get('/all-product',[ProductController::class,"allProducts"])->name('all-product');
	Route::post('/product-details',[ProductController::class,"productDetails"])->name('product-details');  
    

  Route::group(['middleware' => 'auth:api'], function(){
    Route::post('/logout',[AuthController::class,"logout"])->name('logout');
    Route::post('/user',[AuthController::class,"user"])->name('user');
    Route::post('/update_user',[AuthController::class,"update_user"])->name('update_user');
    Route::post('/update_user_status',[AuthController::class,"update_user_status"])->name('update_user_status');
    Route::post('/update_status',[AuthController::class,"update_status"])->name('update_status');
    Route::post('/all_user',[AuthController::class,"all_user"])->name('all_user');
    Route::post('/update_password',[AuthController::class,"update_password"])->name('update_password');   
    Route::post('/delete_user_permanent',[AuthController::class,"delete_user_permanent"])->name('delete_user_permanent');   
	  
    Route::post('/insert-product',[ProductController::class,"insertProduct"])->name('insert-product');
	  Route::post('/update-product',[ProductController::class,"updateProduct"])->name('update-product');
	  
    Route::post('/insert-product-prices',[ProductPriceController::class,"addPrices"])->name('insert-product-prices'); 
	  
    Route::post('/insert-product-sizes',[ProductSizesController::class,"addProductSizes"])->name('insert-product-sizes');   
	  
    Route::get('/all-product-sizes',[ProductSizesController::class,"allSizes"])->name('insert-product-sizes');   

    Route::post('/insert-product-colors',[ProductColorController::class,"insertColor"])->name('insert-product-colors');    

    Route::get('/all-product-colors',[ProductColorController::class,"allColors"])->name('all-product-colors'); 


    	Route::post('/resend-quotation',[QoutController::class,"resendQutation"])->name('resend-quotation');  	

    



});
});