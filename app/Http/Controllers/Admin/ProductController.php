<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Brand;
use App\Processor;

class ProductController extends Controller
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
        $products = Product::get();
        return view('products.list')->with(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $brands = Brand::get();
        $processors = Processor::get();
        return view('products.create')->with([
            'brands' => $brands,
            'processors' => $processors,
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
        //
        $request->validate([
            'title'=>'required|max: 250',
            'image' => 'image|nullable|max:1999',
            'price'=>'required|numeric|max: 1000000|regex:/^[0-9]*(\.\d{1,2})?$/',
            'screen'=>'required|numeric|max: 100|regex:/^\d{0,2}(\.\d{1,2})?$/',
            'brand_id'=>'required',
            'processor_id'=>'required'            
        ]);

        $touchable = 0;
        if($request->has('touchable')){
            $touchable = 1;
        }

        $available = 0;
        if($request->has('available')){
            $available = 1;
        }

        if($request->hasFile('image')) {
            // Get filename with extension            
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
           // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
          // Upload Image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = '';
        }        

        $product = Product::create([
            'title' => $request->title,
            'image' => $fileNameToStore,
            'price' => $request->price,
            'screen' => $request->screen,
            'brand_id' => $request->brand_id,
            'processor_id' => $request->processor_id,
            'touchable' => $touchable,
            'available' => $available            
        ]);

        if($product){
            return redirect('products')->with('status', 'Product created!');
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
        $product = Product::find($id);
        if(!$product){
            abort(404);
        }

        $brands = Brand::get();
        $processors = Processor::get();

        return view('products.edit')->with([
            'product' => $product,
            'brands' => $brands,
            'processors' => $processors,
        ]);   
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
        $product = Product::find($id);
        if(!$product){
            abort(404);
        }

        $request->validate([
            'title'=>'required|max: 250',
            'image' => 'image|nullable|max:1999',
            'price'=>'required|numeric|max: 1000000|regex:/^[0-9]*(\.\d{1,2})?$/',
            'screen'=>'required|numeric|max: 100|regex:/^\d{0,2}(\.\d{1,2})?$/',
            'brand_id'=>'required',
            'processor_id'=>'required'            
        ]);
        
        $touchable = 0;
        if($request->has('touchable')){
            $touchable = 1;
        }

        $available = 0;
        if($request->has('available')){
            $available = 1;
        }


        if($request->hasFile('image')) {
            // Get filename with extension            
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
           // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
          // Upload Image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = $product->image;
        }        


        $product->fill([
            'title' => $request->title,
            'image' => $fileNameToStore,
            'price' => $request->price,
            'screen' => $request->screen,
            'brand_id' => $request->brand_id,
            'processor_id' => $request->processor_id,
            'touchable' => $touchable,
            'available' => $available            
        ]);

        $product->save();

        if($product){
            return redirect('products')->with('status', 'Product  updated!');
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
        $product = Product::find($id);
        if(!$product){
            abort(404);
        }
        $product->delete();

        return redirect('products')->with('status', 'Product  deleted!');
    }
}
