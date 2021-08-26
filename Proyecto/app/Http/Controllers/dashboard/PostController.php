<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostPost;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Post::class, 'post');
        //$this->middleware('rol.admin');
    }

    public function index()
    {
        $posts = Post::with('category')->orderBy('created_at','desc')->paginate(4);

        return view("dashboard.post.index",['posts'=> $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::pluck('id','title');
        $categories = Category::pluck('id', 'title');
        return view("dashboard.post.create",['post' => new Post(), "categories"=>$categories, "tags" => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostPost $request)
    {
        //dd($request->validated());
        //dd($request->all());
        //return "Alan".$request->input('title');

        $post = Post::create($request->validated());
        PostImage::create(['image'=> 'postIconDefault.png', 'post_id'=>$post->id]);
        $post->tags()->sync($request->tags_id);

        return back()->with('status','Post create with exit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //$post = Post::findOrFail($id);

        return view("dashboard.post.show",["post"=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::pluck('id','title');

        $categories = Category::pluck('id', 'title');
        return view("dashboard.post.edit",["post"=>$post, "categories"=>$categories, "tags" => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostPost $request, Post $post)
    {
        $post->tags()->sync($request->tags_id);
        $post->update($request->validated());

        return back()->with('status','Post updated successfully');
    }

    public function image(Request $request, Post $post)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,bmp,png|max:10240',
        ]);

        $filename = time().".".$request->image->extension();

        $request->image->move(public_path('images'), $filename);
        $img = PostImage::find($post->id);
        $img->image = $filename;
        $img->save();
        //dd($img->image);
        //dd($filename);
        //dd($img);
        //PostImage::create(['image'=>$filename, 'post_id'=>$post->id]);
        //$img->image()->save($filename);
        return back()->with('status','Image updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('status','Post deleted successfully');
    }
}
