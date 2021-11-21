@extends('layouts.master')
@section('content')
    
<a  href="{{url('/category/create')}}"><h1 class="alert alert-primary text-center">Add a category</h1></a>

@foreach ($categories as $category)
    {{$category->name}} | {{$category->description}}
    <form action="{{url('/category/edit/'.$category->id)}}" method="get">
        <button type="submit">Modifier le produit</button>
    </form>
    <form action="{{url('/category/delete/'.$category->id)}}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="bg-red-800 text-white text-center px-4 py-2">DELETE THE CATEGORY</button>
    </form>   
    <br>
@endforeach

@endsection

