<?php

namespace App\Http\Controllers\frontend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category', 'tag')->latest()->limit(5)->get();
        return view('frontend.modules.index', compact('posts'));
    }

    public function single(){

        return view('frontend.modules.single');
    }


}
