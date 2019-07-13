<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vanchuyen;
use Session;
use Storage;
use Barryvdh\DomPDF\Facade as PDF;

class VanChuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhsachvanchuyen = Vanchuyen::all();
        return view('backend.vanchuyen.index')
            ->with('danhsachvanchuyen', $danhsachvanchuyen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.vanchuyen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vc = new Vanchuyen();
        $vc->vc_ten = $request->input('vc_ten');
        $vc->vc_chiPhi = $request->input('vc_chiPhi');
        $vc->vc_dienGiai = $request->input('vc_dienGiai');
        $vc->vc_trangThai = 2;
        $vc->save();
        Session::flash('alert-warning', 'Thêm mới thành công :)');
        return redirect()->route('backend.vanchuyen.index');
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
        $vanchuyen = Vanchuyen::find($id);
        return view('backend.vanchuyen.edit')
            ->with('vanchuyen', $vanchuyen);
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
        $vanchuyen = Vanchuyen::find($id);
        $vanchuyen->vc_ten = $request->input('vc_ten');
        $vanchuyen->vc_chiPhi = $request->input('vc_chiPhi');
        $vanchuyen->vc_dienGiai = $request->input('vc_dienGiai');
        $vanchuyen->save();
        return redirect()->route('backend.vanchuyen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vanchuyen = Vanchuyen::find($id);
        $vanchuyen->delete();
        return redirect()->route('backend.vanchuyen.index');
    }
    public function print()
    {
        $danhsachvanchuyen = Vanchuyen::all();
        $data = [
            'danhsachvanchuyen' => $danhsachvanchuyen
        ];
        return view('backend.vanchuyen.print')
            ->with('danhsachvanchuyen', $danhsachvanchuyen);
    }
    public function pdf(){
        $danhsachvanchuyen = Vanchuyen::all();
        $data = [
            'danhsachvanchuyen' => $danhsachvanchuyen
        ];
        // khi người dùng bấm vào thì hiển thị view xem trước trên web
        return view('backend.vanchuyen.print')
            ->with('danhsachvanchuyen', $danhsachvanchuyen);

        //khi người dùng bấm vào thì file pdf sẽ được tải về luôn
        // $pdf = PDF::loadView('backend.vanchuyen.pdf', $data);
        // return $pdf->download('DanhMucVanchuyen.pdf');
    }
}
