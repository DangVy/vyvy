<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SanPham;
use App\Loai;
use Session;
use Storage;
use Barryvdh\DomPDF\Facade as PDF;
use Validator;
class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Sử dụng Eloquent Model để truy vấn dữ liệu
        // $ds_sanpham = SanPham::all(); // SELECT * FROM sanpham
        // Sử dụng Eloquennt Model phân trang
        // Mỗi trang có 5 mẫu tin
        $ds_sanpham = SanPham::paginate(5); // SELECT * FROM sanpham LIMIT 0,5
        // Đường dẫn đến view được quy định như sau: <FolderName>.<ViewName>
        // Mặc định đường dẫn gốc của method view() là thư mục `resources/views`
        // Hiển thị view `backend.sanpham.index`
        return view('backend.sanpham.index')
            // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachsanpham`
            ->with('danhsachsanpham', $ds_sanpham);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Sử dụng Eloquent Model để truy vấn dữ liệu
        $ds_loai = Loai::all(); // SELECT * FROM loai
        // Đường dẫn đến view được quy định như sau: <FolderName>.<ViewName>
        // Mặc định đường dẫn gốc của method view() là thư mục `resources/views`
        // Hiển thị view `backend.sanpham.create`
        return view('backend.sanpham.create')
            // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachloai`
            ->with('danhsachloai', $ds_loai);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sp_ten' => 'required|min:3|max:50|unique:cusc_sanpham',
            'sp_giaGoc' => 'required|min:0|unique:cusc_sanpham',
            'sp_giaBan' => 'required|min:0|unique:cusc_sanpham',
            'sp_hinh' => 'required:cusc_sanpham',
            'sp_thongTin' => 'required:cusc_sanpham',
            'sp_danhGia' => 'required|min:3|max:50:cusc_sanpham',
            'sp_taoMoi' => 'required:cusc_sanpham',
            'sp_capNhat' => 'required:cusc_sanpham',
            'sp_trangThai' => 'required|min:1|max:4:cusc_sanpham',
            'l_ma' => 'required:cusc_sanpham',
        ]);
        // Nếu kiểm tra ràng buộc dữ liệu thất bại -> tức là dữ liệu không hợp lệ
        // Chuyển hướng về view "Thêm mới" với,
        // - Thông báo lỗi vi phạm các quy luật.
        // - Dữ liệu cũ (người dùng đã nhập).
        if ($validator->fails()) {
            return redirect(route('backend.sanpham.create'))
                        ->withErrors($validator)
                        ->withInput();
        }

        $sp = new SanPham();
        $sp->sp_ten = $request->sp_ten;
        $sp->sp_giaGoc = $request->sp_giaGoc;
        $sp->sp_giaBan = $request->sp_giaBan;
        $sp->sp_thongTin = $request->sp_thongTin;
        $sp->sp_danhGia = $request->sp_danhGia;
        $sp->sp_taoMoi = $request->sp_taoMoi;
        $sp->sp_capNhat = $request->sp_capNhat;
        $sp->sp_trangThai = $request->sp_trangThai;
        $sp->l_ma = $request->l_ma;
        if($request->hasFile('sp_hinh'))
        {
            $file = $request->sp_hinh;
            // Lưu tên hình vào column sp_hinh
            $sp->sp_hinh = $file->getClientOriginalName();
            
            // Chép file vào thư mục "photos"
            $fileSaved = $file->storeAs('public/photos', $sp->sp_hinh);
        }
        $sp->save();
        Session::flash('alert-info', 'Them moi thanh cong ^^~!!!');
        return redirect()->route('backend.sanpham.index');
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
        $sp = SanPham::where("sp_ma", $id)->first();
        $ds_loai = Loai::all();
        return view('backend.sanpham.edit')
            ->with('sp', $sp)
            ->with('danhsachloai', $ds_loai);
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
        $sp = SanPham::where("sp_ma",  $id)->first();
        $sp->sp_ten = $request->sp_ten;
        $sp->sp_giaGoc = $request->sp_giaGoc;
        $sp->sp_giaBan = $request->sp_giaBan;
        $sp->sp_thongTin = $request->sp_thongTin;
        $sp->sp_danhGia = $request->sp_danhGia;
        $sp->sp_taoMoi = $request->sp_taoMoi;
        $sp->sp_capNhat = $request->sp_capNhat;
        $sp->sp_trangThai = $request->sp_trangThai;
        $sp->l_ma = $request->l_ma;
        if($request->hasFile('sp_hinh'))
        {
            // Xóa hình cũ để tránh rác
            Storage::delete('public/photos/' . $sp->sp_hinh);
            // Upload hình mới
            // Lưu tên hình vào column sp_hinh
            $file = $request->sp_hinh;
            $sp->sp_hinh = $file->getClientOriginalName();
            
            // Chép file vào thư mục "photos"
            $fileSaved = $file->storeAs('public/photos', $sp->sp_hinh);
        }
        $sp->save();
        Session::flash('alert-info', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.sanpham.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sp = SanPham::where("sp_ma",  $id)->first();
        if(empty($sp) == false)
        {
            // Xóa hình cũ để tránh rác
            Storage::delete('public/photos/' . $sp->sp_hinh);
        }
        $sp->delete();
        Session::flash('alert-info', 'Xóa sản phẩm thành công ^^~!!!');
        return redirect()->route('backend.sanpham.index');
    }
    public function print()
    {
        $ds_sanpham = Sanpham::all();
        $ds_loai    = Loai::all();
        $data = [
            'danhsachsanpham' => $ds_sanpham,
            'danhsachloai'    => $ds_loai,
        ];
        return view('backend.sanpham.print')
            ->with('danhsachsanpham', $ds_sanpham)
            ->with('danhsachloai', $ds_loai);
    }
    public function pdf(){
        $ds_sanpham = Sanpham::all();
        $ds_loai    = Loai::all();
        $data = [
            'danhsachsanpham' => $ds_sanpham,
            'danhsachloai'    => $ds_loai,
        ];
        // khi người dùng bấm vào thì hiển thị view xem trước trên web
        return view('backend.sanpham.print')
            ->with('danhsachsanpham', $ds_sanpham)
            ->with('danhsachloai', $ds_loai);

        //khi người dùng bấm vào thì file pdf sẽ được tải về luôn
        // $pdf = PDF::loadView('backend.sanpham.pdf', $data);
        // return $pdf->download('DanhMucSanPham.pdf');
    }
}