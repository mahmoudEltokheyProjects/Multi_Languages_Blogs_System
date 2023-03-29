<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
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
        if(!App::runningInConsole())
        {
            Paginator::useBootstrap();
            $categories = Category::with('children')->where('parent', 0)->orWhere('parent', null)->get();
            $settings = Setting::checkSettings();
            $lastFivePosts = Post::with('category', 'user')->orderBy('id')->limit(5)->get();
            view()->share([
                'setting'=>$settings,
                'categories'=>$categories,
                'lastFivePosts'=>$lastFivePosts,
            ]);
        }
    }
}
