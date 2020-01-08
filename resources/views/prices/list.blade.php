@extends('layouts.leftmenu')

@section('content')
            <div class="card">
                <div class="card-header">Prices</div>
                <div class="card-body">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <a href="{{  route('prices.create') }}">Create</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <td>Min</td>
                        <td>Max</td>
                        <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prices as $price)
                        <tr>                            
                            <td>{{$price->min}}</td>
                            <td>{{$price->max}}</td>
                            <td>
                                <a href="{{ route('prices.edit', $price->id)}}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('prices.destroy', $price->id)}}" method="post" class="form-inline">
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
