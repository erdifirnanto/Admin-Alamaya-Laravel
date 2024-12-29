<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Hosting;
use App\Models\Project;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportController extends Controller
{
    // Export ke Excel
    public function exportProject()
    {
        $projects = Project::all();

        return Excel::download(new \App\Exports\ProjectExport($projects), 'projects.xlsx');
    }

    // Export ke Excel
    public function exportDomain()
    {
        $domains = Domain::all();

        return Excel::download(new \App\Exports\DomainExport($domains), 'Domains.xlsx');
    }

    // Export ke Excel
    public function exportHosting()
    {
        $hostings = Hosting::all();

        return Excel::download(new \App\Exports\HostingExport($hostings), 'Hostings.xlsx');
    }
}
