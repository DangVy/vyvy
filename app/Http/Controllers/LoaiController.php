<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loai;
use Session;
use Storage;
use Barryvdh\DomPDF\Facade as PDF;
class LoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhsachloai = Loai::all();
        return view('backend.loai.index')
            ->with('danhsachloai', $danhsachloai);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.loai.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $l = new Loai();
        $l->l_ten = $request->input('l_ten');
        $l->l_trangThai = 2;
        $l->save();
        Session::flash('alert-warning', 'Thêm mới thành công :)');
        return redirect()->route('backend.loai.index');
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
        $loai = Loai::find($id);
        return view('backend.loai.edit')
            ->with('loai', $loai);
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
        $loai = Loai::find($id);
        $loai->l_ten = $request->input('l_ten');
        $loai->save();
        return redirect()->route('backend.loai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loai = Loai::find($id);
        $loai->delete();
        return redirect()->route('backend.loai.index');
    }
    public function print()
    {
        $danhsachloai = Loai::all();
        $data = [
            'danhsachloai' => $danhsachloai
        ];
        return view('backend.loai.print')
            ->with('danhsachloai', $danhsachloai);
    }
    public function pdf(){
        $danhsachloai = Loai::all();
        $data = [
            'danhsachloai' => $danhsachloai
        ];
        // khi người dùng bấm vào thì hiển thị view xem trước trên web
        return view('backend.loai.print')
            ->with('danhsachloai', $danhsachloai);

        //khi người dùng bấm vào thì file pdf sẽ được tải về luôn
        // $pdf = PDF::loadView('backend.loai.pdf', $data);
        // return $pdf->download('DanhMucLoaiSanPham.pdf');
    }
}
