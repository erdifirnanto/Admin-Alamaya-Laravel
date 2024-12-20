<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Client;
use App\Models\Project;
use App\Models\Domain;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        // View::share('totalClients', Client::count());
        // View::share('totalProjects', Project::count());
        // $projectOnProgressCount = Project::whereIn('status', ['Slicing', 'Mindmap', 'Design', 'new_project'])->count();
        // View::share('totalProjects', $projectOnProgressCount);

        $selesaiCount = Project::where('status', 'selesai')->count();
        View::share('totalSelesai', $selesaiCount);

        $projectOnProgressCount = Project::where('category', '!=', 'Maintenance')->count();
        View::share('totalProjects', $projectOnProgressCount);

        // View::share('totalProjects', Project::count());
        $maintenanceProjectsCount = Project::where('category', 'Maintenance')->count();
        View::share('totalMaintenanceProjects', $maintenanceProjectsCount);

        // Notifikasi Domain dan Project
        $today = Carbon::today();

        $notifications = [];

        // Notifikasi Domain
        $domains = DB::table('domains')->select('id', 'domain', 'expired')->get();

        foreach ($domains as $domain) {
            // Hitung selisih tanggal
            $interval = $today->diffInDays(Carbon::parse($domain->expired), false);

            // Tentukan pesan berdasarkan selisih
            if ($interval === 10) {
                $notifications[] = "Domain <strong>{$domain->domain}</strong> akan kedaluwarsa dalam 10 hari.";
            } elseif ($interval === 20) {
                $notifications[] = "Domain <strong>{$domain->domain}</strong> akan kedaluwarsa dalam 20 hari.";
            } elseif ($interval === 30) {
                $notifications[] = "Domain <strong>{$domain->domain}</strong> akan kedaluwarsa dalam 30 hari.";
            } elseif ($interval === 0) {
                $notifications[] = "Domain <strong>{$domain->domain}</strong> kedaluwarsa hari ini.";
            }
        }

        // Notifikasi Proyek
        $projects = DB::table('projects')->select('id', 'project_name', 'deadline')->get();

        foreach ($projects as $project) {
            // Hitung selisih tanggal
            $interval = $today->diffInDays(Carbon::parse($project->deadline), false);

            // Tentukan pesan berdasarkan selisih
            if ($interval === 10) {
                $notifications[] = "Project <strong>{$project->project_name}</strong> deadline sisa 10 hari.";
            } elseif ($interval === 20) {
                $notifications[] = "Project <strong>{$project->project_name}</strong> deadline sisa 20 hari.";
            } elseif ($interval === 30) {
                $notifications[] = "Project <strong>{$project->project_name}</strong> deadline sisa 30 hari.";
            } elseif ($interval === 0) {
                $notifications[] = "Project <strong>{$project->project_name}</strong> deadline hari ini.";
            }
        }

        // Bagikan data notifikasi ke seluruh view
        View::share('notifications', $notifications);
    }
}
