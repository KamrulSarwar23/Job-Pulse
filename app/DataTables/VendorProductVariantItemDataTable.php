<?php

namespace App\DataTables;

use App\Models\ProductVariantItem;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendorProductVariantItemDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {


                $editBtn = "<a href='" . route('vendor.product-variant-item.edit', $query->id) . "' class= 'btn btn-primary'> <i class='fas fa-edit'></i> </a>";
                $deleteBtn = "<a href='" . route('vendor.product-variant-item.destroy', $query->id) . "' class= 'btn btn-danger ml-2 delete-item'><i class='fas fa-trash'></i> </a>";

                return $editBtn . $deleteBtn;
            })

            ->addColumn('status', function ($query) {
                if ($query->status == 1) {

                    $button = '<div class="form-check form-switch">
              <input checked class="form-check-input change-status" type="checkbox" data-id = "' . $query->id . '" id="flexSwitchCheckDefault">
    
            </div>';
                } else {
                    $button = '<div class="form-check form-switch">
              <input class="form-check-input change-status" type="checkbox" data-id = "' . $query->id . '" id="flexSwitchCheckDefault">
            </div>';
                }

                return $button;
            })


            ->addColumn('is_default', function ($query) {
                if ($query->is_default == 1) {
                    return '<i class="badge bg-success">Default<i/>';
                } else {
                    return '<i class="badge bg-danger">No<i/>';;
                }
            })

            ->addColumn('variant_name', function ($query) {
                return $query->productVariantname->name;
            })

            ->rawColumns(['status', 'action', 'is_default'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProductVariantItem $model): QueryBuilder
    {
        return $model->where('product_variant_id', request()->variantId)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('vendorproductvariantitem-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('variant_name'),
            Column::make('price'),
            Column::make('status'),
            Column::make('is_default'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'VendorProductVariantItem_' . date('YmdHis');
    }
}
