<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Product_in;
use App\Models\Product_out;
use App\Models\Supplier;
use Illuminate\Http\Request;
use \PDF;

class PDFController extends Controller
{
    public function exportPDF()
    {
        $products = Product::orderBy('name', 'ASC')
            ->get()
            ->pluck('name', 'id');

        $suppliers = Supplier::orderBy('name', 'ASC')
            ->get()
            ->pluck('name', 'id');

        $invoice_data = Product_in::all();
        $pdf = PDF::loadView('product_in.exportPDF',[
            'products' => $products,
            'suppliers' => $suppliers,
            'invoice_data' => $invoice_data,
        ]);
        return $pdf->download('HoaDonNhapHang.pdf');
    }

    public function exportPDFProductOut()
    {
        $products = Product::orderBy('name','ASC')
        ->get()
        ->pluck('name','id');

        $customers = Customer::orderBy('name','ASC')
        ->get()
        ->pluck('name','id');

        $invoice_data = Product_out::all();
        $pdf = PDF::loadView('product_out.exportPDF',[
            'products' => $products,
            'customers' => $customers,
            'invoice_data' => $invoice_data,
        ]);
        return $pdf->download('HoaDonBanHang.pdf');
    }
}
