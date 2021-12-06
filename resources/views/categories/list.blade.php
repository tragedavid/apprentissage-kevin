@extends('layouts.master')
@section('content')

<a  href="{{url('/category/create')}}"><h1 class="alert alert-primary text-center">Add a category</h1></a>

@foreach ($categories as $category)
<div class="d-flex alert alert-info align-items-center">
    <div class="mr-auto">
        {{$category->name}} | {{$category->description}}
    </div>
    <form action="{{url('/category/edit/'.$category->id)}}" method="get">
        <button type="submit" class="btn btn-warning mr-5">Modifier le produit</button>
    </form>
    <form action="{{url('/category/delete/'.$category->id)}}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger text-white text-center px-4 py-2">DELETE THE CATEGORY</button>
    </form>   
    <br>
</div>
@endforeach

@endsection

