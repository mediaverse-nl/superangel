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

    </div> <!-- /container -->
@endsection
