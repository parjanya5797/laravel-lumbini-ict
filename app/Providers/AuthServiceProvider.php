<?php

namespace App\Providers;

use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
    * The policy mappings for the application.
    *
    * @var array
    */
    protected $policies = [
        // 'App\Blogs' => 'App\Policies\BlogPolicy',
        // 'App\TodosList' => 'App\Policies\TodosPolicy',
    ];
    
    /**
    * Register any authentication / authorization services.
    *
    * @return void
    */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define('checkBlogUser',function($user,$blog){
            return $user['id'] == $blog['user_id'];
        });

        Gate::define('can-add-blog',function($user)
        {
            return $user->canAddBlog();
        });


        
        

        
    }
}
