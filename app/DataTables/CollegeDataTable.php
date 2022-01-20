<?php

namespace App\DataTables;

use App\Models\College;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CollegeDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('logo', function ($data) {
                return '<img src="' . asset('storage/CollegeLogo/' . $data->logo) . '" class="img-thumbnail"
                   width="50%"></img>';
            })
            ->addColumn('action', function ($data) {
                return
                    '
                    <a href="' . route("university.college.show", $data->id) . '"class="btn btn-success"><i class=" fa fa-eye"></i></a>
                    <br><a href="' . route("university.college.edit", $data->id) . '"class="btn btn-outline-info"><i class="fa fa-pencil"></i></a>
                      <form action="' . route("university.college.destroy", $data->id) . '" method="POST">
                    ' . csrf_field() . '
                    ' . method_field("DELETE") . '
                        <button type="submit" class="btn btn-danger"
                        onclick="return confirm(\'Are You Sure Want to Delete?\')"
                        ><i class="fa fa-trash"></i>
                  </form>
                    ';
            })
            ->rawColumns(['logo', 'action'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\College $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(College $model)
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
            ->setTableId('college-table')
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
            Column::make('name')->orderable(false)->title('College Name'),
            Column::make('email')->orderable(false)->title('College Email'),
            Column::make('contact_no')->orderable(false)->title('Contact'),
            Column::make('address')->orderable(false)->title('Address'),
            Column::make('logo')->orderable(false)->title('Logo Of College'),
            Column::make('status')->orderable(false)->title('Status'),
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
        return 'College_' . date('YmdHis');
    }
}
