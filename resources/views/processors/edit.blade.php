
@extends('layouts.leftmenu')

@section('content')
            <div class="card">
                <div class="card-header">Edit processor</div>
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
                    <form method="post" action="{{ route('processors.update', $processor->id ) }}">
                        @method('PATCH') 
                        @csrf
                        <div class="form-group">    
                            <label for="first_name">Min Inch:</label>
                            <input type="text" class="form-control" name="title" value="{{ !old('title') ? $processor->title : old('title') }}"/>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update </button>
                    </form>               
                </div>
            </div>
@endsection
    
