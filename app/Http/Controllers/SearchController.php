<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        $products = Product::search($request->search)->paginate(12);

        return view('search',compact('products'));
    }
}
