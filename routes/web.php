<?php

use App\Http\Controllers\admin\AdminloginController;
use App\Http\Controllers\admin\CategorysController;
use App\Http\Controllers\admin\homecontroller;
use App\Http\Controllers\admin\ProductsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/adminlogin', 'AdminController@index');
// Route::post('admin_login', 'AdminController@adminlogin');
// Route::get('adminlogout', 'AdminController@adminlogout');

// Route::get('adminprofile', 'AdminController@profileindex');
// Route::post('profileupdate', 'AdminController@profileupdate');

// Route::get('admindashboard','AdminController@admindashboard');

// Route::get('categoryindex','CategoryController@categoryindex');
// Route::post('insertcategory','CategoryController@insertcategory');
// Route::get('showcategory','CategoryController@showcategory');
// Route::get('update/{id}', 'CategoryController@update');
// Route::post('adminedit', 'CategoryController@adminedit');
// Route::get('admindelete/{id}', 'CategoryController@admindelete');

// Route::get('addproduct','ProductController@addproductindex');
// Route::post('addproduct','ProductController@addproduct');
// Route::get('showproduct','ProductController@showproduct');
// Route::get('showproductdetail/{id}','ProductController@showproductdetail');
// Route::get('productdelete/{id}','ProductController@productdelete');
// Route::get('updatemyitem/{id}','ProductController@updatemyitem');
// Route::post('editmyitem','ProductController@editmyitem');

// =========================================================================

Route::get('/', 'Client\HomeController@home');
Route::get('pages/{id}', 'Client\HomeController@pages');
route::get('product/{cat}', 'Client\HomeController@postpage');
route::get('contact', 'Client\HomeController@contect');
route::post('addcontact', 'Client\HomeController@addcontact');

Route::get('privacy-policy', function () {
    return view('Client.policy');
});
// -------------------------------------------------------------------------------

Route::get('register', function () {
    return view('Admins.register');
});
// Route::get('adduser', function () {
//     return view('Admins.adduser');
// });
route::post('addregister', [AdminloginController::class, 'addregister']);

route::get('/login', [AdminloginController::class, 'index']);
route::post('admin_login', [AdminloginController::class, 'adminlogin']);

Route::group(['middleware' => 'admin'], function () 
{
    route::get('showuser', [AdminloginController::class, 'showuser']);
    route::get('deleteuser/{id}', [AdminloginController::class, 'deleteuser']);


    route::get('adminlogout', [AdminloginController::class, 'adminlogout']);

    route::get('profile', [AdminloginController::class, 'profile']);
    route::post('profileupdate', [AdminloginController::class, 'profileupdate']);

    route::get('index', [AdminloginController::class, 'admindashboard']);

    route::get('category', [CategorysController::class, 'showcategory']);
    route::get('addcatagory', [CategorysController::class, 'addcatagory']);
    route::post('insertcategory', [CategorysController::class, 'insertcategory']);
    route::get('editcategory/{id}', [CategorysController::class, 'update']);
    route::post('updatecat', [CategorysController::class, 'updatecat']);
    route::post('admindelete/{id}', [CategorysController::class, 'admindelete']);

    route::get('product', [ProductsController::class, 'showproduct']);
    route::get('addproduct', [ProductsController::class, 'addproduct']);
    route::post('insertproduct', [ProductsController::class, 'insertproduct']);
    route::get('productdelete/{id}', [ProductsController::class, 'productdelete']);
    route::get('editproduct/{id}', [ProductsController::class, 'editproduct']);
    route::post('editmyitem', [ProductsController::class, 'editmyitem']);

    route::get('productimage', [ProductsController::class, 'showimage']);
    route::get('addimage/{id}', [ProductsController::class, 'addimage']);
    route::post('addimagedetail', [ProductsController::class, 'addimagedetail']);
    route::get('editproductimage/{id}', [ProductsController::class, 'editproductimage']);
    route::post('editimage', [ProductsController::class, 'editimage']);
    route::get('deleteimage/{id}', [ProductsController::class, 'deleteimage']);
});
