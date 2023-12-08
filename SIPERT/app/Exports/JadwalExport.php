<?php

namespace App\Exports;

use App\Models\Jadwal;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


// class JadwalExport implements FromCollection ,ShouldAutoSize,WithHeadings,WithEvents
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return Jadwal::all();
//     }

//     public function headings(): array
//     {
//         return [
//             'No',
//             'Tanggal',
//             'Lokasi',
//             'Nama Petugas',
//             'Tugas dan Pekerjaan',
//         ];
//     }
   
//     public function registerEvents(): array
//     {
//         return [
//             AfterSheet::class => function(AfterSheet $event){
//                 $event->sheet->getStyle('A1:E1')->applyFromArray([
//                     'font' => ['bold'=>true
//                     ]
//                 ]);
//             }
//         ];
//     }
// }

class JadwalExport implements FromView,ShouldAutoSize
{
    public function view(): View
    {
        return view('page.web.jadwal.excel', [
            'collection' => Jadwal::whereMonth('tanggal',date('m'))->get()
        ]);
    }
}