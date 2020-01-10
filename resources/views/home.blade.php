@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Filter</div>
                <div class="card-body">
                    <form method="get" action="/">
                        <h6>Price Range</h6>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="minPrice">MIN</label>
                                    <select class="form-control" name="minPrice">
                                        <option value="">-select-</option>
                                        @foreach($prices as $price)
                                        <option value="{{ $price->min }}" {{ request()->minPrice == $price->min ? 'selected="selected"' : '' }}>
                                        {{ $price->min }}
                                        </option>
                                        @endforeach
                                    </select>                                                                
                                </div>                            
                            </div>
                            <div class="col">
                            <div class="form-group">
                                    <label for="maxPrice">MAX</label>
                                    <select class="form-control" name="maxPrice">
                                        <option value="">-select-</option>
                                        @foreach($prices as $price)
                                        <option value="{{ $price->max }}" {{ request()->maxPrice == $price->max ? 'selected="selected"' : '' }}>
                                        {{ $price->max }}
                                        </option>
                                        @endforeach
                                    </select>                                                                
                                </div>                            
                            </div>   
                        </div>                 
                        
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <select class="form-control" name="brand">
                                        <option value="">-select-</option>
                                        @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ request()->brand == $brand->id ? 'selected="selected"' : '' }}>
                                        {{ $brand->title }}
                                        </option>
                                        @endforeach
                                    </select>                                                                
                                </div>                            
                            </div>
                        </div>    

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="processor">Processor</label>
                                    <select class="form-control" name="processor">
                                        <option value="">-select-</option>
                                        @foreach($processors as $processor)
                                        <option value="{{ $processor->id }}" {{ request()->processor == $processor->id ? 'selected="selected"' : '' }}>
                                        {{ $processor->title }}
                                        </option>
                                        @endforeach
                                    </select>                                                                
                                </div>                            
                            </div>
                        </div>    

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="screen">Screen</label>
                                    <select class="form-control" name="screen">
                                        <option value="">-select-</option>
                                        @foreach($screens as $screen)
                                        <option value="{{ $screen->min }}-{{ $screen->max }}" {{ request()->screen == $screen->min.'-'.$screen->max? 'selected="selected"' : '' }}>
                                        {{ $screen->min }} inch-{{ $screen->max }} inch</option>
                                        @endforeach
                                    </select>                                                                
                                </div>                            
                            </div>
                        </div>    


                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="touchable">Touchscreen</label>
                                    <select class="form-control" name="touchable">
                                        @foreach($touchscreens as $touchscreen)
                                        <option value="{{ $touchscreen['id'] }}" {{ request()->touchable == $touchscreen['id'] ? 'selected="selected"' : '' }}>
                                        {{ $touchscreen['title'] }}
                                        </option>
                                        @endforeach
                                        <!--    
                                        <option value="all">All</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                        -->
                                    </select>                                                               
                                </div>                            
                            </div>
                        </div>    

                        <div class="row">
                            <div class="col">
                                <h6>Availability</h6>
                                <div class="form-check">                                
                                    <input type="checkbox" class="form-check-input" name="available" value="yes" {{ request()->available ? 'checked="checked"' : '' }}/>
                                    <label class="form-check-label" for="available">Include out of stock:</label>
                                </div>
                                
                            </div>
                        </div>    

                        <button type="submit"> Search</button>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Home</div>
                <div class="card-body">
                    <h1>Laptops</h1>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                        @foreach ($products as $product)
                        <div class="row">
                            <div class="col">
                            <img src="/storage/images/{{ $product->image }}" />
                            </div>
                            <div class="col">
                                <h2>{{ $product->title }}</h2>
                                <ul>
                                <li>Brand: {{ $product->brand->title }}</li>
                                <li>Processor: {{ $product->processor->title }}</li>
                                <li>Screen: {{ $product->screen }}	inch </li>
                                <li>Touchscreen: {{ $product->touchable ? 'Yes': 'No' }}</li>
                                <li>Availability: {{ $product->available ? 'Yes': 'No' }}</li>
                                <li>Price: {{ $product->price }}</li>
                                </ul>

                            </div>
                        </div>
                        @endforeach
                    

                    {{ $products->appends(request()->query())->links() }}                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
