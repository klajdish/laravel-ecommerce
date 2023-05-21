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
        $previousUrl = $request->server('HTTP_REFERER');
        $queryString = parse_url($previousUrl, PHP_URL_QUERY);
        parse_str($queryString, $params);

        if(!$request->all()) {
            $params = [];
        }

        // $mergedParams = array_merge($params, $request->all());
        // $newUrl = url()->current() . '?' . http_build_query($mergedParams);

        $selectedSizes = [];
        $selectedColors = [];
        $searchQuery = '';
        $products = null;

        if($request->has('category_id')){
            $categoryId = $request->get('category_id');
            $category = Category::find($categoryId);
            $descendants = $category->getAllDescendants()->pluck('id');
            $products = ProductModel::whereIn('category_id', $descendants->push($categoryId));
        }

        if(isset($params['q']) || $request->has('q')) {
            $searchQuery = $request->has('q') ? $request->input('q') : $params['q'] ;
            $obj = $products ? $products : new ProductModel;

            $products = $obj->where('name', 'like', '%' . $searchQuery . '%');
        }

        if(isset($params['size']) || $request->has('size')) {
            $selectedSizes = $request->has('size') ? $request->input('size', []) : $params['size'];

            $obj = $products ? $products : new ProductModel;
            $products = $obj->whereIn('size_id', $selectedSizes);
        }

        if(isset($params['color']) || $request->has('color')) {
            $selectedColors = $request->has('color') ? $request->input('color', []) : $params['color'];

            $obj = $products ? $products : new ProductModel;
            $products = $obj->whereIn('color_id', $selectedColors);
        }

        if($products){
            $products = $products->get();
        }else {
            $products = ProductModel::all();
        }

        $categories = Category::whereNull('parent_id')->get();
        $colors = Color::all();
        $sizes = Size::all();

        $prices = [
            'minPrice' =>  number_format(ProductModel::min('price'), 0, ',', ' '),
            'maxPrice' =>  number_format(ProductModel::max('price'), 0, ',', ' '),
        ];

        return view('shop', compact('products', 'categories', 'colors', 'sizes', 'prices', 'selectedSizes', 'selectedColors', 'searchQuery'));
    }


    public function getIds($category_id, &$ids = []) {
        $category = Category::where('id', $category_id)->first();
        if($category && $category->parent_id){
            $ids[] = $category->parent_id;
            $this->getIds($category->parent_id, $ids);
        }
        return $ids;
    }

    public function productDetails($id)
    {
        $product = ProductModel::where('id', $id)->first();
        $relatedProducts = ProductModel::where('category_id', $product->category_id)->where('id','!=',$product->id)->limit(4)->get();
        return view('product-details', compact('product', 'relatedProducts'));
    }


}
