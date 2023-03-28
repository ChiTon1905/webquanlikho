<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_in;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ProductInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('name', 'ASC')
            ->get()
            ->pluck('name', 'id');

        $suppliers = Supplier::orderBy('name', 'ASC')
            ->get()
            ->pluck('name', 'id');

        $invoice_data = Product_in::all();
        return view('product_in.index', compact('products', 'suppliers', 'invoice_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('product_in.insert', [
            'products' => $products,
            'suppliers' => $suppliers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'product_id'     => 'required',
            'supplier_id'    => 'required',
            'qty'            => 'required',
            'date'        => 'required'
        ]);


        Product_in::create([
            'id' => $request->id,
            'product_id' => $request->product_id,
            'supplier_id' => $request->supplier_id,
            'qty' => $request->qty,
            'date' => $request->date,
            'updated_at' => Carbon::now(),
        ]);

        $product = Product::findOrFail($request->product_id);
        $product->qty += $request->qty;
        $product->save();

        return redirect()->route('productIn.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productIn = Product_in::find($id);
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('product_in.edit', [
            'products' => $products,
            'suppliers' => $suppliers,
            'productIn' => $productIn,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [
            'id' => 'required',
            'product_id'     => 'required',
            'supplier_id'    => 'required',
            'qty'            => 'required',
            'date'        => 'required'
        ]);


        Product_in::find($id)->update([
            'id' => $request->id,
            'product_id' => $request->product_id,
            'supplier_id' => $request->supplier_id,
            'qty' => $request->qty,
            'date' => $request->date,
            'updated_at' => Carbon::now(),
        ]);

        $product = Product::findOrFail($request->product_id);
        $product->qty += $request->qty;
        $product->save();

        return redirect()->route('productIn.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product_in::findOrFail($id)->delete();

        return redirect()->route('productIn.index')->with('message', 'Xóa sản phẩm thành công!');
    }

}
