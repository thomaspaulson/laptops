@extends('layouts.leftmenu')

@section('content')
            <div class="card">
                <div class="card-header">Processors</div>
                <div class="card-body">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <a href="{{  route('processors.create') }}">Create</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <td>Title</td>                        
                        <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($processors as $processor)
                        <tr>                            
                            <td>{{$processor->title}}</td>
                            
                            <td>
                                <a href="{{ route('processors.edit', $processor->id)}}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('processors.destroy', $processor->id)}}" method="post" class="form-inline">
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
