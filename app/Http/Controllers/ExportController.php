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
    public function exportExcel()
    {
        $projects = Project::all();
        $hostings = Hosting::all();
        $domains = Domain::all();

        return Excel::download(new \App\Exports\ProjectExport($projects, $hostings, $domains), 'projects.xlsx');
    }
}
