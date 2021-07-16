<?php

namespace App\Providers;

use App\Blogs;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $post = Blogs::where('show',1)->get();
        $post_count = Blogs::where('show',1)->count();
        View::share('post_notification',$post);
        View::share('post_count',$post_count);

    }
}
