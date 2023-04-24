<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Color;
use App\Models\Category;
use App\Models\Product as ProductModel;
use Illuminate\Http\Request;

class Product extends Controller
{
    public function shop(Request $request)
    {
        $selectedColors = $request->input('color', []);
        $selectedSizes = $request->input('size', []);
        $products = null;

        if($request->has('category_id')){
            $products = ProductModel::where('category_id', $request->get('category_id'));
        }
        if($products && $request->has('size')){
            $products = $products->whereIn('size_id', $selectedSizes);

        }else if($request->has('size')) {
            $products = ProductModel::whereIn('size_id', $selectedSizes);
        }
        if($products && $request->has('color')) {
            $products = $products->whereIn('color_id', $selectedColors);

        }else if($request->has('color')) {
            $products = ProductModel::whereIn('color_id', $selectedColors);
        }

        if($products){
            $products = $products->get();
        }else {
            $products = ProductModel::all();
        }

        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();

        $prices = [
            'minPrice' =>  number_format(ProductModel::min('price'), 0, ',', ' '),
            'maxPrice' =>  number_format(ProductModel::max('price'), 0, ',', ' '),
        ];

        return view('shop', compact('products', 'categories', 'colors', 'sizes', 'prices', 'selectedSizes', 'selectedColors'));
    }

    public function productDetails()
    {
        return view('productDetails');
    }



}
