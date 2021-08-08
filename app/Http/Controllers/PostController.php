<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Post\CreateRequest;
use App\Http\Requests\Post\EditRequest;
class PostController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $items = Post::whereRaw('id>0');//كلهم
        
        $q = request()->q;
        $category_id = request()->category_id;
        $published = request()->published;
        if($q)
            $items->where('title','like',"%$q%");
        if($published=='0' || $published=='1')
            $items->where('published',$published);        
        if($category_id)
            $items->where('category_id', $category_id);

        $items = $items->orderBy('id','desc')->paginate(10)->appends([
            'q'=>$q,
            'published'=>$published,
            'category_id'=>$category_id
        ]);
        return view("post.index",compact('items','categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view("post.create",compact('categories'));
    }

    public function store(CreateRequest $request)
    {
        $data = $request->all();
        $imagePath = $request->image->store('public/images');
        $data['image'] = $request->image->hashName();
        Post::create($data);
        return redirect(route('post.create'))->with('msg','Post Created Successfuly');
    }

    public function show(Post $post)
    {
        if(!$post)
            return redirect(route('post.index'))->with("Invalid Post ID");
        $categories = Category::all();
        return view('post.show',compact('post','categories'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        if(!$post)
            return redirect(route('post.index'))->with("Invalid Post ID");
        $categories = Category::all();
        return view('post.edit',compact('post','categories'));
    }

    public function update(EditRequest $request, Post $post)
    {
        if(!$post)
            return redirect(route('post.index'))->with("Invalid Post ID");
        $data = $request->all();
        if($request->image){
            $imagePath = $request->image->store('public/images');
            $data['image'] = $request->image->hashName();
        }
        $post->update($data);
        return redirect(route('post.index'))->with("Updated Successfully");
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('post.index'))->with("Post Deleted Successfully");
    }
}
