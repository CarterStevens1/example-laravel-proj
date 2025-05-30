<?php
// FILE FOR CONFIGURING APPLICATION


namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
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
        //prevent lazy loading on the app.
        // Model::preventLazyLoading(!app()->isProduction());
        Model::preventLazyLoading();

        // // If wanting to change from tailwind etc.
        // Paginator::useBootstrapFive();

        // Gate::define('edit-job', function (?User $user, Job $job) {
        //     return $job->employer->user->is($user);
        // });
    }
}
