<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Paginator::useBootstrap();
        $categories = Category::where('status', 1)->orderBy('order_by', 'ASC')->get();
        $tags = Tag::with('post')->orderBy('order_by', 'asc')->limit(7)->get();
        $recentPost=Post::where('is_approved', 1)->where('status', 1)->latest()->take(5)->get();
        view()->share([
                'categories'=> $categories,
                'tags'=> $tags,
                'recentPost'=> $recentPost,
            ]
        );
    }
}
