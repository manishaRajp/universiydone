<?php

namespace App\DataTables;

use App\Models\CollegeMerit;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class College_MeritDataTable extends DataTable
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
            ->editColumn('college_id', function ($data) {
                return $data->college->name;
            })
            ->addColumn('action', function ($data) {
                return
                    '
                    <a href="' . route("college.merit.edit", $data->id) . '"class="btn btn-outline-info"><i class="fa fa-pencil"></i></a>
                    ';
            })
            ->rawColumns(['college_id','action'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CollegeMerit $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(CollegeMerit $model)
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
                    ->setTableId('college_merit-table')
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
            Column::make('id')->data('DT_RowIndex')->orderable(false)->title('Sr.No'),
            Column::make('college_id'), 
            Column::make('course_id'), 
            Column::make('merit_round_id'), 
            Column::make('merit'), 
            Column::computed('action')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'College_Merit' . date('YmdHis');
    }
}
