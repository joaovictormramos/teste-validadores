<?php

namespace App\Exports;

use App\Models\Bandeira;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BandeiraExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    use Exportable;

    public function headings(): array
    {
        return [
            '#',
            'Bandeira',
            'CNPJ',
            'Grupo Econômico'
        ];
    }

    public function collection()
    {
        return Bandeira::with('grupoEconomico')->get();
    }

    public function map($bandeira): array
    {
        return [
            $bandeira->id,
            $bandeira->band_name,
            $bandeira->cnpj,
            optional($bandeira->grupoEconomico)->group_name ?? 'Sem grupo'
        ];
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
