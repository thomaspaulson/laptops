
@extends('layouts.leftmenu')

@section('content')
            <div class="card">
                <div class="card-header">Edit user</div>
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
                    <form method="post" action="{{ route('users.update', $user->id ) }}">
                        @method('PATCH') 
                        @csrf
                        <div class="form-group">    
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" value="{{ !old('name') ? $user->name : old('name') }}"/>
                        </div>

                        <div class="form-group">    
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" name="email" value="{{ !old('email') ? $user->email : old('email') }}"/>
                        </div>

                        <div class="form-group">    
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" value="{{ !old('password') ? $user->password : old('password') }}"/>
                        </div>

                        
                        <button type="submit" class="btn btn-primary">Update </button>
                    </form>               
                </div>
            </div>
@endsection
    
