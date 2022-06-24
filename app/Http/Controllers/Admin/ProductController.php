<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Http;


class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        // $response = Http::get('https://www.gartner.com/reviews/api2-proxy/reviews/market/seoname/public-cloud-iaas/zeroRatingProducts');
        // dd(json_decode($response)->products);


        return view('admin.pages.product.product', ['products' => $products]);
    }

    public function new(){
        $categories = Category::all();

        return view('admin.pages.product.new', ['categories' => $categories]);
    }

    public function postNew(Request $request){
        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
        $product->support = $request->input('support');
        $product->price_id = $request->input('price_id');
        $product->vendor_id = $request->input('vendor_id');
        $product->criteria_id = 1;
        $product->save();

        return redirect()->back()->with('thongbao',"Đăng ký thành công");
    }
}
