<?php

namespace App\DataTables;


use App\Models\MeritRound;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MeritDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('status', function ($data) {
                if ($data->status == '1') {
                    return '<a data-id="' . $data->id . '" id="status" class="btn-sm btn btn-outline-success">Active</a>';
                } else {
                    return '<a data-id="' . $data->id . '" id="status" class="btn-sm btn btn-outline-danger">Inactive</a>';
                }
            })

            ->editColumn('course_id', function ($data) {
                return $data->course->name;
            })
            ->rawColumns(['course_id','status'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Merit $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MeritRound $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('merit-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('course_id'),
            Column::make('round_no'),
            Column::make('start_date'),
            Column::make('end_date'),
            Column::make('merit_result_declare_date'),
            Column::make('status'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Merit_' . date('YmdHis');
    }
}
