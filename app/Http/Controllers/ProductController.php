<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Whoops\Run;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products = Product::all();
       return view('product.index', [
        'products' => $products
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.insert',[
            'categories' => $categories
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

        $request->validate([
            'id' => 'required|unique:products',
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',

            'image' => 'required|image|mimes:jpg,png,jpeg|max:5048',
            'qty' => 'required',
        ]);

        $newImagename = time() . '-' . $request->name . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImagename);

        Product::create([
            'id' => $request->id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'image' =>  $newImagename,
            'qty' => $request->qty,
            'updated_at'=> Carbon::now(),
        ]);


        return redirect()->route('product.index')->with('message', 'Thêm sản phẩm thành công!');

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
        $product = Product::find($id);
        $categories = Category::all();
        return view('product.edit',[
            'product' => $product,
            'categories' => $categories
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

        $request->validate([
            'id' => 'required',
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',

            'qty' => 'required',
        ]);

        Product::find($id)->update([
            'id' => $request->id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty,
            'updated_at'=> Carbon::now(),
        ]);


        return redirect()->route('product.index')->with('message', 'Update sản phẩm thành công!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('product.index')->with('message', 'Xóa sản phẩm thành công!');

    }
}
