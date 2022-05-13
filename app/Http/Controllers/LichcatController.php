<?php

namespace App\Http\Controllers;

use App\Http\Requests\datlich\datlichrequest;
use App\Models\lichcat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LichcatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function danhsachlichcat()
    {
        $lichcat = lichcat::join('users', 'user_id', 'users.id')->select('lichcats.*', 'users.hovaten as tenkhachang')->get();
        return view('admin.page.lichcat.lichcat', compact('lichcat'));
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
