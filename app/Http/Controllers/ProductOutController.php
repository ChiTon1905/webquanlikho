<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Product_out;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProductOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('name','ASC')
        ->get()
        ->pluck('name','id');

        $customers = Customer::orderBy('name','ASC')
        ->get()
        ->pluck('name','id');

        $invoice_data = Product_out::all();
        return view('product_out.index', compact('products','customers', 'invoice_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('product_out.insert', [
            'products' => $products,
            'customers' => $customers,
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
            'customer_id'    => 'required',
            'qty'            => 'required',
            'date'        => 'required'
        ]);
        $customer = Customer::findOrFail($request->customer_id);
        $product = Product::findOrFail($request->product_id);
        $product->qty -= $request->qty;
        if($product->qty <= 0){
            return redirect()->route('productOut.create')->with('message','không đủ số lượng sản phẩm');
        }
        else{
            Product_out::create([
                'id' => $request->id,
                'product_id' => $request->product_id,
                'customer_id' => $request->customer_id,
                'qty' => $request->qty,
                'date' => $request->date,
                'updated_at' => Carbon::now(),
            ]);
            $product->save();

            //send mail
            $name = 'Nhan vien Inventory';
            $product_name = $product->name;
            $product_qty = $request->qty;

            $customer_name = $customer->name;
            $price = $product->qty * $product->price;
            $date = $request->date;
            Mail::send('email.contact-form',
            compact('name', 'product_name','product_qty','customer_name','price','date')
            , function($email) use($name){
                $email->subject('Chi tiết đơn hàng');
                $email->to('toncodedemo@gmail.com',$name);
            });
            //toncodedemo@gmail.com nay la demo neu ban hang thi lay email cua table khach hang(customer)
            return redirect()->route('productOut.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productOut = Product_out::find($id);
        $customers = Customer::all();
        $products = Product::all();
        return view('product_out.edit', [
            'products' => $products,
            'customers' => $customers,
            'productOut' => $productOut,
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
            'customer_id'    => 'required',
            'qty'            => 'required',
            'date'        => 'required'
        ]);

        $product = Product::findOrFail($request->product_id);
        $product->qty -= $request->qty;

        if($product->qty <= 0){
            $productOut = Product_out::find($id);
            return redirect()->route('productOut.index')->with('message','không đủ số lượng sản phẩm');
        }
        else{
            Product_out::find($id)->update([
                'id' => $request->id,
                'product_id' => $request->product_id,
                'customer_id' => $request->customer_id,
                'qty' => $request->qty,
                'date' => $request->date,
                'updated_at' => Carbon::now(),
            ]);
            $product->save();

            return redirect()->route('productOut.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product_out::findOrFail($id)->delete();

        return redirect()->route('productOut.index')->with('message', 'Xóa thành công!');
    }
}
