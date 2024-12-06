<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Client;
use App\Models\Project;
use App\Models\Domain;
use Carbon\Carbon;
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
        View::share('totalClients', Client::count());
        View::share('totalProjects', Project::count());
        // $projectOnProgressCount = Project::whereIn('status', ['Slicing', 'Mindmap', 'Design', 'new_project'])->count();
        // View::share('totalProjects', $projectOnProgressCount);

        $projectOnProgressCount = Project::where('category', '!=', 'Maintenance')->count();
        View::share('totalProjects', $projectOnProgressCount);

        // View::share('totalProjects', Project::count());
        $maintenanceProjectsCount = Project::where('category', 'Maintenance')->count();
        View::share('totalMaintenanceProjects', $maintenanceProjectsCount);

        // Daftar interval pengingat
        $reminderIntervals = [30, 25, 20, 15, 10, 5, 4, 3, 2, 1];
        $now = Carbon::now();
        $notifications = [];

        // Ambil semua domain
        $domains = Domain::all();

        foreach ($domains as $domain) {
            $expiredDate = Carbon::parse($domain->expired);
            $daysRemaining = $now->diffInDays($expiredDate, false); // false untuk menghitung dengan arah yang benar

            // Periksa apakah sisa hari kedaluwarsa sesuai dengan interval yang telah ditentukan
            if (in_array($daysRemaining, $reminderIntervals)) {
                $notifications[] = [
                    'domain' => $domain->name,
                    'days_remaining' => $daysRemaining,
                    'expired_date' => $domain->expired->toDateString(),
                ];
            }
        }
        // Log::info('Notifikasi Domain:', $notifications);
        // Bagikan data notifikasi ke seluruh view
        View::share('notifications', $notifications);
    }
}
