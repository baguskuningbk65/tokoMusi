<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('product.index', compact("product"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'categoryid' => 'required',
                'image' => 'required',
                'productname' => 'required| min : 3 | max : 100',
                'productstock' => 'required| min : 0 | max : 100000000',
                'productprice' => 'required| min : 0 | max : 100000000',
                'productdescription' => 'required| min : 5 | max : 100',
                'condition' => 'required',
                'weight' => 'required',
            ],
            [
                'categoryid.required' => 'Category id is required',
                'image' => 'image is required',
                'productname.min' => 'min 3 words',
                'productname.max' => 'max 100 words',
                'productstock.pricerequired' => 'Product stock is required',
                'productstock.max' => 'max 100000000',
                'productprice.required' => 'Product price is required',
                'productprice.max' => 'max 100000000',
                'productdescription.min' => 'min 3 words',
                'productdescription.max' => 'max 100 words',
            ]
        );
        $img = $request->file('image'); //mengambil file dari form
        $filename = time() . "_" . $img->getClientOriginalName(); //mengambil dan mengedit nama file dari form
        $img->move('img', $filename); //proses memasukkan image kedalam direktori laravel

        Product::create(
            [
                'category_id' => $request->categoryid,
                'image' => $filename,
                'product_name' => $request->productname,
                'product_stock' => $request->productstock,
                'product_price' => $request->productprice,
                'product_description' => $request->productdescription,
                'product_review' => 0,
                'product_soldout' => 0,
                'condition' => $request->condition,
                'weight' => $request->weight,
            ]
        );
        return redirect('/product')->with('status', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::all();
        return view('product.update', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate(
            [
                'category_id' => 'required',
                'image' => 'required',
                'productname' => 'required| min : 3 | max : 100',
                'productstock' => 'required| min : 0 | max : 100000000',
                'productprice' => 'required| min : 0 | max : 100000000',
                'productdescription' => 'required| min : 5 | max : 100',
                'condition' => 'required',
                'weight' => 'required',
            ],
            [
                'categoryid,required' => 'Category id is required',
                'image' => 'image is required',
                'productname,min' => 'min 3 words',
                'productname,max' => 'max 100 words',
                'productstock,required' => 'Product stock is required',
                'productstock,max' => 'max 100000000',
                'productprice,required' => 'Product price is required',
                'productprice,max' => 'max 100000000',
                'productdescription,min' => 'min 5 words',
                'productdescription,max' => 'max 100 words',
            ]
        );

        if ($request->image != null) {
            $img = $request->file('image'); //mengambil dari form
            $filename = time() . "_" . $img->getClientOriginalName();
            $img->move('img', $filename);
            product::where('id', $product->id)->update(
                [
                    'category_id' => $request->categoryid,
                    'product_name' => $request->productname,
                    'product_stock' => $request->productstock,
                    'product_price' => $request->productprice,
                    'productdescription' => $request->productdescription,
                    'product_review' => 0,
                    'product_soldout' => 0,
                ]
            );
        } else {
            product::where('id', $product->id)->update(
                [
                    'category_id' => $request->categoryid,
                    'product_name' => $request->productname,
                    'product_stock' => $request->productstock,
                    'product_price' => $request->productprice,
                    'productdescription' => $request->productdescription,
                    'product_review' => 0,
                    'product_soldout' => 0,
                ]

            );
        }
        return redirect('/product')->with('status', 'Update Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy('id', $product->id);
        return redirect('/product');
    }
}
