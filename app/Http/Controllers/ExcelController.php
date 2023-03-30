<?php

namespace App\Http\Controllers;

use App\Exports\ProductInExport;
use App\Exports\ProductInExportView;
use App\Exports\ProductOutExportView;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function export()
    {
        return Excel::download(new ProductInExportView, 'productIn.xlsx');
    }

    public function exportProductOut()
    {
        return Excel::download(new ProductOutExportView, 'productOut.xlsx');
    }
}
