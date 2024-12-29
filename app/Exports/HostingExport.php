<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HostingExport implements FromCollection, WithHeadings
{
    protected $hostings;

    public function __construct($hostings)
    {
        $this->hostings = $hostings;
    }

    public function collection()
    {
        // Gabungkan data dari tabel hosting
        $data = [];

        foreach ($this->hostings as $hosting) {
            $data[] = [
                'Type' => 'Hosting',
                'Project Name' => $hosting->project_name,
                'Package' => $hosting->package,
                'Domain' => $hosting->domain,
                'Status' => $hosting->status,
                'Join Date' => $hosting->join_date,
                'Expired' => $hosting->expired,
            ];
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'Type',
            'Project Name',
            'Package',
            'Domain',
            'Status',
            'Join Date',
            'Expired',
        ];
    }
}
