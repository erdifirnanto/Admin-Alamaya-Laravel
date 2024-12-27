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
    protected $hostings;
    protected $domains;

    public function __construct($projects, $hostings, $domains)
    {
        $this->projects = $projects;
        $this->hostings = $hostings;
        $this->domains = $domains;
        // dd($projects, $hostings, $domains);
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

        // Gabungkan data hostings
        foreach ($this->hostings as $hosting) {
            $data[] = [
                'Hosting Name' => $hosting->name,
                'Hosting Description' => $hosting->description,
                // Tambahkan kolom lain yang relevan dengan Hosting
            ];
        }

        // Gabungkan data domains
        foreach ($this->domains as $domain) {
            $data[] = [
                'Type' => 'Domain',
                'Project Name' => $domain->project_name,
                'Status' => $domain->status,
                'Tanggal Masuk' => $domain->join_date,
                'Deadline' => $domain->expired,
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
            'Spasi',
            'Type',
            'Project Name',
            'Status',
            'Tanggal Masuk',
            'Expired',

        ];
    }
}
