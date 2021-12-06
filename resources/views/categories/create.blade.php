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
<script>
    selects = $('.select_category');
        $('#sub_categories').on('change', '.select_category', function(e){    
            console.log(this);
            id = this.value;
            tier = parseInt(this.id);  
            if (document.getElementById(tier+1)) {
                w = tier + 1;
                while(document.getElementById(w)) {
                    document.getElementById(w).remove();
                    w++;
                }
            }
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'
                }
            });
            $.ajax({
                url: '/laravel/maraicher/public/ajax/category-childs/' + id,
                type: 'POST',
                data: {
                
                },    
                dataType: 'JSON',
                    success: function (data) {
                        console.log(data);
                        if(data.length > 0) {
                            if (!document.getElementById(tier+1)) {
                                item = document.createElement("select");
                                item.className = "select_category";
                                item.id = tier+1;
                                item.name = "id_category";
                                document.getElementById('sub_categories').appendChild(item);
                            }
                            document.getElementById(tier+1).innerHTML = '<option value="' + id + '">None</option>';
                            for(i=0; i<data.length; i++) {
                            document.getElementById(tier+1).innerHTML += 
                            '<option value="' + data[i].id + '">' + data[i].name + '</option>';
                            }
                        }
                    },
                    error: function (e) {
                        console.log(e.responseText);
                    }
            });
        });
</script>
@endsection