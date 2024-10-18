<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $categories = Category::where('state',1)->get();

        //lấy danh sách theo id trả form 
        $category_id = null;
        if($request->has('category_id')){
            $category_id = Category::findOrFail($request->category_id);
        }

        return view('admin.detail.index',compact('categories','category_id'));
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

        $categories = Category::create($data);
        return redirect(route('admin.detail.index'))->with('success','Category create thành công');
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
        $category = Category::findOrFail($id);
        $category->update($data);
        return redirect(route('admin.detail.index'))->with('success','Category update thành công');
    }

    public function checkPostCount($id){
        $category = Category::find($id);

        $postCount = $category ? $category->posts()->count() : 0;
        return response()->json(['postCount'=>$postCount]);
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        $postCount = $category ? $category->posts()->count() : 0;

        if($postCount>0){
            $category->posts()->update(['category_id' => null]);
        }

       // $category->update(['state' => 0]);
        if ($category->delete()) {
            return response()->json(['message' => 'Xóa danh mục thành công!']);
        } else {
            return response()->json(['message' => 'Xóa không thành công, vui lòng thử lại.'], 500);
        }
       // return redirect(route('admin.detail.index'))->with('success','category delete thành công');
    }
}
