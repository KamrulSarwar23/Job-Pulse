<?php

namespace App\DataTables;

use App\Models\JobApply;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class JobApplyAdminDataTable extends DataTable
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

                $deleteBtn = "<a href='" . route('admin.job-apply-delete', $query->id) . "' class= 'btn btn-danger ml-3 delete-item'><i class='fas fa-trash'></i> </a>";
                return $deleteBtn;
            })

            ->addColumn('candidate', function ($query) {

                return $query->user->name;
            })

            ->addColumn('company', function ($query) {

                return $query->job->user->name;
            })

            ->addColumn('select', function ($query) {
                $checkbox = '<div class="form-check">
                <input class="form-check-input" name="ids[' . $query->id . ']" type="checkbox" value="' . $query->id . '" id="flexCheckDefault">
              </div>';
                return $checkbox;
   })

            ->addColumn('post', function ($query) {

                return $query->job->name;
            })

            ->addColumn('status', function ($query) {
                if ($query->status == 'approved') {

                    return '<i class="badge bg-success">Approved<i/>';
                } elseif ($query->status == 'rejected') {

                    return '<i class="badge bg-danger">Rejected<i/>';
                } else {
                    return '<i class="badge bg-info">Applied<i/>';
                }
            })

            ->rawColumns(['status', 'action', 'select'])

            ->setRowId('id');
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(JobApply $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('jobapplyadmin-table')
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
            Column::make('select')->width(50),
            Column::make('id'),
            Column::make('candidate'),
            Column::make('company'),
            Column::make('post'),
            Column::make('status'),
            Column::make('action'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'JobApplyAdmin_' . date('YmdHis');
    }
}
