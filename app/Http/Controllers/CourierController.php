<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courier = Courier::all();
        return view('courier.index', compact('courier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courier.create');
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
                'couriername' => 'required|min:3|max:100',
                'totalongkir' => 'required'
            ],
            [
                'couriername.required' => 'Courier name is required',
                'couriername.min' => 'min 3 words',
                'couriername.max' => 'max 100 words',
                'totalongkir.required' => 'Total ongkir is required',
            ]
        );
        Courier::create(
            [
                'courier_name' => $request->couriername,
                'total_ongkir' => $request->totalongkir,
            ]
        );
        return redirect('/courier')->with('status', 'Added Successfully');
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
        return view('courier.update', compact('courier'));
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
        $request->validate(
            [
                'couriername' => 'required|min:3|max:100',
                'totalongkir' => 'required',

            ],
            [
                'couriername.required' => 'Courier name is required',
                'couriername.min' => 'min 3 words',
                'couriername.max' => 'max 100 words',
                'totalongkir.required' => 'Total ongkir is required'
            ]
        );

        Courier::where('id', $Courier->id)->update(
            [
                'courier_name' => $request->couriername,
                'total_ongkir' => $request->totalongkir,
            ],

        );
        return redirect('/courier')->with('status', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Courier::destroy('id', $Courier->id);
        return redirect('/courier')->with('status', ' Deleted Successfully ');
    }
}
