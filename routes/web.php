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

//route loại sản phẩm
Route::get('/admin/loai', 'LoaiController@index')->name('backend.loai.index');
Route::get('/admin/loai/create', 'LoaiController@create')->name('backend.loai.create');
Route::post('/admin/loai/store', 'LoaiController@store')->name('backend.loai.store');
Route::get('/admin/loai/edit/{id}', 'LoaiController@edit')->name('backend.loai.edit');
Route::put('/admin/loai/update/{id}', 'LoaiController@update')->name('backend.loai.update');
Route::delete('/admin/loai/delete/{id}', 'LoaiController@destroy')->name('backend.loai.destroy');
Route::get('/admin/loai/print', 'LoaiController@print')->name('backend.loai.print');
Route::get('/admin/loai/pdf', 'LoaiController@pdf')->name('backend.loai.pdf');

//route nhân viên
Route::get('/admin/nhanvien', 'NhanVienController@index')->name('backend.nhanvien.index');
Route::get('/admin/nhanvien/create', 'NhanVienController@create')->name('backend.nhanvien.create');
Route::post('/admin/nhanvien/store', 'NhanVienController@store')->name('backend.nhanvien.store');
Route::get('/admin/nhanvien/edit/{id}', 'NhanVienController@edit')->name('backend.nhanvien.edit');
Route::put('/admin/nhanvien/update/{id}', 'NhanVienController@update')->name('backend.nhanvien.update');
Route::delete('/admin/nhanvien/delete/{id}', 'NhanVienController@destroy')->name('backend.nhanvien.destroy');
Route::get('/admin/nhanvien/print', 'NhanVienController@print')->name('backend.nhanvien.print');
Route::get('/admin/nhanvien/pdf', 'NhanVienController@pdf')->name('backend.nhanvien.pdf');

//route xuất xứ
Route::get('/admin/xuatxu', 'XuatXuController@index')->name('backend.xuatxu.index');
Route::get('/admin/xuatxu/create', 'XuatXuController@create')->name('backend.xuatxu.create');
Route::post('/admin/xuatxu/store', 'XuatXuController@store')->name('backend.xuatxu.store');
Route::get('/admin/xuatxu/edit/{id}', 'XuatXuController@edit')->name('backend.xuatxu.edit');
Route::put('/admin/xuatxu/update/{id}', 'XuatXuController@update')->name('backend.xuatxu.update');
Route::delete('/admin/xuatxu/delete/{id}', 'XuatXuController@destroy')->name('backend.xuatxu.destroy');
Route::get('/admin/xuatxu/print', 'XuatXuController@print')->name('backend.xuatxu.print');
Route::get('/admin/xuatxu/pdf', 'XuatXuController@pdf')->name('backend.xuatxu.pdf');

//route vận chuyển
Route::get('/admin/vanchuyen', 'VanChuyenController@index')->name('backend.vanchuyen.index');
Route::get('/admin/vanchuyen/create', 'VanChuyenController@create')->name('backend.vanchuyen.create');
Route::post('/admin/vanchuyen/store', 'VanChuyenController@store')->name('backend.vanchuyen.store');
Route::get('/admin/vanchuyen/edit/{id}', 'VanChuyenController@edit')->name('backend.vanchuyen.edit');
Route::put('/admin/vanchuyen/update/{id}', 'VanChuyenController@update')->name('backend.vanchuyen.update');
Route::delete('/admin/vanchuyen/delete/{id}', 'VanChuyenController@destroy')->name('backend.vanchuyen.destroy');
Route::get('/admin/vanchuyen/print', 'VanChuyenController@print')->name('backend.vanchuyen.print');
Route::get('/admin/vanchuyen/pdf', 'VanChuyenController@pdf')->name('backend.vanchuyen.pdf');

//route thanh toán
Route::get('/admin/thanhtoan', 'ThanhToanController@index')->name('backend.thanhtoan.index');
Route::get('/admin/thanhtoan/create', 'ThanhToanController@create')->name('backend.thanhtoan.create');
Route::post('/admin/thanhtoan/store', 'ThanhToanController@store')->name('backend.thanhtoan.store');
Route::get('/admin/thanhtoan/edit/{id}', 'ThanhToanController@edit')->name('backend.thanhtoan.edit');
Route::put('/admin/thanhtoan/update/{id}', 'ThanhToanController@update')->name('backend.thanhtoan.update');
Route::delete('/admin/thanhtoan/delete/{id}', 'ThanhToanController@destroy')->name('backend.thanhtoan.destroy');
Route::get('/admin/thanhtoan/print', 'ThanhToanController@print')->name('backend.thanhtoan.print');
Route::get('/admin/thanhtoan/pdf', 'ThanhToanController@pdf')->name('backend.thanhtoan.pdf');

//route quyền
Route::get('/admin/quyen', 'QuyenController@index')->name('backend.quyen.index');
Route::get('/admin/quyen/create', 'QuyenController@create')->name('backend.quyen.create');
Route::post('/admin/quyen/store', 'QuyenController@store')->name('backend.quyen.store');
Route::get('/admin/quyen/edit/{id}', 'QuyenController@edit')->name('backend.quyen.edit');
Route::put('/admin/quyen/update/{id}', 'QuyenController@update')->name('backend.quyen.update');
Route::delete('/admin/quyen/delete/{id}', 'QuyenController@destroy')->name('backend.quyen.destroy');
Route::get('/admin/quyen/print', 'QuyenController@print')->name('backend.quyen.print');
Route::get('/admin/quyen/pdf', 'QuyenController@pdf')->name('backend.quyen.pdf');

//route nhà cung cấp
Route::get('/admin/nhacungcap', 'NhaCungCapController@index')->name('backend.nhacungcap.index');
Route::get('/admin/nhacungcap/create', 'NhaCungCapController@create')->name('backend.nhacungcap.create');
Route::post('/admin/nhacungcap/store', 'NhaCungCapController@store')->name('backend.nhacungcap.store');
Route::get('/admin/nhacungcap/edit/{id}', 'NhaCungCapController@edit')->name('backend.nhacungcap.edit');
Route::put('/admin/nhacungcap/update/{id}', 'NhaCungCapController@update')->name('backend.nhacungcap.update');
Route::delete('/admin/nhacungcap/delete/{id}', 'NhaCungCapController@destroy')->name('backend.nhacungcap.destroy');
Route::get('/admin/nhacungcap/print', 'NhaCungCapController@print')->name('backend.nhacungcap.print');
Route::get('/admin/nhacungcap/pdf', 'NhaCungCapController@pdf')->name('backend.nhacungcap.pdf');
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
Route::post('/admin/active/{nv_ma}', 'BackendController@activate')->name('activate');

// các route dành riêng cho frontend
Route::get('/', 'Frontend\FrontendController@index')->name('frontend.home');
Route::get('/gioi-thieu', 'Frontend\FrontendController@about')->name('frontend.about');
Route::get('/lien-he', 'Frontend\FrontendController@contact')->name('frontend.contact');
Route::post('/lien-he/goi-loi-nhan', 'Frontend\FrontendController@sendMailContactForm')->name('frontend.contact.sendMailContactForm');
Route::get('/san-pham', 'Frontend\FrontendController@product')->name('frontend.product');
Route::get('/san-pham/{id}', 'Frontend\FrontendController@productDetail')->name('frontend.productDetail');
Route::get('/gio-hang', 'Frontend\FrontendController@cart')->name('frontend.cart');
Route::post('/dat-hang', 'Frontend\FrontendController@order')->name('frontend.order');
Route::get('/dat-hang/hoan-tat', 'Frontend\FrontendController@orderFinish')->name('frontend.orderFinish');

// Tạo route Báo cáo Đơn hàng
Route::get('/admin/baocao/donhang', 'Backend\BaoCaoController@donhang')->name('backend.baocao.donhang');
Route::get('/admin/baocao/donhang/data', 'Backend\BaoCaoController@donhangData')->name('backend.baocao.donhang.data');

//route cho phép chuyển đổi ngôn ngữ
Route::get('setLocale/{locale}', function ($locale) {
    if (in_array($locale, Config::get('app.locales'))) {
      Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('app.setLocale');