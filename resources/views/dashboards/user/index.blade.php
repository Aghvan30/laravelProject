@extends('layouts.app')

@section('content')
    <div id="prod">
        <div class="cats">
    <div class="cat">
        <h2>Caetgory</h2>
        @if(!empty( $cats))
            @foreach($cats as $cat)
                <a href="{{url('user/categories/'.$cat->id)}}">{{$cat->name}}</a>
            @endforeach
            @endif
    </div>
    <div class="cat">
        <h2>Size</h2>
        @if(!empty( $attr_sizes))
            @foreach($attr_sizes as $attr_size)
                <a href="{{url('user/size/'.$attr_size->id)}}">{{$attr_size->name}}</a>
            @endforeach
        @endif
    </div>
    <div class="cat">
        <h2>Color</h2>
        @if(!empty($attr_colors))
            @foreach($attr_colors as $attr_color)
                <a href="{{url('user/color/'.$attr_color->id)}}">{{$attr_color->name}}</a>
            @endforeach
        @endif
    </div>
        </div>
                    <div class="product">
                            @if(!empty($products))
                                @foreach($products as $product)
                         <div class="box">
                         <div class="box1">
                            @if(!empty($product->images))
                             <img src="{{asset('upload/'.$product->images)}}" width="150px" height="200px" alt="img">
                               @endif
                             <h3>{{$product->name}}</h3>
                             <p>{{$product->price}}$</p>

                         </div>
                         </div>
                                @endforeach
                            @endif
                                <div class="page">{!! $products->links() !!}</div>
                    </div>

    </div>

@endsection
