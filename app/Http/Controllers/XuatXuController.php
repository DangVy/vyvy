<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Xuatxu;
use Session;
use Storage;
use Barryvdh\DomPDF\Facade as PDF;

class XuatXuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhsachxuatxu = Xuatxu::all();
        return view('backend.xuatxu.index')
            ->with('danhsachxuatxu', $danhsachxuatxu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.xuatxu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $xx = new Xuatxu();
        $xx->xx_ten = $request->input('xx_ten');
        $xx->xx_trangThai = 2;
        $xx->save();
        Session::flash('alert-warning', 'Thêm mới thành công ');
        return redirect()->route('backend.xuatxu.index');
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
        $xuatxu = Xuatxu::find($id);
        return view('backend.xuatxu.edit')
            ->with('xuatxu', $xuatxu);
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
        $xuatxu = Xuatxu::find($id);
        $xuatxu->xx_ten= $request->input('xx_ten');
        $xuatxu->save();
        return redirect()->route('backend.xuatxu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $xuatxu = Xuatxu::find($id);
        $xuatxu->delete();
        return redirect()->route('backend.xuatxu.index');
    }

    public function print(){
        $danhsachxuatxu = Xuatxu::all();
        $data = [
            'danhsachxuatxu' => $danhsachxuatxu
        ];
        return view('backend.xuatxu.print')
            ->with('danhsachxuatxu', $danhsachxuatxu);
    }

    public function pdf(){
        $danhsachxuatxu = Xuatxu::all();
        $data = [
            'danhsachxuatxu' => $danhsachxuatxu
        ];
        return view('backend.xuatxu.pdf')
            ->with('danhsachxuatxu', $danhsachxuatxu);
    }
}
