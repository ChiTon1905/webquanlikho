<?php

namespace App\Exports;

use App\Models\Product_in;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductInExportView implements FromView
{
    public function view(): View
    {
        return view('product_in.exportExcel',[
            'product_in' => Product_in::all()
        ]);
    }
}
