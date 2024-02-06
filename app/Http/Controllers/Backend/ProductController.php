<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\ProductDataTable;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use App\Models\ProductImageGallery;
use App\Models\ProductVariant;
use App\Models\Brand;
use App\Models\FlashSaleItem;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Auth;
use Str;

class ProductController extends Controller
{

    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $datatable)
    {
        return $datatable->render('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'image' => ['required', 'image', 'max:2000'],
            'name' => ['required'],
            'category' => ['required'],
            'brand' => ['required'],
            'price' => ['required'],
            'qty' => ['required'],
            'short_description' => ['required', 'max:600'],
            'long_description' => ['required'],
            'seo_title' => ['nullable', 'max:200'],
            'seo_description' => ['nullable', 'max:250'],
            'status' => ['required']
        ]);


        $imagePath = $this->uploadImage($request, 'image', 'uploads');

        $product = new Product();
        $product->thumb_image = $imagePath;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->vendor_id = Auth::user()->vendor->id;
        $product->category_id = $request->category;
        $product->subcategory_id = $request->subcategory;
        $product->childcategory_id = $request->childcategory;
        $product->brand_id = $request->brand;
        $product->qty = $request->qty;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->video_link = $request->video_link;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->offer_start_date = $request->offer_start_date;
        $product->offer_end_date = $request->offer_end_date;
        $product->product_type = $request->product_type;
        $product->status = $request->status;
        $product->is_approved = 1;
        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;
        $product->save();

        toastr('Product Added Successfully', 'success');
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $subcategories = SubCategory::where('category_id', $product->category_id)->get();
        $childcategories = ChildCategory::where('subcategory_id', $product->subcategory_id)->get();
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.edit', compact('product', 'categories', 'brands', 'subcategories', 'childcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'image' => ['nullable', 'image', 'max:2000'],
            'name' => ['required'],
            'category' => ['required'],
            'brand' => ['required'],
            'price' => ['required'],
            'qty' => ['required'],
            'short_description' => ['required', 'max:600'],
            'long_description' => ['required'],
            'seo_title' => ['nullable', 'max:200'],
            'seo_description' => ['nullable', 'max:250'],
            'status' => ['required']
        ]);


        $product = Product::findOrFail($id);

        $imagePath = $this->updateImage($request, 'image', 'uploads', $product->thumb_image);

        $product->thumb_image = empty(!$imagePath) ? $imagePath : $product->thumb_image;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->category_id = $request->category;
        $product->subcategory_id = $request->subcategory;
        $product->childcategory_id = $request->childcategory;
        $product->brand_id = $request->brand;
        $product->qty = $request->qty;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->video_link = $request->video_link;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->offer_start_date = $request->offer_start_date;
        $product->offer_end_date = $request->offer_end_date;
        $product->product_type = $request->product_type;
        $product->status = $request->status;
        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;
        $product->save();

        toastr('Product Updated Successfully', 'success');
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete Main Product Image
        $product = Product::findOrFail($id);

        if (OrderProduct::where('product_id', $product->id)->count()) {
            return response(['status' => 'error', 'message' => 'This product have orders cant delete it']);
        }

        $flashsaleitem = FlashSaleItem::where('product_id', $product->id)->count();

        if ($flashsaleitem) {

            return response(['status' => 'error', 'message' => 'This item added in Flash Sale, for delete this first remove from Flash Sale']);
        }

        $this->deleteImage($product->thumb_image);

        // Delete Gallery Image
        $productGallery = ProductImageGallery::where('product_id',  $product->id)->get();
        foreach ($productGallery as $image) {
            $this->deleteImage($image->image);
            $image->delete();
        }

        // Delete Variant
        $productVariant = ProductVariant::where('product_id',  $product->id)->get();
        foreach ($productVariant as $variant) {
            $variant->productVariantItems()->delete();
            $variant->delete();
        }

        $product->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully']);
    }

    public function getSubCategories(Request $request)
    {
        $subcategories = SubCategory::where('category_id', $request->id)->get();
        return $subcategories;
    }

    public function getChildCategories(Request $request)
    {
        $childcategories = ChildCategory::where('subcategory_id', $request->id)->get();
        return $childcategories;
    }
    public function changeStatus(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->status = $request->status == 'true' ? 1 : 0;
        $product->save();

        return response(['message' => 'Status has been Updated!']);
    }
}
