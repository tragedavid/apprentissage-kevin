@extends('layouts.master')

@section('content')
    
    <form action="{{url('/category/update/'.$category->id)}}" method="POST">
    @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Category name</label>
            <input type="text" class="form-control" name="name" value="{{$category->name}}" required>
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Description</label>
            <input type="text" class="form-control" name="description" value="{{$category->description}}" required>
            @error('description')
                {{ $message }}
            @enderror
        </div>
        <button type="submit">Update the category</button>
    </form>

@endsection