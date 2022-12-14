<?php

namespace App\Http\Controllers\backend;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('tag', 'category', 'SubCategory', 'user')->paginate(5);
        return view('backend.modules.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::select('name', 'id')->where('status', 1)->get();
        return view('backend.modules.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $post_data = $request->except( ['slug', 'tag_ids', 'post_img'] );
        $post_data['slug'] = Str::slug($request->input('slug'));
        $post_data['user_id'] = Auth::user()->id;
        $post_data['is_approved'] = 1;

        if ($request->hasFile('post_img')){
            $file = $request->file('post_img');
            $name = Str::slug($request->input('slug'));
            $height = 400;
            $width = 1000;
            $thumb_height = 150;
            $thumb_width = 300;
            $path = '/images/post/original/';
            $thumb_path = '/images/post/thumbnail/';
            $post_data['post_img'] = ImageUploadController::ImageUpload($name, $height, $width, $path, $file);
            ImageUploadController::ImageUpload($name, $thumb_height, $thumb_width, $thumb_path, $file);
        }

        $post = Post::create($post_data);
        $post->tag()->attach( $request->input('tag_ids') );
        return redirect()->route('post.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->load('tag', 'category', 'SubCategory', 'user');
        return view('backend.modules.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::select('name', 'id')->where('status', 1)->get();
        $selected_tags = DB::table('post_tag')->where('post_id', $post->id)->pluck('tag_id', 'id')->toArray();
        // $selected_tags = $post->tag->pluck('id')->toArray();

        return view('backend.modules.post.edit', compact('post','categories', 'tags', 'selected_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $post_data = $request->except( ['slug', 'tag_ids', 'post_img'] );
        $post_data['slug'] = Str::slug($request->input('slug'));
        $post_data['user_id'] = Auth::user()->id;
        $post_data['is_approved'] = 1;

        if ($request->hasFile('post_img')){
            $file = $request->file('post_img');
            $name = Str::slug($request->input('slug'));
            $height = 400;
            $width = 1000;
            $thumb_height = 150;
            $thumb_width = 300;
            $path = '/images/post/original/';
            $thumb_path = '/images/post/thumbnail/';
            ImageUploadController::ImageUnlink($path, $post->post_img);
            ImageUploadController::ImageUnlink($thumb_path, $post->post_img);
            $post_data['post_img'] = ImageUploadController::ImageUpload($name, $height, $width, $path, $file);
            ImageUploadController::ImageUpload($name, $thumb_height, $thumb_width, $thumb_path, $file);
        }

        $post->update($post_data);
        $post->tag()->sync( $request->input('tag_ids') );
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
