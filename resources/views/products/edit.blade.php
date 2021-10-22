@extends('layouts.master')

@section('content')
<form action="{{url('/product/update/'.$product->id)}}" method="post">
    @csrf
    <div class="form-group">
        <label for="exampleFormControlInput1">Product name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Product name" value="{{$product->name}}" required>
        @error('name')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Price</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="price" placeholder="Price" value="{{$product->price}}" required>
        @error('name')
            {{ $message }}
        @enderror
    </div>
    <button type="submit">Update product</button>
</form>

@endsection