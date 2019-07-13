<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Thanhtoan;
use Session;
use Storage;
use Barryvdh\DomPDF\Facade as PDF;

class ThanhToanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhsachthanhtoan = Thanhtoan::all();
        return view('backend.thanhtoan.index')
            ->with('danhsachthanhtoan', $danhsachthanhtoan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.thanhtoan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tt = new Thanhtoan();
        $tt->tt_ten = $request->input('tt_ten');
        $tt->tt_dienGiai = $request->input('tt_dienGiai');
        $tt->tt_trangThai = 2;
        $tt->save();
        Session::flash('alert-warning', 'Thêm mới thành công :)');
        return redirect()->route('backend.thanhtoan.index');
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
        $thanhtoan = Thanhtoan::find($id);
        return view('backend.thanhtoan.edit')
            ->with('thanhtoan', $thanhtoan);
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
        $thanhtoan = Thanhtoan::find($id);
        $thanhtoan->tt_ten = $request->input('tt_ten');
        $thanhtoan->tt_dienGiai = $request->input('tt_dienGiai');
        $thanhtoan->save();
        return redirect()->route('backend.thanhtoan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thanhtoan = Thanhtoan::find($id);
        $thanhtoan->delete();
        return redirect()->route('backend.thanhtoan.index');
    }

    public function print()
    {
        $danhsachthanhtoan = Thanhtoan::all();
        $data = [
            'danhsachthanhtoan' => $danhsachthanhtoan
        ];
        return view('backend.thanhtoan.print')
            ->with('danhsachthanhtoan', $danhsachthanhtoan);
    }
    public function pdf(){
        $danhsachthanhtoan = Thanhtoan::all();
        $data = [
            'danhsachthanhtoan' => $danhsachthanhtoan
        ];
        // khi người dùng bấm vào thì hiển thị view xem trước trên web
        return view('backend.thanhtoan.print')
            ->with('danhsachthanhtoan', $danhsachthanhtoan);

        //khi người dùng bấm vào thì file pdf sẽ được tải về luôn
        // $pdf = PDF::loadView('backend.loai.pdf', $data);
        // return $pdf->download('DanhMucLoaiSanPham.pdf');
    }
}
