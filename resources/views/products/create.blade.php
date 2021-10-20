@extends('layouts.master')

@section('content')
    
    <form action="{{url('/product/insert')}}" method="post">
    @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Product name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="{{ old('name') }}" placeholder="Product name" required>
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Price</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="price" value="{{ old('price') }}" placeholder="Price" required>
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <button type="submit">Create</button>
    </form>


@endsection