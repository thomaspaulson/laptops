
@extends('layouts.leftmenu')

@section('content')
            <div class="card">
                <div class="card-header">Add processor </div>
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
                    <form method="post" action="{{ route('processors.store') }}">
                        @csrf
                        <div class="form-group">    
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}"/>
                        </div>

                        
                        <button type="submit" class="btn btn-primary">Add </button>
                    </form>                
                </div>
            </div>
@endsection
    
