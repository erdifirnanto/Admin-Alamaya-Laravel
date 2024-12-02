<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Client;
use App\Models\Project;

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
        View::share('totalClients', Client::count());
        View::share('totalProjects', Project::count());
        $projectOnProgressCount = Project::whereIn('status', ['Slicing', 'Mindmap', 'Design', 'new_project'])->count();
        View::share('totalProjects', $projectOnProgressCount);

        // View::share('totalProjects', Project::count());
        $maintenanceProjectsCount = Project::where('status', 'Maintenance')->count();
        View::share('totalMaintenanceProjects', $maintenanceProjectsCount);
    }
}
