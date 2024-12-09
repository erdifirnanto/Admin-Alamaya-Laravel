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
        View::share('totalClients', Client::count());
        View::share('totalProjects', Project::count());
        // $projectOnProgressCount = Project::whereIn('status', ['Slicing', 'Mindmap', 'Design', 'new_project'])->count();
        // View::share('totalProjects', $projectOnProgressCount);

        $projectOnProgressCount = Project::where('category', '!=', 'Maintenance')->count();
        View::share('totalProjects', $projectOnProgressCount);

        // View::share('totalProjects', Project::count());
        $maintenanceProjectsCount = Project::where('category', 'Maintenance')->count();
        View::share('totalMaintenanceProjects', $maintenanceProjectsCount);

        // // Daftar interval pengingat
        // $reminderIntervals = [30, 25, 20, 15, 10, 5, 4, 3, 2, 1];
        // $now = Carbon::now();
        // $notifications = [];

        // // Ambil semua domain
        // $domains = Domain::all();

        // foreach ($domains as $domain) {
        //     $expiredDate = Carbon::parse($domain->expired);
        //     $daysRemaining = $now->diffInDays($expiredDate, false); // false untuk menghitung dengan arah yang benar

        //     // Periksa apakah sisa hari kedaluwarsa sesuai dengan interval yang telah ditentukan
        //     if (in_array($daysRemaining, $reminderIntervals)) {
        //         $notifications[] = [
        //             'domain' => $domain->name,
        //             'days_remaining' => $daysRemaining,
        //             'expired_date' => $domain->expired->toDateString(),
        //         ];
        //     }
        // }

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
    }
}
