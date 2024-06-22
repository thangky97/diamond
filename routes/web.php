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
Route::get('/products', 'Client\ShopController@index')->name('route_FrontEnd_Product');
Route::get('/products/detail/{id}', 'Client\ShopController@detail')->name('route_FrontEnd_Product_Detail');
Route::get('/product-category/{id}', 'Client\ShopController@cate')->name('route_FrontEnd_Category');
Route::get('/news', 'Client\NewsController@index')->name('route_FrontEnd_News');
Route::get('/news/detail/{id}', 'Client\NewsController@detail')->name('route_FrontEnd_News_Detail');
Route::get('/contact', 'Client\ContactController@index')->name('route_FrontEnd_Contact');
Route::get('/about', 'Client\AboutUsController@index')->name('route_FrontEnd_About');

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
Route::get('/forget-password', 'Client\RegisterController@forgetPassword')->name('forgetPassword');
Route::post('/forget-password', 'Client\RegisterController@postforgetPassword')->name('postforgetPassword');
Route::get('/get-password/{id}', 'Client\RegisterController@getPassword')->name('getPassword');
Route::post('/get-password/{id}', 'Client\RegisterController@postPassword')->name('postPassword');

Route::get('/login-google', 'Client\LoginController@getLoginGoogle')->name('getLoginGoogle');
Route::get('/google/callback', 'Client\LoginController@loginGoogleCallback')->name('loginGoogleCallback');

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

        Route::prefix('/comment')->group(function () {
            Route::get('/', 'Admin\CommentController@index')->name('route_BackEnd_Comment_List');
            Route::get('/edit/{id}', 'Admin\CommentController@edit')->name('route_BackEnd_Comment_Edit');
            Route::delete('/delete/{id}', 'Admin\CommentController@delete')->name('route_BackEnd_Comment_Delete');
        });

        Route::prefix('/order')->group(function () {
            Route::get('/', 'Admin\OrderController@index')->name('route_BackEnd_Orders_List');
            Route::get('/edit/{id}', 'Admin\OrderController@edit')->name('route_BackEnd_Orders_Edit');
            Route::post('/update/{id}', 'Admin\OrderController@update')->name('route_BackEnd_Orders_Update');

            Route::get('pdf/{id}', 'Admin\OrderController@pdf')->name('route_BackEnd_Orders_PDF');
        });

        Route::prefix('/banner')->group(function () {
            Route::get('/', 'Admin\BannerController@index')->name('route_BackEnd_Banner_List');
            Route::match(['get', 'post'], '/create', 'Admin\BannerController@create')->name('route_BackEnd_Banner_Create');
            Route::get('/edit/{id}', 'Admin\BannerController@edit')->name('route_BackEnd_Banner_Edit');
            Route::post('/update/{id}', 'Admin\BannerController@update')->name('route_BackEnd_Banner_Update');
            Route::get('/remove/{id}', 'Admin\BannerController@remove')->name('route_BackEnd_Banner_Remove');
        });

        Route::prefix('/contact')->group(function () {
            Route::get('/', 'Admin\ContactController@index')->name('route_BackEnd_Contact_List');
            Route::get('/edit/{id}', 'Admin\ContactController@edit')->name('route_BackEnd_Contact_Edit');
            Route::post('/update/{id}', 'Admin\ContactController@update')->name('route_BackEnd_Contact_Update');
            Route::get('/remove/{id}', 'Admin\ContactController@remove')->name('route_BackEnd_Contact_Remove');
        });

        Route::prefix('/news')->group(function () {
            Route::get('/', 'Admin\NewController@index')->name('route_BackEnd_News_List');
            Route::match(['get', 'post'], '/create', 'Admin\NewController@create')->name('route_BackEnd_News_Create');
            Route::get('/edit/{id}', 'Admin\NewController@edit')->name('route_BackEnd_News_Edit');
            Route::post('/update/{id}', 'Admin\NewController@update')->name('route_BackEnd_News_Update');
            Route::get('/remove/{id}', 'Admin\NewController@remove')->name('route_BackEnd_News_Remove');
        });

        Route::prefix('/category_news')->group(function () {
            Route::get('/', 'Admin\CategoryNewController@index')->name('route_BackEnd_Category_News_List');
            Route::match(['get', 'post'], '/create', 'Admin\CategoryNewController@create')->name('route_BackEnd_Category_News_Create');
            Route::get('/edit/{id}', 'Admin\CategoryNewController@edit')->name('route_BackEnd_Category_News_Edit');
            Route::post('/update/{id}', 'Admin\CategoryNewController@update')->name('route_BackEnd_Category_News_Update');
            Route::get('/remove/{id}', 'Admin\CategoryNewController@remove')->name('route_BackEnd_Category_News_Remove');
        });
    });
