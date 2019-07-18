<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quyen;
use Session;
use Storage;
use Barryvdh\DomPDF\Facade as PDF;

class QuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhsachquyen = Quyen::all();
        return view('backend.quyen.index')
            ->with('danhsachquyen', $danhsachquyen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.quyen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $q = new Quyen();
        $q->q_ten = $request->input('q_ten');
        $q->q_dienGiai = $request->input('q_dienGiai');
        $q->q_trangThai = 2;
        $q->save();
        Session::flash('alert-warning', 'Thêm mới thành công :)');
        return redirect()->route('backend.quyen.index');
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
        $quyen = Quyen::find($id);
        return view('backend.quyen.edit')
            ->with('quyen', $quyen);
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
        $quyen = Quyen::find($id);
        $quyen->q_ten = $request->input('q_ten');
        $quyen->q_dienGiai = $request->input('q_dienGiai');
        $quyen->save();
        return redirect()->route('backend.quyen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quyen = Quyen::find($id);
        $quyen->delete();
        return redirect()->route('backend.quyen.index');
    }
    public function print()
    {
        $danhsachquyen = Quyen::all();
        $data = [
            'danhsachquyen' => $danhsachquyen
        ];
        return view('backend.quyen.print')
            ->with('danhsachquyen', $danhsachquyen);
    }
    public function pdf(){
        $danhsachquyen = Quyen::all();
        $data = [
            'danhsachquyen' => $danhsachquyen
        ];
        // khi người dùng bấm vào thì hiển thị view xem trước trên web
        return view('backend.quyen.print')
            ->with('danhsachquyen', $danhsachquyen);

        //khi người dùng bấm vào thì file pdf sẽ được tải về luôn
        // $pdf = PDF::loadView('backend.quyen.pdf', $data);
        // return $pdf->download('DanhMucQuyen.pdf');
    }
}
