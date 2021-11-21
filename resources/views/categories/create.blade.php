@extends('layouts.master')

@section('content')
    
    <form action="{{url('/category/insert')}}" method="post">
    @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Category name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="{{ old('name') }}" placeholder="Category name" required>
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Description</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="description" value="{{ old('price') }}" placeholder="Description" required>
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <button type="submit">Insert the category</button>
    </form>


@endsection