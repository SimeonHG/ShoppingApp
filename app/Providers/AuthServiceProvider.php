<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Goods' => 'App\Policies\Goods',
    ];

    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('edit-goods', function ($user, $post) {
        //     return $user->hasRole('admin') || $user->id === $post->user_id;
        // });
    }
}
