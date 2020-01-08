
@extends('layouts.leftmenu')

@section('content')
            <div class="card">
                <div class="card-header">Edit product</div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif
                    <form method="post" action="{{ route('products.update', $product->id ) }}"  enctype="multipart/form-data">
                        @method('PATCH') 
                        @csrf
                        <div class="form-group">    
                            <label for="first_name">Title:</label>
                            <input type="text" class="form-control" name="title" value="{{ !old('title') ? $product->title : old('title') }}"/>
                        </div>

                        <div class="form-group">    
                            <label for="title">Image:</label>
                            <input type="file" name="image" id="image">                            
                            <?php
                            if($product->image){
                                echo "<p>$product->image</p>";
                            }
                            ?>
                        </div>
                        


                        <div class="form-group">    
                            <label for="price">Price:</label>
                            <input type="text" class="form-control" name="price" value="{{ !old('price') ? $product->price : old('price') }}"/>
                        </div>

                        <div class="form-group">    
                            <label for="screen">Screen size:</label>
                            <input type="text" class="form-control" name="screen" value="{{ !old('screen') ? $product->screen : old('screen') }}"/>
                        </div>

                        <div class="form-group">    
                            <label for="brand">Brand:</label>
                            <select class="form-control" name="brand_id">
                                <option value="">-select-</option>
                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected="selected"':'' }}>{{ $brand->title }} </option>
                                @endforeach
                            </select>                            
                        </div>

                        <div class="form-group">    
                            <label for="processor">Processor:</label>
                            <select class="form-control" name="processor_id">
                                <option value="">-select-</option>                                
                                @foreach($processors as $processor)
                                <option value="{{ $processor->id }}" {{ $processor->id == $product->processor_id ? 'selected="selected"':'' }}>{{ $processor->title }}</option>
                                @endforeach
                            </select>                            
                        </div>

                        <div class="form-check">                                
                            <input type="checkbox" class="form-check-input" name="touchable" value="1" {{ $product->touchable ? 'checked="checked"':'' }} />
                            <label class="form-check-label" for="touchable">Is touchable:</label>
                        </div>

                        <div class="form-check">                                
                            <input type="checkbox" class="form-check-input" name="available"  value="1" {{ $product->available ? 'checked="checked"':'' }} />
                            <label class="form-check-label" for="available">Is available:</label>
                        </div>


                        
                        <button type="submit" class="btn btn-primary">Update </button>
                    </form>               
                </div>
            </div>
@endsection
    
