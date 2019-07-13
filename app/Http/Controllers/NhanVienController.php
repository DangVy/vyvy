<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NhanVien;
use App\Quyen;
use Session;
use Storage;
use Barryvdh\DomPDF\Facade as PDF;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Sử dụng Eloquent Model để truy vấn dữ liệu
        $ds_nhanvien = NhanVien::all(); // SELECT * FROM sanpham
        // Đường dẫn đến view được quy định như sau: <FolderName>.<ViewName>
        // Mặc định đường dẫn gốc của method view() là thư mục `resources/views`
        // Hiển thị view `backend.sanpham.index`
        return view('backend.nhanvien.index')
            // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachsanpham`
            ->with('danhsachnhanvien', $ds_nhanvien);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Sử dụng Eloquent Model để truy vấn dữ liệu
        $ds_quyen = Quyen::all(); // SELECT * FROM loai
        // Đường dẫn đến view được quy định như sau: <FolderName>.<ViewName>
        // Mặc định đường dẫn gốc của method view() là thư mục `resources/views`
        // Hiển thị view `backend.sanpham.create`
        return view('backend.nhanvien.create')
            // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachloai`
            ->with('danhsachquyen', $ds_quyen);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nv = new NhanVien();
        $nv->nv_taiKhoan = $request->nv_taiKhoan;
        $nv->nv_matKhau = $request->nv_matKhau;
        $nv->nv_hoTen = $request->nv_hoTen;
        $nv->nv_gioiTinh = $request->nv_gioiTinh;
        $nv->nv_email = $request->nv_email;
        $nv->nv_ngaySinh = $request->nv_ngaySinh;
        $nv->nv_diaChi = $request->nv_diaChi;
        $nv->nv_dienThoai = $request->nv_dienThoai;
        $nv->nv_taoMoi = $request->nv_taoMoi;
        $nv->nv_capNhat = $request->nv_capNhat;
        $nv->nv_trangThai = $request->nv_trangThai;
        $nv->q_ma = $request->q_ma;
        $nv->save();
        Session::flash('alert-info', 'Them moi thanh cong :)');
        return redirect()->route('backend.nhanvien.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nv = NhanVien::where("nv_ma", $id)->first();
        $ds_quyen = Quyen::all();
        return view('backend.nhanvien.edit')
            ->with('nv', $nv)
            ->with('danhsachquyen', $ds_quyen);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nv = NhanVien::where("nv_ma",  $id)->first();
        $nv->nv_taiKhoan = $request->nv_taiKhoan;
        $nv->nv_matKhau = $request->nv_matKhau;
        $nv->nv_hoTen = $request->nv_hoTen;
        $nv->nv_gioiTinh = $request->nv_gioiTinh;
        $nv->nv_email = $request->nv_email;
        $nv->nv_ngaySinh = $request->nv_ngaySinh;
        $nv->nv_diaChi = $request->nv_diaChi;
        $nv->nv_dienThoai = $request->nv_dienThoai;
        $nv->nv_taoMoi = $request->nv_taoMoi;
        $nv->nv_capNhat = $request->nv_capNhat;
        $nv->nv_trangThai = $request->nv_trangThai;
        $nv->q_ma = $request->q_ma;
        $nv->save();
        Session::flash('alert-info', 'Them moi thanh cong :)');
        return redirect()->route('backend.nhanvien.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nv = NhanVien::where("nv_ma",  $id)->first();
        $nv->delete();
        Session::flash('alert-info', 'Xóa nhân viên thành công ^^~!!!');
        return redirect()->route('backend.nhanvien.index');
    }
    public function print()
    {
        $ds_nhanvien = NhanVien::all();
        $ds_quyen    = Quyen::all();
        $data = [
            'danhsachnhanvien' => $ds_nhanvien,
            'danhsachquyen'    => $ds_quyen,
        ];
        return view('backend.nhanvien.print')
            ->with('danhsachnhanvien', $ds_nhanvien)
            ->with('danhsachquyen', $ds_quyen);
    }
    public function pdf(){
        $ds_nhanvien = NhanVien::all();
        $ds_quyen    = Quyen::all();
        $data = [
            'danhsachnhanvien' => $ds_nhanvien,
            'danhsachquyen'    => $ds_quyen,
        ];
        // khi người dùng bấm vào thì hiển thị view xem trước trên web
        return view('backend.nhanvien.print')
            ->with('danhsachnhanvien', $ds_nhanvien)
            ->with('danhsachquyen', $ds_quyen);

        //khi người dùng bấm vào thì file pdf sẽ được tải về luôn
        // $pdf = PDF::loadView('backend.nhanvien.pdf', $data);
        // return $pdf->download('DanhMucnhanvien.pdf');
    }
}
