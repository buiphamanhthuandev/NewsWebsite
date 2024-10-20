<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Detail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('category')->get();

        //lấy danh sách theo tên trả về table
        
        return view('admin.post.index',compact('posts'));
    }


    public function create()
    {
        $categories = Category::where('state',1)->get();
        return view('admin.post.create',compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name'=>'required',
            'content'=>'required',
            'author'=>'required',
            'content'=>'required',
            'category_id'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);     
        if($request->hasFile('image')){
            // Lấy tên gốc của file
            $originalName = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);
            // Lấy phần mở rộng của file
            $extension = $request->image->extension();
            // Tạo tên file mới bao gồm thời gian và tên gốc
            $imageName = $originalName . '_' . time() . '.' . $extension;  
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName; // Gán tên file cho dữ liệu để lưu vào CSDL
        }

        $data['slug'] = Str::slug($data['name'], '');

        $post = Post::create($data);

        return redirect(route('admin.post.index'))->with('success','create post success');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //lấy danh sách theo id trả về form
        $post_id = null;
        $post_id = Post::findOrFail($id);
        $categories = Category::where('state',1)->get();
        return view('admin.post.edit',compact('post_id','categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'=>'required',
            'content'=>'required',
            'content'=>'required',
            'author'=>'required',
            'detail_id'=>'required',
            'image'=>'nullable|image|mimes|:jpeg|png|jpg|gif|max:2048'
        ]);
        $data['slug'] = Str::slug($data['name'], '-');

        $post = Post::findOrFail($id);

        $post->update($data);

        return redirect(route('admin.post.index'))->with('success','post update thành công');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if($post->delete()){
            return response()->json(['message' => 'Xóa bài viết thành công!']);
        }else{
            return response()->json(['message' => 'Xóa bài viết không thành công,thử lại!']);
        }
    }
}
