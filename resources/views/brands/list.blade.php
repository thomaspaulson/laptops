@extends('layouts.leftmenu')

@section('content')
            <div class="card">
                <div class="card-header">Brands</div>
                <div class="card-body">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <a href="{{  route('brands.create') }}">Create</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <td>Title</td>                        
                        <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brands as $brand)
                        <tr>                            
                            <td>{{$brand->title}}</td>
                            
                            <td>
                                <a href="{{ route('brands.edit', $brand->id)}}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('brands.destroy', $brand->id)}}" method="post" class="form-inline">
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
