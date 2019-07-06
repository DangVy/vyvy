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
Route::get('/admin/chude', 'ChuDeController@index')->name('backend.chude.index');
Route::get('/admin/chude/create', 'ChuDeController@create')->name('backend.chude.create');
Route::post('/admin/chude/store', 'ChuDeController@store')->name('backend.chude.store');
Route::get('/admin/chude/edit/{id}', 'ChuDeController@edit')->name('backend.chude.edit');
Route::put('/admin/chude/update/{id}', 'ChuDeController@update')->name('backend.chude.update');
Route::delete('/admin/chude/delete/{id}', 'ChuDeController@destroy')->name('backend.chude.destroy');
// Các route dành riêng cho backend
Route::get('/admin/', 'BackendController@dashboard')->name('backend.dashboard');
// route Danh mục Sản phẩm
Route::get('/admin/sanpham', 'SanPhamController@index')->name('backend.sanpham.index');
Route::get('/admin/sanpham/create', 'SanPhamController@create')->name('backend.sanpham.create');
Route::post('/admin/sanpham/store', 'SanPhamController@store')->name('backend.sanpham.store');
Route::get('/admin/sanpham/edit/{id}', 'SanPhamController@edit')->name('backend.sanpham.edit');
Route::put('/admin/sanpham/update/{id}', 'SanPhamController@update')->name('backend.sanpham.update');
Route::delete('/admin/sanpham/delete/{id}', 'SanPhamController@destroy')->name('backend.sanpham.destroy');
Route::get('/admin/sanpham/print', 'SanPhamController@print')->name('backend.sanpham.print');