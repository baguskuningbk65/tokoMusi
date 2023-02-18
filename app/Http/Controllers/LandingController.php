<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Paymentmethod;
use App\Models\Courier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // nampilin seluruh data
    public function index()
    {
        $category = Category::all();
        $product = Product::orderByDesc('product_soldout')->get();
        // return $product;
        return view('landingpage.index', compact('category', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //menampilkan data dari satu table
    {
        $product = Product::where('id', $id)->first();
        // return $product;
        return view('landingpage.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function keranjang()
    {
        // return $request;
        $cart = Cart::where('user_id', Auth::user()->id)->where('status', 'belum')->get();
        // untuk ambil semua
        // $cart = Cart::all();
        $totalharga = Cart::where('user_id', Auth::user()->id)->where('status', 'belum')->sum('total_price');
        $courier = Courier::all();
        $paymentmethod = PaymentMethod::all();
        return view('landingpage.keranjang', compact('cart', 'courier', 'paymentmethod', 'totalharga'));
    }


    public function keranjang_store(Request $request)
    {
        // return $request;
        $request->validate(
            [
                'kuantitas' => 'required',
            ],
            [
                'kuantitas.required' => 'Kuantitas  is required',
            ]
        );
        $product = Product::where('id', $request->productid)->first();
        // return $product;

        $cart = Cart::where('user_id', Auth::user()->id)->where('status', 'belum')->get();
        foreach ($cart as $item) {
            if ($item->productid == $request->productid) {
                Cart::where('product_id', $item->productid)->update([

                    'product_qty' => $item->product_qty + $request->kuantitas,
                    'total_price' => ($item->product_qty + $request->kuantitas) * $item->product->product_price
                ]);
                return redirect('/keranjang');
            }
        }
        Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->productid,
            'product_qty' =>  $request->kuantitas,
            'total_price' => ($request->kuantitas) * ($product->product_price),
            'status' => 'belum',
            'status_checkout' => 0,
        ]);
        return redirect('/keranjang');
    }

    public function transaksi(Request $request)
    {
        // return $request;
        $request->validate(
            [
                'alamat' => 'required',
                // 'invoice' =>'requeried',
                'courier' => 'required',
                'paymentmethod' => 'required',
                // 'payment_deadline'=> 'required',
                // 'courier_id' => 'required',
                'totalharga' => 'required',
                // 'cart_id'=> 'required'

            ],
            [
                'alamat' => 'please insert your address'
            ]
        );
        // INV-20211212-1
        $date = data('Ymd');
        $number = Number::first();
        $angka = $number->number;
        $invoice = "INV-$date-$angka";
        Number::where('id', 1)->update([
            'number' => $angka += 1
        ]);

        Transaction::create([
            'alamat' => $request->alamat,
            'courier_id' => $request->courier,
            'paymentmethod_id' => $request->paymentmethod,
            'total_payments' => $request->totalhorga,
            'invoce' => $invoice,
            'status' => 0,
            'payment_deadline' => date('Y-m-d H:i:s')
        ]);
        $cart = Cart::where('user_id', Auth::user()->id)->where('status', 'belum')->get();
        $transaction = Transaction::where('invoice', $invoice)->first();
        // return $transaction;
        foreach ($cart as $item) {
            Cart::where('id', $item->id)->where('status', 'belum')->update([
                'transaction_id' => $transaction->id,
                'status' => 'sudah'
            ]);
        }
        return redirect('/pembayaran/' . $invoice)->with('status', 'added successfully');
    }
    public function pembayaran($inv)
    {
        $transaction = Transaction::where('invoice', $inv)->first();
        // return $transaction;
        $bataspembayaran = date('d M y h:i:s', strtotime('+1 days', strtotime($transaction->created_at)));
        // return $bataspembayaran;
        return view('landingpage.pembayaran', compact('transaction', 'bataspembayaran'));
    }
    public function history()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->where('status', 'sudah')->get();

        return view('landing.history', compact('cart'));
    }
}
