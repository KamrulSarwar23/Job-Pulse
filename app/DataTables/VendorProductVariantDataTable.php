<?php

namespace App\DataTables;

use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendorProductVariantDataTable extends DataTable
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

                $variantItems = "<a href='" . route('vendor.product-variant-item.index', ['productId' => request()->product, 'variantId' => $query->id]) . "' class= 'btn btn-warning variant-btn '> <i class='fas fa-plus'></i> Variant Items </a>";
                $editBtn = "<a href='" . route('vendor.product-variant.edit', $query->id) . "' class= 'btn btn-primary'> <i class='fas fa-edit'></i> </a>";
                $deleteBtn = "<a href='" . route('vendor.product-variant.destroy', $query->id) . "' class= 'btn btn-danger ml-2 delete-item'><i class='fas fa-trash'></i> </a>";

                return $variantItems . $editBtn . $deleteBtn;
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

            ->rawColumns(['status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProductVariant $model): QueryBuilder
    {
        return $model->where('product_id', request()->product)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('vendorproductvariant-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0)
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
            Column::make('id')->width(80),
            Column::make('name'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(400)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'VendorProductVariant_' . date('YmdHis');
    }
}
