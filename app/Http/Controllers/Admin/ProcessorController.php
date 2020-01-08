<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Processor;

class ProcessorController extends Controller
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
        $processors = Processor::get();
        return view('processors.list')->with(['processors' => $processors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('processors.create');
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
            'title'=>'required|max: 250'
            
        ]);

        $processor = Processor::create([
            'title' => $request->title            
        ]);

        if($processor){
            return redirect('processors')->with('status', 'Processor created!');
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
        $processor = Processor::find($id);
        if(!$processor){
            abort(404);
        }

        return view('processors.edit')->with(['processor' => $processor]);   
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
        $processor = Processor::find($id);
        if(!$processor){
            abort(404);
        }

        $request->validate([
            'title'=>'required|max: 250'            
        ]);


        $processor->fill([
            'min' => $request->min,
            'max' => $request->max
        ]);

        $processor->save();

        if($processor){
            return redirect('processors')->with('status', 'Processor  updated!');
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
        $processor = Processor::find($id);
        if(!$processor){
            abort(404);
        }
        $processor->delete();

        return redirect('processors')->with('status', 'Processor  deleted!');
    }
}
