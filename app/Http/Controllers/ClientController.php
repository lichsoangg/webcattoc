<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admmin\registerRequest;
use App\Http\Requests\Client\LoginRequest;
use App\Http\Requests\Client\Registerrequest as ClientRegisterrequest;
use App\Mail\registerMail;
use App\Models\client;
use App\Models\combo;
use App\Models\lichcat;
use App\Models\User;
use App\Models\xacminh;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;



class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexclient()
    {
        $data = combo::all();
        return view('client.page.index', compact('data'));
    }
    public function Viewprofile(request $request)
    {
        $user_id = Auth::user()->email;
        $data = User::where('email', $user_id)->get();
        $data1 = xacminh::where('emailkhachhang', $user_id)->get();

        return view('client.page.profile', compact('data', 'data1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(ClientRegisterrequest $request)
    {
        $dataMail = $request->all();
        $dataMail['hash'] = Str::uuid();
        $dataMail['password'] = bcrypt($request->password);
        $dataMail['hovaten'] = $request->hovaten;
        User::create($dataMail);
        Mail::to($request->email)->send(new registerMail($dataMail));
    }
    public function Login(LoginRequest $request)
    {
        $data = $request->only('email', 'password');
        if(Auth::attempt($data)){
            $taiKhoan = Auth::user();
            if($taiKhoan['type'] == -1){
                return response()->json(['status' => 1, 'message' => 'Tài khoản chưa được xác minh !']);
            } else {
                return response()->json(['status' => 2, 'message' => 'Đăng nhập thành công !']);
            }
        } else {
            return response()->json(['status' => 0, 'message' => 'Email hoặc mật khẩu không đúng !']);
        }


    }
    public function Active($hkl)
    {
        $taiKhoan = User::where('hash', $hkl)->first();
        if($taiKhoan){
            if($taiKhoan->type == 1){
            toastr()->warning('Tài khoản của bạn đã xác minh rồi');
            return redirect('/client');
        }else {
            $taiKhoan->type = 1;
            $taiKhoan->save();
            toastr()->success('Bạn đã xác minh tài khoản thành công!!');
            return redirect('/client');
            }
        } else {
            toastr()->error('Xác minh mã không đúng');
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function ViewLogin()
    {
        return view('client.page.login');
    }
    public function logout(){
        $id = Auth::user();
        Auth::logout($id);
        return redirect('/client');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(client $client)
    {
        //
    }
}
