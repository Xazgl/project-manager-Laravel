<?php

namespace App\Providers;

use App\Models\Task;
use App\Policies\TaskPolicy;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Task::class=>TaskPolicy::class
    ];
}
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
 /*public function boot()
    {
        $this->registerPolicies();

        $this->registerPolicies();
        Gate::define('update-my_task',function (Auth::$user(),$task_id) {
        return $user->id===$task_user->user_id;
    })
        //Gate::define('update-post',function (Auth::$user())

        //
    } */


