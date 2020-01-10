@extends('layouts.leftmenu')

@section('content')
            <div class="card">
                <div class="card-header">Products</div>
                <div class="card-body">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <a href="{{  route('products.create') }}">Create</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <td>Title</td>                        
                        <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>                            
                            <td>{{$product->title}}
                                <ul>
                                <li>Brand: {{ $product->brand->title }}</li>
                                <li>Processor: {{ $product->processor->title }}</li>
                                <li>Screen: {{ $product->screen }}	inch </li>
                                <li>Touchscreen: {{ $product->touchable ? 'Yes': 'No' }}</li>
                                <li>Availability: {{ $product->available ? 'Yes': 'No' }}</li>
                                <li>Price: {{ $product->price }}</li>
                                </ul>


                            </td>
                            
                            <td>
                                <a href="{{ route('products.edit', $product->id)}}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('products.destroy', $product->id)}}" method="post" class="form-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger button-delete" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>                
                </div>
            </div>
@endsection
