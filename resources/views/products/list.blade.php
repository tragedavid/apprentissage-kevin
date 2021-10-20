@foreach ($products as $product)
    {{$product->name}} | {{$product->price}} 
    <form action="{{url('/product/delete/'.$product->id)}}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="bg-red-800 text-white text-center px-4 py-2">DELETE THE PRODUCT</button>
    </form>   
    <br>
@endforeach