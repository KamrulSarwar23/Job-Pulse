<?php

namespace App\DataTables;

use App\Models\JobApply;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class CandidateJobApplyDataTable extends DataTable
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
               
            $deleteBtn = "<a href='" . route('candidate.job.apply-cancel', $query->id) . "' class= 'btn btn-danger ml-3 remove'>Apply Cancel</a>";
        
            return $deleteBtn;
        })

            ->addColumn('candidate', function ($query) {

                return $query->user->name;
            })

            ->addColumn('company', function ($query) {

                return $query->job->user->name;
            })

            ->addColumn('post', function ($query) {
                return "<a href='" . route('job.page') . "'>" . $query->job->name . "</a>";
            })
            

            ->addColumn('status', function ($query) {
                if ($query->status == 'approved') {

                    return '<i class="badge bg-success">Approved<i/> <br> <span style="font-size:13px" class="m-2 badge bg-info">We Will Contact You Very Soon</span>';

                } elseif ($query->status == 'rejected') {

                    return '<i class="badge bg-danger">Rejected<i/>';
                } else {
                    return '<i class="badge bg-info">Applied<i/>';
                }
            })

            ->rawColumns(['status', 'action', 'post'])

            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(JobApply $model): QueryBuilder
    {
        return $model->where('user_id', auth()->user()->id)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('candidatejobapply-table')
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
            Column::make('candidate'),
            Column::make('company'),
            Column::make('post'),
            Column::make('status')->width(150),
            Column::make('action')->width(150),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'CandidateJobApply_' . date('YmdHis');
    }
}
