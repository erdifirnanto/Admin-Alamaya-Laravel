<?php

namespace App\Exports;

use App\Models\Project;
use App\Models\Hosting;
use App\Models\Domain;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProjectExport implements FromCollection, WithHeadings
{
    protected $projects;

    public function __construct($projects)
    {
        $this->projects = $projects;
    }

    public function collection()
    {
        // Gabungkan data dari ketiga tabel
        $data = [];

        // Gabungkan data projects
        foreach ($this->projects as $project) {
            $data[] = [
                'Type' => 'Project',
                'Project Name' => $project->project_name,
                'Category' => $project->category,
                'Project Handler' => $project->project_handler,
                'Status' => $project->status,
                'Tanggal Masuk' => $project->tanggal_masuk_project,
                'Deadline' => $project->deadline,
                'Client Name' => $project->client_name,
                'Company Name' => $project->company_name,
                'Email' => $project->email,
                'Phone' => $project->phone,
                'Address' => $project->address,
            ];
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'Type',
            'Project Name',
            'Category',
            'Project Handler',
            'Status',
            'Tanggal Masuk',
            'Deadline',
            'Client Name',
            'Company Name',
            'Email',
            'Phone',
            'Address',
        ];
    }
}
