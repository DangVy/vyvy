<?php
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
// Route::get('/danhsachloai', function() {
//     // Truy van database, table Loai
//     // hien thi
//     return 'Hello, day la chuc nang danh sach loai';
// });
Route::get('/danhsachloai', 'LoaiController@hienthimanhinhdanhsach');
Route::get('/danhsachloai/taomoi', 'LoaiController@taomoi');
// Route::get('/danhsachloai/taomoi', function() {
//     return 'Hello, day la chuc nang them moi danh sach loai';
// });

//chủ đề 
// middleware gom nhóm các mục cần đăng nhập trước khi vào 
Route::group(['middleware' => 'auth'], function()
{
Route::get('/admin/chude', 'ChuDeController@index')->name('backend.chude.index');
Route::get('/admin/chude/create', 'ChuDeController@create')->name('backend.chude.create');
Route::post('/admin/chude/store', 'ChuDeController@store')->name('backend.chude.store');
Route::get('/admin/chude/edit/{id}', 'ChuDeController@edit')->name('backend.chude.edit');
Route::put('/admin/chude/update/{id}', 'ChuDeController@update')->name('backend.chude.update');
Route::delete('/admin/chude/delete/{id}', 'ChuDeController@destroy')->name('backend.chude.destroy');
Route::get('/admin/chude/print', 'ChuDeController@print')->name('backend.chude.print');
Route::get('/admin/chude/pdf', 'ChuDeController@pdf')->name('backend.chude.pdf');

// Các route dành riêng cho backend


// route Danh mục Sản phẩm
Route::get('/admin/sanpham', 'SanPhamController@index')->name('backend.sanpham.index');
Route::get('/admin/sanpham/create', 'SanPhamController@create')->name('backend.sanpham.create');
Route::post('/admin/sanpham/store', 'SanPhamController@store')->name('backend.sanpham.store');
Route::get('/admin/sanpham/edit/{id}', 'SanPhamController@edit')->name('backend.sanpham.edit');
Route::put('/admin/sanpham/update/{id}', 'SanPhamController@update')->name('backend.sanpham.update');
Route::delete('/admin/sanpham/delete/{id}', 'SanPhamController@destroy')->name('backend.sanpham.destroy');
Route::get('/admin/sanpham/print', 'SanPhamController@print')->name('backend.sanpham.print');
Route::get('/admin/sanpham/pdf', 'SanPhamController@pdf')->name('backend.sanpham.pdf');

// route Màu 
Route::get('/admin/mau', 'MauController@index')->name('backend.mau.index');
Route::get('/admin/mau/create', 'MauController@create')->name('backend.mau.create');
Route::post('/admin/mau/store', 'MauController@store')->name('backend.mau.store');
Route::get('/admin/mau/edit/{id}', 'MauController@edit')->name('backend.mau.edit');
Route::put('/admin/mau/update/{id}', 'MauController@update')->name('backend.mau.update');
Route::delete('/admin/mau/delete/{id}', 'MauController@destroy')->name('backend.mau.destroy');
Route::get('/admin/mau/print', 'MauController@print')->name('backend.mau.print');
Route::get('/admin/mau/pdf', 'MauController@pdf')->name('backend.mau.pdf');
});
Auth::routes();

Route::get('/admin/', 'BackendController@dashboard')->name('backend.dashboard');
Route::get('/home', 'HomeController@index')->name('home');

// Gọi hàm đăng ký các route dành cho Quản lý Xác thực tài khoản (Đăng nhập, Đăng xuất, Đăng ký)
// các route trong file `vendor\laravel\framework\src\Illuminate\Routing\Router.php`, hàm auth()
// Auth::routes();
// Xác thực Routes...
Route::get('/admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/admin/login', 'Auth\LoginController@login');
Route::post('/admin/logout', 'Auth\LoginController@logout')->name('logout');
// Đăng ký Routes...
Route::get('/admin/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/admin/register', 'Auth\RegisterController@register');
// Quên mật khẩu Routes...
Route::get('/admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/admin/password/reset', 'Auth\ResetPasswordController@reset');
