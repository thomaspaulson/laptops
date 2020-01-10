
@extends('layouts.leftmenu')

@section('content')
            <div class="card">
                <div class="card-header">Edit price</div>
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
                    <form method="post" action="{{ route('prices.update', $price->id ) }}">
                        @method('PATCH') 
                        @csrf
                        <div class="form-group">    
                            <label for="first_name">Min Price:</label>
                            <input type="text" class="form-control" name="min" value="{{ !old('min') ? $price->min : old('min') }}"/>
                        </div>

                        <div class="form-group">
                            <label for="first_name">Max Price:</label>
                            <input type="text" class="form-control" name="max" value="{{ !old('max') ? $price->max : old('max') }}"/>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update </button>
                    </form>                
                    </div>
            </div>
@endsection
    
