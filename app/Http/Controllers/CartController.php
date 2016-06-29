<?php

namespace App\Http\Controllers;

use App\Item;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

use App\Http\Requests;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart')->with('title', 'Winkelwagen');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    public function store(Request $request)
    {
        $item = Item::find($request->input('item_id'));
        $stocks = $item->stocks->find($request->input('stock_id'));
        if ($temp = Cart::search(['name' => $item->name, 'options' => ['size' => $stocks->size, 'color' => $stocks->color]])) {
            $tempItem = Cart::get($temp[0]);
            Cart::update($temp[0], $tempItem->qty++);
            return back()->withErrors(['success' => 'The items quantity is Updated']);
        } else {
            if ($stocks->qty >= $request->input('qty')) {
                $chartItem = [
                    'id' => str_random(5) . $item->id,
                    'name' => $item->name,
                    'qty' => $request->input('qty'),
                    'price' => $item->price,
                    'options' => [
                        'size' => $stocks->size,
                        'color' => $stocks->color,
                        'image' => $item->images->first(),
                        'category' => $request->input('category'),
                        'subcategory' => $request->input('subcategory')
                    ]
                ];
                Cart::add($chartItem);
                return back()->withErrors(['success' => 'The item is added to your cart']);
            } else {
                return back()->withErrors(['warning' => 'The item is out of stock']);
            }
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        if ($id) {
            $item = Cart::get($id);
            Cart::remove($id);
            return back()->withErrors(['success' => 'Item: ' . $item->name . ' has been removed from your cart']);
        } else {
            Cart::destroy();
            return back()->withErrors(['success' => 'All items are removed from your cart']);
        }
    }
}
