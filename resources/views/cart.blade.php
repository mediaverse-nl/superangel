@extends('layouts.app')
@section('content')
    <div class="container">
        <div id="products-wrapper" class="row">
            <div class="view-cart">
                <div class="col-lg-12">
                    <div class="col-lg-9">
                        <h3 class="bag-summary">Uw Item(s) - <span>{{Cart::count()}}</span></h3>
                        <table class="shop_table cart col-lg-12" cellspacing="0" style="border-bottom: 1px solid #D0D0D0; ;">
                            <thead>
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-quantity"><p class="text-center">Aantal</p></th>
                                <th class="product-subtotal"><p class="text-center">Subtotaal</p></th>
                                <th class="product-remove">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(Cart::content() as $row)
                                <tr>
                                    <td class="col-md-7">
                                        <div class="col-xs-6 col-md-4">
                                            <a href="/product/{{$row->options->category}}/{{$row->options->subcategory}}/{{$row->name}}" class="thumbnail">
                                                <img src="/assets/img/products/{{$row->options->image->image}}" alt="{{$row->options->image->description}}">
                                            </a>
                                        </div>
                                        <p class="col-md-5">
                                            <strong>Naam: </strong>{{$row->name}} <br />
                                            <strong>Maat: </strong>{{$row->options->size}} <br />
                                            <strong>Kleur: </strong>{{$row->options->color}} <br />
                                            <strong>Prijs: </strong>{{number_format($row->price, 2, ',', '.')}}
                                        </p>
                                    </td>
                                    <td class="col-md-2">
                                        <p class="col-md-10">
                                            <input type="text" class="form-control" value="{{$row->qty}}">
                                        </p>
                                    </td>
                                    <td class="text-center">&euro;{{number_format($row->subtotal, 2, ',', '.')}}</td>
                                    <td><a href="/winkelwagen/remove/{{$row->id}}" class="glyphicon glyphicon-remove"></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-3">
                        <h3 class="bag-totals">Totaal</h3>
                        <div class="cart_totals ">
                            <table cellspacing="0">
                                <tbody>
                                <tr class="cart-subtotal">
                                    <th>Subtotaal</th>
                                    <td><span class="amount">&euro;{{number_format(Cart::total(), 2, ',', '.')}}
											</span>
                                    </td>
                                </tr>
                                <tr class="shipping">
                                    <th>Verzending</th>
                                    <td>
                                        &euro;7.50
                                        <input type="hidden" name="shipping_method[0]" data-index="0" id="shipping_method_0" value="free_shipping" class="shipping_method">
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Totaal</th>
                                    <td><strong><span class="amount">&euro;{{number_format(Cart::total() + 7.50, 2, ',', '.')}}</span></strong></td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="wc-proceed-to-checkout">
                                <a class="form-control btn btn-submit" style="margin-bottom: 10px; background-color: #5cb85c !important;" href="/kassa/gegevens/" class="checkout-button button alt wc-forward">Volgende</a>
                            </div>
                        </div>
                        <a class="btn btn-submit" href="/shop/">Verder winkelen</a>
                    </div>


                </div>
            </div>
        </div>


    </div> <!-- /container -->
@endsection