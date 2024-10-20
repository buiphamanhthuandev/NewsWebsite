<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Subscribe;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countPost = Post::count();
        $countCategory = Category::count();
        $countContact = Contact::count();
        $countSubscribe = Subscribe::count();
        $countComment = Comment::count();
        $countUser = User::count();

        return view('admin.home.index',compact('countPost','countCategory','countContact','countSubscribe','countComment','countUser'));
    }

    public function getChartPost(Request $request){
        $orderBy = $request->get('order_by', 'views');
        $direction = $request->get('direction', 'asc');
        $groupBy = $request->get('group_by', 'day');
        if($groupBy === 'month'){
            //lấy các tháng 
            $posts = Post::selectRaw("COUNT(id) as total , MONTH(created_at) as month")
                    ->groupBy('month')
                    ->orderBy('month','asc')
                    ->get();
        }else if($groupBy === 'week'){
            //lấy các ngày thứ trong tuần 
            $posts = Post::selectRaw("COUNT(id) as total, DAYOFWEEK(created_at) as day_of_week")
                     ->groupBy('day_of_week')
                     ->orderBy('day_of_week', 'asc')
                     ->get(); 
        }else{
            //mặc định xuất ngày / tháng / năm
            $posts = Post::selectRaw("COUNT(id) as total, $groupBy(created_at) as period")
                     ->groupBy('period')
                     ->orderBy($orderBy, $direction)
                     ->get();
        }

        return response()->json($posts);
    }


    public function getChartPieCategory(Request $request){
        $Categories = Category::select('name')
                ->where('state',1)
                ->withCount('posts')
                ->get();
        return response()->json($Categories);
    }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect(route('admin.home.index'))->with('success','del post thành công!');
    }
}
