@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="col-lg-2" style="padding-left: 0px;">
            <ul>
                @foreach ($categories as $category)
                    <li {{($category->active ? 'class=active' : '')}}><a href="/shop/{{$category->name}}">{{$category->name}}</a></li>
                    @if($category->active)
                        <ul>
                            @foreach($category->subcategories as $subcategory)
                                <li><a href="/shop/{{$category->name}}/{{$subcategory->name}}">{{$subcategory->name}}</a></li>
                            @endforeach
                        </ul>
                    @endif
                @endforeach
            </ul>
        </div>


        <div class="col-lg-10">
            <div class="row">
            </div>
        </div>

        <div class="col-lg-10" style=" height: 400px;">
            <div class="row">
                <div class="main-carousel" style="padding-left: 20px;">
                    <div>
                        <img style="width: 100%;" src="/img/folders/boris_nieuwe_col_002.jpg">
                    </div>
                    <div>
                        <img style="width: 100%;" src="/img/folders/Halsoverkop.jpg">
                    </div>
                    <div>
                        <img style="width: 100%;" src="/img/folders/Zara-collectie-mei-20101.jpg">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-10 pull-right" style="padding-right: 0px;">
            <br>
            <div class="" style=" padding: 10px; color: #777777; border-top: 1px dashed #D2D2D3; border-bottom: 1px dashed #D2D2D3; margin-left: 5px;">
                nieuwste collectie
                <div class="pull-right"></div>
            </div>
            <br>
        </div>
        <div class="col-lg-10 pull-right" style=" height: 400px;">
            <div class="row">
                <div class="carousel-newproducts">
                </div>
            </div>
        </div>

    </div> <!-- /container -->
@endsection
