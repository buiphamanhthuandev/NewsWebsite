<?php

namespace App\Http\Controllers;
use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request);
        //lấy danh sách theo tên trả table
        $details = Detail::where('state',1)->get();

        //lấy danh sách theo id trả form 
        $detail_id = null;
        if($request->has('detail_id')){
            $detail_id = Detail::findOrFail($request->detail_id);
        }
        
        //lấy danh sách theo tên trả table tìm kiếm
        $nameDetails = null;
        if($request->has('nameDetail')){
            
            $nameDetails = Detail::where('name','LIKE','%'.$request->nameDetail.'%')->get();
        }
        return view('admin.detail.index',compact('details','detail_id','nameDetails'));
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
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $details = Detail::create($data);
        return redirect(route('admin.detail.index'))->with('success','detail create thành công');
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
        //
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
        $data = $request->validate([
            'name'=>'required',
            'description'=>'required'
        ]);
        $detail = Detail::findOrFail($id);
        $detail->update($data);
        return redirect(route('admin.detail.index'))->with('success','detail update thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = Detail::findOrFail($id);
        $detail->update(['state' => 0]);
        return redirect(route('admin.detail.index'))->with('success','detail delete thành công');
    }
}
