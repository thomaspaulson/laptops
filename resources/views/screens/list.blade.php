@extends('layouts.leftmenu')

@section('content')
            <div class="card">
                <div class="card-header">Screens</div>
                <div class="card-body">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <a href="{{  route('screens.create') }}">Create</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <td>Min</td>
                        <td>Max</td>
                        <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($screens as $screen)
                        <tr>                            
                            <td>{{$screen->min}}</td>
                            <td>{{$screen->max}}</td>
                            <td>
                                <a href="{{ route('screens.edit', $screen->id)}}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('screens.destroy', $screen->id)}}" method="post" class="form-inline">
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
