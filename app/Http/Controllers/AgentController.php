<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admmin\agent\capnhapRequest;
use App\Http\Requests\Admmin\agent\createagentRequest;
use App\Models\agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexagent()
    {
        $danhsachnhanvien = agent::all();
        return view('admin.page.agent.indexagent', compact('danhsachnhanvien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createagent()
    {
        return view('admin.page.agent.createagent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storenagent(createagentRequest $request)
    {
        $data = $request->all();
        agent::create($data);
        toastr()->success("Bạn đã thêm mới nhân viên thành công !");
        return redirect('/admin/indexagent');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(agent $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $danhsachnhanvien = agent::find($id);
        if($danhsachnhanvien){
            return response()->json(["data" => $danhsachnhanvien]);
        }else {
            toastr()->error("danhsachnhanvien does not exits");
            return $this->index();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\agent  $agent
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        $agent = agent::find($id);
        if($agent){
            $agent->delete();
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }
    public function update(capnhapRequest $request)
    {
        $data = $request->all();
        $agent = agent::find($request->id);
        $agent->update($data);
        return response()->json(['status' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(agent $agent)
    {
        //
    }
}
