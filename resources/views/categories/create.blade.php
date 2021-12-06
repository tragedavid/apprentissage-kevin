@extends('layouts.master')

@section('head')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
@endsection

@section('content')
    
    <form action="{{url('/category/insert')}}" method="post">
    @csrf
        <div class="form-group">
            <label class="category" for="name">Category name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Category name" required>
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ old('price') }}" placeholder="Description" required>
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <label for="id_category">Parent category</label>
        <div id="sub_categories">
            <select class="select_category" id="1" name="id_category">
                <option value="None">None</option>
                @foreach ($categories as $category)
                <option class="category tier1" value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Insert the category</button>
    </form>


@endsection

@section('scripts')
@include('layouts.categories')
@endsection