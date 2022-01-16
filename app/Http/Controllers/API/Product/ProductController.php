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
        $limit = $request->input('limit');
        $slug = $request->input('slug');
        $type = $request->input('type');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if ($id) {
            $products = Product::with('galleries')->find($id);
            if ($products)
                return ResponseFormatter::success($products, 'Products fetched successfully');
            else
                return ResponseFormatter::errors(null, 'Products failed fetched', 404);
        }
    }
}
