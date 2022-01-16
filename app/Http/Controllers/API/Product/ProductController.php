<?php

namespace App\Http\Controllers\API\Product;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $limit = $request->input('limit', 6);
        $slug = $request->input('slug');
        $type = $request->input('type');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if ($id) {
            $products = Product::with('galleries')->find($id);
            if ($products)
                return ResponseFormatter::success($products, 'Products fetched successfully');
            else
                return ResponseFormatter::errors(null, 'Products not found', 404);
        }

        if ($slug) {
            $products = Product::with('galleries')->where('slug', $slug)->first();
            if ($products)
                return ResponseFormatter::success($products, 'Products fecthed succesfully');
            else
                return ResponseFormatter::errors(null, 'Products not found', 404);
        }

        $products = Product::with('galleries');

        if ($name)
            $products->where('name', 'LIKE', '%' . $name . '%');

        if ($type)
            $products->where('type', 'LIKE', '%' . $type . '%');

        if ($price_from)
            $products->where('price', '>=', $price_from);

        if ($price_to)
            $products->where('price', '<=', $price_to);

        return ResponseFormatter::success($products->paginate($limit), 'Products fetched successfully');
    }
}
