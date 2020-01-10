<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Price;
use App\Brand;
use App\Processor;
use App\Screen;
use App\Product;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
        $prices = Price::get();
        $brands = Brand::get();
        $processors = Processor::get();        
        $screens = Screen::get();
        $touchscreens = array(
            array('id' => 'all', 'title' => 'All'),
            array('id' => '1', 'title' => 'Yes'),
            array('id' => '0', 'title' => 'No')
        );

        $products = Product::query();
        
        if($request->filled('minPrice'))  
        {
            $products = $products->where('price', '>=', $request->minPrice);
        }

        if($request->filled('maxPrice'))  
        {
            $products = $products->where('price', '<=', $request->maxPrice);
        }

        if($request->filled('brand'))  
        {
            $products = $products->where('brand_id', $request->brand);
        }

        if($request->filled('processor'))  
        {
            $products = $products->where('processor_id', $request->processor);
        }

        if($request->filled('screen'))  
        {
            $screen = explode("-",$request->screen);            
            $products = $products->where('screen', '>=', $screen[0]);
            $products = $products->where('screen', '<=', $screen[1]);
        }

        if($request->filled('screen'))  
        {
            $screen = explode("-",$request->screen);            
            $products = $products->where('screen', '>=', $screen[0]);
            $products = $products->where('screen', '<=', $screen[1]);
        }

        if($request->touchable != 'all'){
            $products = $products->where('touchable', $request->touchable);
        }  

        if($request->has('available'))  
        {            
            // list all 
            $products = $products->whereIn('available', ['1','0']);
        }
        else{
            // list only available
            $products = $products->where('available', 1);
        }

        $products = $products->paginate(10);

        return view('home')->with([            
            'prices' => $prices,
            'brands' => $brands,            
            'processors' => $processors,
            'screens' => $screens,
            'touchscreens' => $touchscreens,
            'products' => $products
        ]);   

    }
}
