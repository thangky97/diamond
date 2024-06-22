<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Client\HomeController@index')->name('route_FrontEnd_Home');
Route::get('/search', 'Client\HomeController@search')->name('route_FrontEnd_Search');
Route::get('/products', 'Client\ShopController@index')->name('route_FrontEnd_Product');
Route::get('/products/detail/{id}', 'Client\ShopController@detail')->name('route_FrontEnd_Product_Detail');
Route::get('/product-category/{id}', 'Client\ShopController@cate')->name('route_FrontEnd_Category');

Route::get('/contact', 'Client\ContactController@index')->name('route_FrontEnd_Contact');
Route::post('/contact', 'Client\ContactController@create')->name('route_FrontEnd_Contact_Create');

Route::get('/about', 'Client\AboutUsController@index')->name('route_FrontEnd_About');

Route::get('/doi-tra', 'Client\DoiTraController@index')->name('route_FrontEnd_Doi_Tra');
Route::get('/bao-hanh', 'Client\BaoHanhController@index')->name('route_FrontEnd_Bao_Hanh');
Route::get('/thanh-vien', 'Client\ThanhVienController@index')->name('route_FrontEnd_Thanh_Vien');
Route::get('/van-chuyen', 'Client\VanChuyenController@index')->name('route_FrontEnd_Van_Chuyen');
Route::get('/mua-hang', 'Client\MuaHangController@index')->name('route_FrontEnd_Mua_Hang');
Route::get('/bao-quan', 'Client\BaoQuanController@index')->name('route_FrontEnd_Bao_Quan');

Route::post('/createComment/{id?}', 'Client\CommentController@createComment')->name('createComment');
Route::delete('/comment/delete/{comment}', 'Client\CommentController@commentDelete')->name('commentDelete');

//them vao gio hang
Route::post('/add-cart', 'Client\CartController@addCart')->name('route_FrontEnd_Add_Cart');
//hien thi gio hang
Route::get('/cart', 'Client\CartController@index')->name('route_FrontEnd_Cart');
//delete 1 or all product in cart
Route::get('/cart/delete/{id}', 'Client\CartController@cartDelete')->name('cartDelete');
Route::get('/cart/cartDeleteAll', 'Client\CartController@cartDeleteAll')->name('cartDeleteAll');

Route::get('/checkout', 'Client\CheckoutController@index')->name('route_FrontEnd_Checkout');
Route::post('/create-checkout', 'Client\CheckoutController@checkout')->name('route_FrontEnd_Create_Checkout');

//login client
Route::get('/login-user', 'Client\LoginController@index')->name('route_FrontEnd_Login');
Route::post('/login-user', 'Client\LoginController@post')->name('route_FrontEnd_Login_Post');
Route::get('/register-user', 'Client\RegisterController@getRegister')->name('getRegister');
Route::post('/register-user', 'Client\RegisterController@postRegister')->name('postRegister');

//logout client
Route::get('/logout-user', ['as' => 'logout-user', 'uses' => 'Client\LoginController@getLogout'])->middleware('auth');

//login admin
Route::middleware('guest')->group(function () {
    Route::get('/login', 'Auth\LoginController@getLogin')->name('getLogin');
    Route::post('/login', 'Auth\LoginController@postLogin')->name('postLogin');
});

//logout admin
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@getLogout'])->middleware('auth');

Route::prefix('admin')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/dashboard', 'Admin\DashboardController@index')->name('route_BackEnd_Dashboard');
        Route::get('/export', 'Admin\DashboardController@export')->name('route_BackEnd_Dashboard_Export');
        Route::get('/export-order', 'Admin\DashboardController@exportOrder')->name('route_BackEnd_Dashboard_Export_Order');

        Route::prefix('/profile')->group(function () {
            Route::get('/edit/{id}', 'Admin\ProfileController@edit')->name('route_BackEnd_Profile_Edit');
            Route::post('/update/{id}', 'Admin\ProfileController@update')->name('route_BackEnd_Profile_Update');
            Route::post('/updatePassword/{id}', 'Admin\ProfileController@update_password')->name('route_BackEnd_Admin_Update_Password');
        });

        Route::prefix('/users')->group(function () {
            Route::get('/', 'Admin\CustomerController@index')->name('route_BackEnd_Customers_List');
            Route::match(['get', 'post'], '/create', 'Admin\CustomerController@create')->name('route_BackEnd_Customers_Create');
            Route::get('/edit/{id}', 'Admin\CustomerController@edit')->name('route_BackEnd_Customers_Edit');
            Route::post('/update/{id}', 'Admin\CustomerController@update')->name('route_BackEnd_Customers_Update');
            Route::get('/remove/{id}', 'Admin\CustomerController@remove')->name('route_BackEnd_Customers_Remove');
        });

        Route::prefix('/products')->group(function () {
            Route::get('/', 'Admin\ProductController@index')->name('route_BackEnd_Products_List');
            Route::match(['get', 'post'], '/create', 'Admin\ProductController@create')->name('route_BackEnd_Products_Create');
            Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('route_BackEnd_Products_Edit');
            Route::post('/update/{id}', 'Admin\ProductController@update')->name('route_BackEnd_Products_Update');
            Route::get('/remove/{id}', 'Admin\ProductController@remove')->name('route_BackEnd_Products_Remove');
        });

        Route::prefix('/category_product')->group(function () {
            Route::get('/', 'Admin\CategoryProductController@index')->name('route_BackEnd_Category_Product_List');
            Route::match(['get', 'post'], '/create', 'Admin\CategoryProductController@create')->name('route_BackEnd_Category_Product_Create');
            Route::get('/edit/{id}', 'Admin\CategoryProductController@edit')->name('route_BackEnd_Category_Product_Edit');
            Route::post('/update/{id}', 'Admin\CategoryProductController@update')->name('route_BackEnd_Category_Product_Update');
            Route::get('/remove/{id}', 'Admin\CategoryProductController@remove')->name('route_BackEnd_Category_Product_Remove');
        });

        Route::prefix('/warranty')->group(function () {
            Route::get('/', 'Admin\WarrantyController@index')->name('route_BackEnd_Warranty_List');
            Route::match(['get', 'post'], '/create', 'Admin\WarrantyController@create')->name('route_BackEnd_Warranty_Create');
            Route::get('/edit/{id}', 'Admin\WarrantyController@edit')->name('route_BackEnd_Warranty_Edit');
            Route::post('/update/{id}', 'Admin\WarrantyController@update')->name('route_BackEnd_Warranty_Update');
        });

        Route::prefix('/order')->group(function () {
            Route::get('/', 'Admin\OrderController@index')->name('route_BackEnd_Orders_List');
            Route::get('/edit/{id}', 'Admin\OrderController@edit')->name('route_BackEnd_Orders_Edit');
            Route::post('/update/{id}', 'Admin\OrderController@update')->name('route_BackEnd_Orders_Update');

            Route::get('pdf/{id}', 'Admin\OrderController@pdf')->name('route_BackEnd_Orders_PDF');
        });

        Route::prefix('/voucher')->group(function () {
            Route::get('/', 'Admin\VoucherController@index')->name('route_BackEnd_Voucher_List');
            Route::match(['get', 'post'], '/create', 'Admin\VoucherController@create')->name('route_BackEnd_Voucher_Create');
            Route::get('/edit/{id}', 'Admin\VoucherController@edit')->name('route_BackEnd_Voucher_Edit');
            Route::post('/update/{id}', 'Admin\VoucherController@update')->name('route_BackEnd_Voucher_Update');
        });

        Route::prefix('/certificate')->group(function () {
            Route::get('/', 'Admin\CertificateController@index')->name('route_BackEnd_Certificate_List');
            Route::match(['get', 'post'], '/create', 'Admin\CertificateController@create')->name('route_BackEnd_Certificate_Create');
            Route::get('/edit/{id}', 'Admin\CertificateController@edit')->name('route_BackEnd_Certificate_Edit');
            Route::post('/update/{id}', 'Admin\CertificateController@update')->name('route_BackEnd_Certificate_Update');
        });

        Route::prefix('/contact')->group(function () {
            Route::get('/', 'Admin\ContactController@index')->name('route_BackEnd_Contact_List');
            Route::get('/edit/{id}', 'Admin\ContactController@edit')->name('route_BackEnd_Contact_Edit');
            Route::post('/update/{id}', 'Admin\ContactController@update')->name('route_BackEnd_Contact_Update');
        });
    });
