<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FlashSaleItemDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\Product;

class FlashSaleController extends Controller
{
    public function index(FlashSaleItemDataTable $datatable)
    {
        $products = Product::where('is_approved', 1)->where('status', 1)->orderBy('id', 'DESC')->get();
        $flashSaleDate = FlashSale::first();
        return $datatable->render('admin.flash-sale.index', compact('flashSaleDate', 'products'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'end_date' => ['required'],
        ]);

        FlashSale::updateOrCreate(
            ['id' => 1],
            ['end_date' => $request->end_date]
        );

        toastr('Updated Successfully');

        return redirect()->back();
    }

    public function addProduct(Request $request)
    {

        $request->validate([
            'product' => ['required'],
            'show_at_home' => ['required'],
            'status' => ['required'],
        ]);
        $flashSaleDate = FlashSale::first();

        $flashSaleItem = new FlashSaleItem();
        $flashSaleItem->product_id = $request->product;
        $flashSaleItem->flash_sale_id = $flashSaleDate->id;
        $flashSaleItem->show_at_home = $request->show_at_home;
        $flashSaleItem->status = $request->status;
        $flashSaleItem->save();

        toastr('Product Added Flash Sale Successfully');

        return redirect()->back();
    }

    
    public function destroy(string $id)
    {
        $flashSaleItem = FlashSaleItem::findOrFail($id);
        $flashSaleItem->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully']);
    }

    public function changeShowAtHomeStatus(Request $request){

        $flashSaleItem = FlashSaleItem::findOrFail($request->id);
        $flashSaleItem->show_at_home = $request->status == 'true' ? 1 : 0;
        $flashSaleItem->save();

        return response(['message' => 'Status has been Updated!']);
    }

    public function changeStatus(Request $request){

        $flashSaleItem = FlashSaleItem::findOrFail($request->id);
        $flashSaleItem->status = $request->status == 'true' ? 1 : 0;
        $flashSaleItem->save();

        return response(['message' => 'Status has been Updated!']);
    }
}
