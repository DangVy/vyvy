<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NhaCungCap;
use App\Xuatxu;
use Session;
use Storage;

class NhaCungCapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Sử dụng Eloquent Model để truy vấn dữ liệu
        $ds_nhacungcap = NhaCungCap::all(); // SELECT * FROM sanpham
        // Đường dẫn đến view được quy định như sau: <FolderName>.<ViewName>
        // Mặc định đường dẫn gốc của method view() là thư mục `resources/views`
        // Hiển thị view `backend.sanpham.index`
        return view('backend.nhacungcap.index')
            // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachsanpham`
            ->with('danhsachnhacungcap', $ds_nhacungcap);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         // Sử dụng Eloquent Model để truy vấn dữ liệu
         $ds_xuatxu = Xuatxu::all(); // SELECT * FROM loai
         // Đường dẫn đến view được quy định như sau: <FolderName>.<ViewName>
         // Mặc định đường dẫn gốc của method view() là thư mục `resources/views`
         // Hiển thị view `backend.sanpham.create`
         return view('backend.nhacungcap.create')
             // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachloai`
             ->with('danhsachxuatxu', $ds_xuatxu);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ncc = new NhaCungCap();
        $ncc->ncc_ten= $request->ncc_ten;
        $ncc->ncc_daiDien = $request->ncc_daiDien;
        $ncc->ncc_diaChi = $request->ncc_diaChi;
        $ncc->ncc_dienThoai = $request->ncc_dienThoai;
        $ncc->ncc_email = $request->ncc_email;
        $ncc->ncc_taoMoi = $request->ncc_taoMoi;
        $ncc->ncc_capNhat = $request->ncc_capNhat;
        $ncc->ncc_trangThai = $request->ncc_trangThai;
        $ncc->xx_ma = $request->xx_ma;
        $ncc->save();
        Session::flash('alert-info', 'Them moi thanh cong :)');
        return redirect()->route('backend.nhacungcap.index');
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
        $ncc = NhaCungCap::where("ncc_ma", $id)->first();
        $ds_xuatxu = Xuatxu::all();
        return view('backend.nhacungcap.edit')
            ->with('ncc', $ncc)
            ->with('danhsachxuatxu', $ds_xuatxu);
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
        $ncc = NhaCungCap::where("ncc_ma",  $id)->first();
        $ncc->ncc_ten= $request->ncc_ten;
        $ncc->ncc_daiDien = $request->ncc_daiDien;
        $ncc->ncc_diaChi = $request->ncc_diaChi;
        $ncc->ncc_dienThoai = $request->ncc_dienThoai;
        $ncc->ncc_email = $request->ncc_email;
        $ncc->ncc_taoMoi = $request->ncc_taoMoi;
        $ncc->ncc_capNhat = $request->ncc_capNhat;
        $ncc->ncc_trangThai = $request->ncc_trangThai;
        $ncc->xx_ma = $request->xx_ma;
        $ncc->save();
        Session::flash('alert-info', 'Them moi thanh cong :)');
        return redirect()->route('backend.nhacungcap.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ncc = NhaCungCap::where("ncc_ma",  $id)->first();
        $ncc->delete();
        Session::flash('alert-info', 'Xóa  thành công ^^~!!!');
        return redirect()->route('backend.nhacungcap.index');
    }
    public function print()
    {
        $ds_nhacungcap = NhaCungCap::all();
        $ds_xuatxu    = Xuatxu::all();
        $data = [
            'danhsachnhacungcap' => $ds_nhacungcap,
            'danhsachxuatxu'    => $ds_xuatxu,
        ];
        return view('backend.nhacungcap.print')
            ->with('danhsachnhacungcap', $ds_nhacungcap)
            ->with('danhsachxuatxu', $ds_xuatxu);
    }
    public function pdf(){
        $ds_nhacungcap = NhaCungCap::all();
        $ds_xuatxu    = Xuatxu::all();
        $data = [
            'danhsachnhacungcap' => $ds_nhacungcap,
            'danhsachxuatxu'    => $ds_xuatxu,
        ];
        // khi người dùng bấm vào thì hiển thị view xem trước trên web
        return view('backend.nhacungcap.print')
            ->with('danhsachnhacungcap', $ds_nhacungcap)
            ->with('danhsachxuatxu', $ds_xuatxu);

        //khi người dùng bấm vào thì file pdf sẽ được tải về luôn
        // $pdf = PDF::loadView('backend.nhacungcap.pdf', $data);
        // return $pdf->download('DanhMucnhacungcap.pdf');
    }
}
