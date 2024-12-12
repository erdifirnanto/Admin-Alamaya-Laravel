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

        // Domain Expired Notification
        // Tanggal hari ini
        $today = Carbon::today();

        // Ambil data dari tabel 'domain'
        $domains = DB::table('domains')->select('id', 'domain', 'expired')->get();

        $notifications = [];

        foreach ($domains as $domain) {
            // Hitung selisih tanggal
            $interval = $today->diffInDays(Carbon::parse($domain->expired), false);

            // Tentukan pesan berdasarkan selisih
            if ($interval === 1) {
                $notifications[] = "Domain <strong>{$domain->domain}</strong> akan kedaluwarsa besok.";
            } elseif ($interval === 2) {
                $notifications[] = "Domain <strong>{$domain->domain}</strong> akan kedaluwarsa dalam 2 hari.";
            } elseif ($interval === 3) {
                $notifications[] = "Domain <strong>{$domain->domain}</strong> akan kedaluwarsa dalam 3 hari.";
            } elseif ($interval === 0) {
                $notifications[] = "Domain <strong>{$domain->domain}</strong> kedaluwarsa hari ini.";
            }
        }

        // Kirim notifikasi ke view
        // return view('domains.notifications', compact('notifications'));
        // Log::info('Notifikasi Domain:', $notifications);
        // Bagikan data notifikasi ke seluruh view
        View::share('notifications', $notifications);

        // Project Deadline Notification
        // Tanggal hari ini
        $today1 = Carbon::today();

        // Ambil data dari tabel 'domain'
        $projects = DB::table('projects')->select('id', 'project_name', 'deadline')->get();

        $notifications1 = [];

        foreach ($projects as $project) {
            // Hitung selisih tanggal
            $interval1 = $today1->diffInDays(Carbon::parse($domain->expired), false);

            // Tentukan pesan berdasarkan selisih
            if ($interval1 === 1) {
                $notifications1[] = "Project <strong>{$project->project_name}</strong> akan kedaluwarsa besok.";
            } elseif ($interval1 === 2) {
                $notifications1[] = "Project <strong>{$project->project_name}</strong> akan kedaluwarsa dalam 2 hari.";
            } elseif ($interval1 === 3) {
                $notifications1[] = "Project <strong>{$project->project_name}</strong> akan kedaluwarsa dalam 3 hari.";
            } elseif ($interval1 === 0) {
                $notifications1[] = "Project <strong>{$project->project_name}</strong> kedaluwarsa hari ini.";
            }
        }

        View::share('notifications1', $notifications1);
    }
}
