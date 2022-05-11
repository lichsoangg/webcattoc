<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admmin\combo\capnhapcomboRequest;
use App\Http\Requests\Admmin\combo\createcomboRequest;
use App\Models\combo;
use Illuminate\Http\Request;

class ComboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexcombo()
    {
        $danhsachcombo = combo::all();
        return view('admin.page.combo.indexcombo', compact('danhsachcombo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createcombo()
    {
        return view('admin.page.combo.createcombo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storecombo(createcomboRequest $request)
    {
        $data = $request->all();
        combo::create($data);
        toastr()->success("Bạn đã thêm mới combo thành công !");
        return redirect('/admin/combo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function show(combo $combo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $danhsachcombo = combo::find($id);
        if($danhsachcombo){
            return response()->json(["data" => $danhsachcombo]);
        }else {
            toastr()->error("danhsachcombo does not exits");
            return $this->index();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function update(capnhapcomboRequest $request)
    {
        $data = $request->all();
        $agent = combo::find($request->id);
        $agent->update($data);
        return response()->json(['status' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\combo  $combo
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $combo = combo::find($id);
        if($combo){
            $combo->delete();
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }
}
