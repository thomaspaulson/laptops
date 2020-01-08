<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Screen;

class ScreenController extends Controller
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
        $screens = Screen::get();
        return view('screens.list')->with(['screens' => $screens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('screens.create');
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
            'min'=>'required|numeric|max: 100',
            'max'=>'required|numeric|max: 100',            
        ]);

        $screen = Screen::create([
            'min' => $request->min,
            'max' => $request->max
        ]);

        if($screen){
            return redirect('screens')->with('status', 'Screen size created!');
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
        $screen = Screen::find($id);
        if(!$screen){
            abort(404);
        }

        return view('screens.edit')->with(['screen' => $screen]);   
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

        $screen = Screen::find($id);
        if(!$screen){
            abort(404);
        }

        $request->validate([
            'min'=>'required|numeric|max: 100',
            'max'=>'required|numeric|max: 100',            
        ]);


        $screen->fill([
            'min' => $request->min,
            'max' => $request->max
        ]);

        $screen->save();

        if($screen){
            return redirect('screens')->with('status', 'Screen size updated!');
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
        $screen = Screen::find($id);
        if(!$screen){
            abort(404);
        }
        $screen->delete();

        return redirect('screens')->with('status', 'Screen size deleted!');
    }
}
