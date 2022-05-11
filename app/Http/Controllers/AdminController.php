<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Admmin\LoginRequest as AdmminLoginRequest;
use App\Http\Requests\Admmin\registerRequest;
use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewRegister()
    {
        return view('admin.register');
    }
    public function Register(registerRequest $request)
    {
        // dd($request->toArray());
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        admin::create($data);
        toastr()->success('you are register successfully!');
        return redirect()->back();
    }
    public function viewLogin()
    {
        return view('admin.loginadmin');
    }
    public function Login(AdmminLoginRequest $request)
    {
        $data = $request->only('username', 'password');
        $admin = Auth::guard('admin')->attempt($data);
        if($admin){
            toastr()->success('Bạn đã nhập hệ thống thành công!');
            return redirect('/quantrivien');
        } else {
            toastr()->error('Bạn đã nhập sai tài khoản hoặc mật khẩu!');
            return redirect()->back();

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
