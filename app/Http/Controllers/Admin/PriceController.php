<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Price;

class PriceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prices = Price::get();
        return view('prices.list')->with(['prices' => $prices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('prices.create');
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
        $request->validate([
            'min'=>'required|numeric|max: 100000',
            'max'=>'required|numeric|max: 100000',            
        ]);

        $price = Price::create([
            'min' => $request->min,
            'max' => $request->max
        ]);

        if($price){
            return redirect('prices')->with('status', 'Price size created!');
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
        //
        $price = Price::find($id);
        if(!$price){
            abort(404);
        }

        return view('prices.edit')->with(['price' => $price]);   
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
        $price = Price::find($id);
        if(!$price){
            abort(404);
        }

        $request->validate([
            'min'=>'required|numeric|max: 100000',
            'max'=>'required|numeric|max: 100000',            
        ]);


        $price->fill([
            'min' => $request->min,
            'max' => $request->max
        ]);

        $price->save();

        if($price){
            return redirect('prices')->with('status', 'Price size updated!');
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
        //
        $price = Price::find($id);
        if(!$price){
            abort(404);
        }
        $price->delete();

        return redirect('prices')->with('status', 'Price size deleted!');
    }
}
