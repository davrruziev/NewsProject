<?php

namespace App\Providers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        view()->composer('layouts.site',function($view){
            $categories=Category::all();
            $ad=Ad::first();
            $view->with(compact('categories','ad'));
        });

        view()->composer('sections.popularNews',function($view){
            $popularposts=Post::limit(4)->orderBy('view','DESC')->get();
            $ad=Ad::first();
            $view->with(compact('popularposts','ad'));
        });
    }
}
