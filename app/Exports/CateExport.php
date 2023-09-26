<?php

namespace App\Exports;
use App\Models\CategoryModel;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomChunkSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromCollection;

class CateExport implements FromCollection, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return CategoryModel::select("category_id", "category_name", "category_keyword")->get();
    }

    /**
     * @return string[]
     */
    public function headings(): array
    {
        return ["ID", "Name", "Key"];
    }
}
