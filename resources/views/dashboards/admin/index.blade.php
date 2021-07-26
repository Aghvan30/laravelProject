@extends('layouts.app')

@section('content')

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="{{url('admin/add-attribute')}}" class="btn btn-primary">Add Attribut</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Dashboard') }}</div>

                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('danger'))
                    <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                @endif

                    <h1>{{__('messages.add-product')}}</h1>


                    <form action="{{url('admin/add-product')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="product_name" class="control-label">Product Name</label>
                            <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" placeholder="Product name" value="{{old('product_name')}}">
                            @error('product_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cat" class="control-label">Category</label>
                            <select class="form-control" name="category">
                                <option value="">Category</option>
                                @if(!empty($cats))
                                    @foreach($cats as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="attribut" class="control-label">Attribute</label>
                            <select  name='attribute' id="attribute" class="form-control">

                                <option value="">Attribut</option>
                                @if(!empty($attributData['data']))
                                    @foreach($attributData['data'] as $attribut)
                                        <option value="{{$attribut->id}}">{{$attribut->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="attribute_value" class="control-label">Attribute Value</label>
                            <select class="form-control" name="attribute_value" id="attribute_value">
                                <option value="0">Attribute value</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image" class="control-label">Image</label>
                            <input type="file" name='image' class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">Price</label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Price" value="{{old('price')}}" >
                            @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>

    $(document).ready(function(){

        // Department Change
        $('#attribute').change(function(){
           // alert('hello');

            // Department id
            var id = $(this).val();
            // console.log(id);
            // Empty the dropdown
            $('#attribute_value').find('option').not(':first').remove();

            // AJAX request
            $.ajax({
                url: 'get_attribute_value/'+id,
                type: 'get',
                dataType: 'json',
                success: function(response){

                    var len = 0;
                    if(response['data'] != null){
                        len = response['data'].length;
                    }

                    if(len > 0){
                        // Read data and create <option >
                        for(var i=0; i<len; i++){

                            var id = response['data'][i].id;
                            var name = response['data'][i].name;
//alert(name);
                            var option = "<option value='"+id+"'>"+name+"</option>";

                            $("#attribute_value").append(option);
                        }
                    }

                }
            });
        });

    });

</script>

</body>
</html>
@endsection
