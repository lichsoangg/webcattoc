<?php

namespace App\Http\Controllers;

use App\Http\Requests\datlich\datlichrequest;
use App\Mail\xacnhanhuyMail;
use App\Mail\xacnhanMail;
use App\Models\agent;
use App\Models\huylich;
use App\Models\lichcat;
use App\Models\xacminh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class LichcatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function xacnhanhangthanh($id)
    {
        $hoanthanh = xacminh::find($id);
        if($hoanthanh){
            $hoanthanh->delete();
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }
    public function thanhtoan(Request $request)
    {
        $id = $request->id;
        $trangthai = xacminh::find($id);
        if($trangthai){
             $trangthai->trangthai = ! $trangthai->trangthai;
            $trangthai->save();
            return response()->json(['caulenh' => true, 'auto' => $trangthai->trangthai]);
        }else{
            return response()->json(['caulenh' => false]);
        }
    }
    public function danhsachlichcat()
    {
        $lichcat = lichcat::join('users', 'user_id', 'users.id')->select('lichcats.*', 'users.hovaten as tenkhachang', 'users.email as emailkhachhang')->get();
        $nhanvien = agent::all();
        return view('admin.page.lichcat.lichcat', compact('lichcat', 'nhanvien'));
    }
    public function huylich($ad)
    {
        $huylich = lichcat::join('users', 'user_id', 'users.id')->select('lichcats.*', 'users.hovaten as tenkhachang1', 'users.email as emailkhachhang1')->find($ad);
        if($huylich){
            return response()->json(["data" => $huylich]);
        }else {
            toastr()->error("xacminh does not exits");
            return $this->index();
        }
    }
    public function nhanlich($id)
    {
        $xacminh = lichcat::join('users', 'user_id', 'users.id')->select('lichcats.*', 'users.hovaten as tenkhachang', 'users.email as emailkhachhang', 'users.sodienthoai as phonekhachhang')->find($id);
        if($xacminh){
            return response()->json(["data" => $xacminh]);
        }else {
            toastr()->error("xacminh does not exits");
            return $this->index();
        }
    }
    public function xacnhan(Request $request)
    {
        $dataMail = $request->all();
        $dataMail['tenkhachang'] = $request->tenkhachang;
        $dataMail['combo_id'] = $request->combo_id;
        $dataMail['ngaycat'] = $request->ngaycat;
        $dataMail['giocat'] = $request->giocat;
        $dataMail['gia_id'] = $request->gia_id;
        $dataMail['trangthai'] = $request->trangthai;
        $dataMail['tennhanvien'] = $request->tennhanvien;
        xacminh::create($dataMail);
        Mail::to($request->emailkhachhang)->send(new xacnhanMail($dataMail));

        $id = $request->id;
        $lichcat = lichcat::find($id);
        if($lichcat)
        {
            $lichcat->id == $id;
            $lichcat->delete();
        }else{
            toastr()->error("Bạn không được sữa hệ thống");
        }
        return response()->json(['status' => true]);
    }
    public function xacnhanhuy(Request $request)
    {
        $dataMail = $request->all();
        $dataMail['tenkhachang1'] = $request->tenkhachang1;
        $dataMail['lydo'] = $request->lydo;
        huylich::create($dataMail);
        Mail::to($request->emailkhachhang1)->send(new xacnhanhuyMail($dataMail));
        $id = $request->id;
        $lichcat = lichcat::find($id);
        if($lichcat)
        {
            $lichcat->id == $id;
            $lichcat->delete();
        }else{
            toastr()->error("Bạn không được sữa hệ thống");
        }
        return response()->json(['status' => true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lichcatdaxuly()
    {
        $data = xacminh::all();
        return view('admin.page.lichcat.lichdaxuly', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function lichcat(datlichrequest $request)
    {
        $data = $request->all();
        lichcat::create($data);
        return redirect('/client');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lichcat  $lichcat
     * @return \Illuminate\Http\Response
     */
    public function show(lichcat $lichcat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lichcat  $lichcat
     * @return \Illuminate\Http\Response
     */
    public function edit(lichcat $lichcat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lichcat  $lichcat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lichcat $lichcat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lichcat  $lichcat
     * @return \Illuminate\Http\Response
     */
    public function destroy(lichcat $lichcat)
    {
        //
    }
}
