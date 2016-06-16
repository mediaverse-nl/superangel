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
            @if(isset($products))
                <div class="" style=" padding: 10px; color: #777777; border-top: 1px dashed #D2D2D3; border-bottom: 1px dashed #D2D2D3; margin-left: 5px;">
                    {{count($products)}} artikelen gevonden
                    <div class="pull-right"></div>
                </div>
                <div class="row">

                    @foreach($products as $product)
                        <div class="col-lg-3" style="padding-right: 0px;">
                            <div style="border: 1px dashed #D2D2D3; margin: 0px 0px 0px 5px; padding: 5px; color: #777777;">
                                <div>
                                    <a href="/product/{{$product->category->group}}/{{$product->category->name}}/{{$product->name}}/">
                                        <img style="width: 100%; height: 280px;" src="/assets/img/products/{{$product->images->first()['image']}}">
                                    </a>
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
                </div>
            @else
                @foreach($categoryActive as $subcategory)
                    <div class="col-lg-3" style="padding-right: 0px;">
                        <div style="border: 1px dashed #D2D2D3; margin: 0px 0px 0px 5px; padding: 5px; color: #777777;">
                            <div>
                                <a href="/shop/{{$subcategory->group}}/{{$subcategory->name}}">
                                    <img style="width: 100%; height: 150px;" src="/assets/img/products/bdwbfBOnXo.jpg">
                                </a>
                            </div>
                            <div style="text-align: center">
                                <h4 title="" style="color: inherit">{{$subcategory->name}}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-lg-12 pull-right" style="padding-right: 0px;">
                    <br>
                    <div class="" style=" padding: 10px; color: #777777; border-top: 1px dashed #D2D2D3; border-bottom: 1px dashed #D2D2D3; margin-left: 5px;">
                        Nieuwste collectie
                        <div class="pull-right"></div>
                    </div>
                    <br>
                </div>
                <div class="col-lg-12 pull-right" style=" height: 400px;">
                    <div class="row">
                        <div class="carousel-newproducts">
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div> <!-- /container -->
@endsection
