<?php

namespace App\Exports;

use App\agendar;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StatusExport implements   FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    public function __construct(string $data_i,$data_f )
    {
        // $this->area = $area;
        $this->data_i = $data_i;
        $this->data_f = $data_f;

    }

    public function query()
    {
        return agendar::select('fornecedor','data','status','nomeStatus','area.nome')
                            ->join('area', 'agendar.id_area', '=', 'area.id')
                            ->join('status', 'agendar.status', '=', 'status.id')
                        // ->where('id_area','=',$this->area)
                        ->whereBetween('data', [$this->data_i,$this->data_f]);
    }
    public function headings(): array
    {
        return [
            'Fornecedor',
            'Data',
            'Numero status',
            'Status',
            'Area',
        ];
    }


    // public function collection()
    // {
    //     return agendar::all();
    // }

    // public function view(): View{

    //     return view('relatorios.agendaStatusPorData');


    // }
}
