
@extends('layouts.leftmenu')

@section('content')
            <div class="card">
                <div class="card-header">Add screen size</div>
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
                    <form method="post" action="{{ route('screens.store') }}">
                        @csrf
                        <div class="form-group">    
                            <label for="first_name">Min Inch:</label>
                            <input type="text" class="form-control" name="min" value="{{ old('min') }}"/>
                        </div>

                        <div class="form-group">
                            <label for="first_name">Max Inch:</label>
                            <input type="text" class="form-control" name="max" value="{{ old('max') }}"/>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Add </button>
                    </form>                </div>
            </div>
@endsection
    
