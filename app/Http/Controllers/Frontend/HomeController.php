<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\FlashSale;
use App\Models\Slider;
use App\Models\FlashSaleItem;
use App\Models\HomePageSetting;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $sliders = Slider::where('status', 1)->orderBy('serial', 'asc')->get();
        $flashSaleDate = FlashSale::first();
        $flashSaleItem = FlashSaleItem::where('show_at_home', 1)->where('status', 1)->get();
        $popularCategory = HomePageSetting::where('key', 'popular_category_section')->first();
        $brands = Brand::where('is_featured', 1)->where('status', 1)->get();
        $typeBaseProduct = $this->getTypeBaseProduct();
        $categorySliderProductOne = HomePageSetting::where('key', 'product_slider_one')->first();
        $categorySliderProductTwo = HomePageSetting::where('key', 'product_slider_two')->first();
        $categorySliderProductThree = HomePageSetting::where('key', 'product_slider_three')->first();
        $categories = Category::get();
        $subcategories = SubCategory::all();
        $childcategories = ChildCategory::all();


        return view(
            'frontend.home.home',

            compact(
                'sliders',
                'flashSaleDate',
                'flashSaleItem',
                'popularCategory',
                'brands',
                'typeBaseProduct',
                'categorySliderProductOne',
                'categorySliderProductTwo',
                'categorySliderProductThree',
                'categories',
                'subcategories',
                'childcategories',
            )
        );
    }

    public function getTypeBaseProduct()
    {
        $typeBaseProduct = [];
        $typeBaseProduct['new_arrival'] = Product::where(['product_type' => 'new_arrival', 'is_approved' => 1, 'status' => 1])->orderBy('id', 'DESC')->take(8)->get();
        $typeBaseProduct['featured_product'] = Product::where(['product_type' => 'featured_product', 'is_approved' => 1, 'status' => 1])->orderBy('id', 'DESC')->take(8)->get();
        $typeBaseProduct['top_product'] = Product::where(['product_type' => 'top_product', 'is_approved' => 1, 'status' => 1])->orderBy('id', 'DESC')->take(8)->get();
        $typeBaseProduct['best_product'] = Product::where(['product_type' => 'best_product', 'is_approved' => 1, 'status' => 1])->orderBy('id', 'DESC')->take(8)->get();
        return $typeBaseProduct;
    }
}
