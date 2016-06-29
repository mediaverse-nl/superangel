@extends('layouts.app')
@section('content')
    <div class="container">
        @include('errors.messages')
        <div>
            <div class="col-lg-8" style="height: 100%;">
                <div class="slider-for col-lg-10 slick-initialized slick-slider" style="height: auto; margin-bottom: 50px;">
                    <div aria-live="polite" class="slick-list draggable" style="height: 737px;">
                        <div class="slick-track" style="opacity: 1; width: 1156px;" role="listbox">
                            <img id="PktVNjgLaF" src="/assets/img/products/{{$product->images->first()->image}}" alt="{{$product->images->first()->description}}" class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 578px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;" tabindex="0" role="option" aria-describedby="slick-slide00"><img id="D6FWru4bZN" src="/assets/img/products/D6FWru4bZN.jpg" class="slick-slide" data-slick-index="1" aria-hidden="true" style="width: 578px; position: relative; left: -578px; top: 0px; z-index: 998; opacity: 0;" tabindex="-1" role="option" aria-describedby="slick-slide01">
                        </div>
                    </div>
                </div>
                <div class="slider-nav col-lg-2 slick-initialized slick-slider">
                    <div aria-live="polite" class="slick-list draggable">
                        <div class="slick-track" style="opacity: 1; width: 46px; transform: translate3d(0px, 0px, 0px);" role="listbox">
                            <img src="/assets/img/products/{{$product->images->first()->image}}" alt="{{$product->images->first()->description}}" class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 23px;" tabindex="0" role="option" aria-describedby="slick-slide10"/>
                            @foreach($product->images as $image)
                                @if(!$image->image == $product->images->first()->image)
                                    <img src="/assets/img/products/{{$image->image}}" alt="{{$image->description}}" class="slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 23px;" tabindex="0" role="option" aria-describedby="slick-slide11"/>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h1>{{$product->name}}</h1>
                {{--<p>kleuren</p>--}}
                {{--<p>--}}
                {{--<a href="/product/Jeans/1/">--}}
                {{--<img style="width: 60px; height: 90px; overflow-y: hidden;" src="/assets/img/products/bdwbfBOnXo.jpg"/>--}}
                {{--</a>--}}
                {{--<a href="/product/Jeans/4/">--}}
                {{--<img style="width: 60px; height: 90px; overflow-y: hidden; border: 1px solid gray;" src="/assets/img/products/PktVNjgLaF.jpg"/>--}}
                {{--</a>--}}
                {{--<a href="/product/Jeans/7/">--}}
                {{--<img style="width: 60px; height: 90px; overflow-y: hidden;" src="/assets/img/products/DnXLJaPYsV.jpg"/>--}}
                {{--</a>--}}
                {{--</p>--}}
                <form action="/winkelwagen" method="post">
                    {!! csrf_field() !!}
                    <p>
                        <select class="selectpicker" name="stock_id">
                            @foreach($product->stocks as $stocks)
                                <option value="{{$stocks->id}}" {{(!$stocks['qty'] ? 'disabled' : '')}}>Maat {{$stocks['size']}} - Kleur: {{$stocks->color}} - {{(!$stocks['qty'] ? 'Uitverkocht' : "({$stocks['qty']}) Beschikbaar")}}</option>
                            @endforeach
                        </select>
                    </p>
                    <span style="font-size: 30px" class="">&euro;{{number_format($product->price, 2, ',', '.')}}</span>
                    <input type="number" name="qty" value="1" class="form-control">
                    <input type="hidden" name="item_id" value="{{$product->id}}">
                    <input type="hidden" name="category" value="{{$bread_category}}">
                    <input type="hidden" name="subcategory" value="{{$bread_subcategory}}">
                    <input class="btn btn-submit" type="submit" value="Bestellen">
                </form>
                <hr style="margin: 5px;">
                {{--<a class="btn btn-submit">Wenslijst</a>--}}
                <p>Productomschrijving</p>
                <p>{{nl2br($product->description)}}</p>
            </div>
        </div>
    </div> <!-- /container -->
@endsection
