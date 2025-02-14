<?php

namespace App\Exports;

use App\Models\GrupoEconomico;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class GrupoEconomicoExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    use Exportable;

    public function headings(): array
    {
        return [
            '#',
            'Grupo Econômico',
            'CNPJ',
        ];
    }

    public function collection()
    {
        return GrupoEconomico::select('id', 'group_name', 'cnpj')->get();
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'size' => 12,
                    'color' => ['argb' => '000000'],
                ],
                'alignment' => [
                    'horizontal' => 'center',
                    'vertical' => 'center',
                ],
            ],

            '2:100' => [
                'alignment' => [
                    'horizontal' => 'center',
                    'vertical' => 'center',
                ],
            ],
        ];
    }
}
