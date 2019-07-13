<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mau;
use Session;
use Storage;
use Barryvdh\DomPDF\Facade as PDF;
class MauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhsachmau = Mau::all(); //SELECT * FROM cusc_chude
        return view('backend.mau.index')
            ->with('danhsachmau', $danhsachmau);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.mau.create');
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
        $m = new Mau();
        $m->m_ten = $request->input('m_ten');
        $m->m_trangThai = 2;
        $m->save();
        Session::flash('alert-warning', 'Thêm mới thành công :)');
        return redirect()->route('backend.mau.index');
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
        $mau = Mau::find($id);
        return view('backend.mau.edit')
            ->with('mau', $mau);
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
        $mau = Mau::find($id);
        $mau->m_ten = $request->input('m_ten');
        $mau->save();
        return redirect()->route('backend.mau.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mau = Mau::find($id);
        $mau->delete();
        return redirect()->route('backend.mau.index');
    }
    public function print()
    {
        $danhsachmau = Mau::all();
        $data = [
            'danhsachmau' => $danhsachmau
        ];
        return view('backend.mau.print')
            ->with('danhsachmau', $danhsachmau);
    }
    public function pdf(){
        $danhsachmau = Mau::all();
        $data = [
            'danhsachmau' => $danhsachmau
        ];
        // khi người dùng bấm vào thì hiển thị view xem trước trên web
        return view('backend.mau.print')
            ->with('danhsachmau', $danhsachmau);

        //khi người dùng bấm vào thì file pdf sẽ được tải về luôn
        // $pdf = PDF::loadView('backend.mau.pdf', $data);
        // return $pdf->download('DanhMucMau.pdf');
    }
    
}
