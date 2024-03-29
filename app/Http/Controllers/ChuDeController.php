<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ChuDe;
use Session;
use Storage;
use Barryvdh\DomPDF\Facade as PDF;
use Validator;
class ChuDeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Lấy danh sach Chủ đề trong Database
        $danhsachchude = ChuDe::all(); //SELECT * FROM cusc_chude
        return view('backend.chude.index')
            ->with('danhsachchude', $danhsachchude);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.chude.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // var_dump();die;
        // print_r();die;
        // dd($request); //Dump and die

        // Kiểm tra ràng buộc dữ liệu (validation)
        $validator = Validator::make($request->all(), [
            'cd_ten' => 'required|min:3|max:50|unique:cusc_chude',
        ]);
        // Nếu kiểm tra ràng buộc dữ liệu thất bại -> tức là dữ liệu không hợp lệ
        // Chuyển hướng về view "Thêm mới" với,
        // - Thông báo lỗi vi phạm các quy luật.
        // - Dữ liệu cũ (người dùng đã nhập).
        if ($validator->fails()) {
            return redirect(route('backend.chude.create'))
                        ->withErrors($validator)
                        ->withInput();
        }

        $cd = new ChuDe();
        $cd->cd_ten = $request->input('cd_ten');
        $cd->cd_trangThai = 2;
        $cd->save();
        Session::flash('alert-warning', 'Thêm mới thành công ^^~!!!');
        return redirect()->route('backend.chude.index');
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
        $chude = ChuDe::find($id);
        return view('backend.chude.edit')
            ->with('chude', $chude);
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
        $chude = ChuDe::find($id);
        $chude->cd_ten = $request->input('cd_ten');
        $chude->save();
        return redirect()->route('backend.chude.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chude = ChuDe::find($id);
        $chude->delete();
        return redirect()->route('backend.chude.index');
    }
    public function print()
    {
        $danhsachchude = ChuDe::all();
        $data = [
            'danhsachchude' => $danhsachchude
        ];
        return view('backend.chude.print')
            ->with('danhsachchude', $danhsachchude);
    }
    public function pdf(){
        $danhsachchude = ChuDe::all();
        $data = [
            'danhsachchude' => $danhsachchude
        ];
        // khi người dùng bấm vào thì hiển thị view xem trước trên web
        // return view('backend.chude.print')
        //     ->with('danhsachchude', $danhsachchude);

        //khi người dùng bấm vào thì file pdf sẽ được tải về luôn
        $pdf = PDF::loadView('backend.chude.pdf', $data);
        return $pdf->download('DanhMucChuDe.pdf');
    }
}