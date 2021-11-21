@extends('layouts.master')
@section('content')
    
<a  href="{{url('/product/create')}}"><h1 class="alert alert-primary text-center">Add a product</h1></a>

@foreach ($products as $product)
    {{$product->name}} | {{$product->price}}€ 
    <form action="{{url('/product/edit/'.$product->id)}}" method="get">
        <button type="submit">Modifier le produit</button>
    </form>
    <form action="{{url('/product/delete/'.$product->id)}}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="bg-red-800 text-white text-center px-4 py-2">DELETE THE PRODUCT</button>
    </form>   
    <br>
@endforeach

@endsection

