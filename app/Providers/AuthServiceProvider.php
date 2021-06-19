<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use App\Policies\ProductPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Product::class => ProductPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('login', function($user){
            if ($user->role === User::EMPLOYER || $user->role === User::ADMIN) {
                return true;
            }else{
                return false;
            }
        });
        $this->registerPolicies();
        Gate::define('login-admin', function($user){
            if ($user->role === User::ADMIN) {
                return true;
            }else{
                return false;
            }
        });

        Gate::define('update-product', function($user, $product){
            if ($user->id == $product->user_id) {
                return true;
            }else{
                return false;
            }
        });

    }
}
