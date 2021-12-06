@extends('layouts.master')

@section('head')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
@endsection

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
        <label for="id_category">Category</label>
        <div id="sub_categories">
            <select class="select_category" id="1" name="id_category">
                <option value="None">None</option>
                @foreach ($categories as $category)
                <option class="category tier1" value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Create</button>
    </form>


@endsection

@section('scripts')
@include('layouts.categories')
@endsection