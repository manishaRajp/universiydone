<?php

namespace App\DataTables;

use App\Models\Subject;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SubjectDataTable extends DataTable
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
            ->addColumn('action', function ($data) {
                return
                    '<a href="' . route("university.subject.edit", $data->id) . '"class="btn btn-outline-info"><i class="fa fa-pencil"></i></a>
                    ';
            })
            ->editColumn('status', function ($data) {
                if ($data->status == '1') {
                    return '<a data-id="' . $data->id . '" id="status" class="btn-sm btn btn-outline-success">Active</a>';
                } else {
                    return '<a data-id="' . $data->id . '" id="status" class="btn-sm btn btn-outline-danger">Inactive</a>';
                }
            })

            ->rawColumns(['status','action'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Subject $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Subject $model)
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
                    ->setTableId('subject-table')
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
            Column::make('name'),
            Column::make('code'),
            Column::make('status'),
            Column::computed('action')->title('Action'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Subject_' . date('YmdHis');
    }
}
