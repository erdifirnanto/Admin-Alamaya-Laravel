<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DomainExport implements FromCollection, WithHeadings
{
    protected $domains;

    public function __construct($domains)
    {
        $this->domains = $domains;
    }

    public function collection()
    {
        $data = [];

        foreach ($this->domains as $domain) {
            $data[] = [
                'Type' => 'Domain',
                'Project Name' => $domain->project_name ?? 'N/A', // Gunakan 'N/A' jika null
                'Status' => $domain->status ?? 'Unknown',
                'Tanggal Masuk' => $domain->join_date ?? 'N/A',
                'Deadline' => $domain->expired ?? 'N/A',
            ];
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'Type',
            'Project Name',
            'Status',
            'Tanggal Masuk',
            'Deadline',
        ];
    }
}
