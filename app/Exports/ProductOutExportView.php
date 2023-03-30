<?php

namespace App\Exports;

use App\Models\Product_out;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class ProductOutExportView implements FromView
{
    public function view(): View
    {
        return view('product_out.exportExcel',[
            'product_out' => Product_out::all()
        ]);
    }
}
