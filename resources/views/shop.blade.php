@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="col-lg-2" style="padding-left: 0px;">
            <ul>
                @foreach ($categories as $category)
                    <li {{($category->active ? 'class=active' : '')}}>
                        <a href="/shop/{{$category->name}}">{{$category->name}}</a></li>
                    @if($category->active)
                        <ul>
                            @foreach($category->subcategories as $subcategory)
                                <li>
                                    <a href="/shop/{{$category->name}}/{{$subcategory->name}}">{{$subcategory->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                @endforeach
            </ul>
        </div>

        <div class="col-lg-10">
            <div class="row">
                @if(isset($products))
                    @foreach($products as $product)
                        {{$product->images->first()}}
                        <div class="col-lg-3" style="padding-right: 0px;">
                            <div style="border: 1px dashed #D2D2D3; margin: 0px 0px 0px 5px; padding: 5px; color: #777777;">
                                <div>
                                    <a href="/product/Jeans/1/"><img style="width: 100%; height: 280px;" src="/assets/img/products/bdwbfBOnXo.jpg"></a>
                                </div>
                                <div><h4 title="" style="color: inherit">{{$product->name}}</h4>
                                    <p class="lead pull-right">&euro; {{number_format($product->price, 2)}}</p>
                                    @if($product->stocks)
                                        <p>direct leverbaar</p>
                                    @else
                                        <p>Uitverkocht</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                @endif
            </div>
        </div>

    </div> <!-- /container -->
@endsection
