@extends('layouts.leftmenu')

@section('content')
            <div class="card">
                <div class="card-header">Users</div>
                <div class="card-body">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <a href="{{  route('users.create') }}">Create</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <td>Name</td>                        
                        <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>                            
                            <td>{{$user->name}}</td>
                            
                            <td>
                                <a href="{{ route('users.edit', $user->id)}}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('users.destroy', $user->id)}}" method="post" class="form-inline">
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
