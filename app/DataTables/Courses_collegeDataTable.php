<?php

namespace App\DataTables;

use App\Models\CollegeCourse;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class Courses_collegeDataTable extends DataTable
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
                    '<a href="' . route("college.course.edit", $data->id) . '"class="btn btn-outline-info"><i class="fa fa-pencil"></i></a>
                    ';
            })
            ->editColumn('college_id', function ($data) {
                return $data->college->name;
            })
            ->editColumn('course_id', function ($data) {
                return $data->course->name;
            })
            ->filterColumn('college_id', function ($data, $keyword) {
                $sql = "colleges.name like ?";
                $data->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->rawColumns(['action', 'college_id', 'course_id'])
            ->addIndexColumn();
    }

   
    public function query(CollegeCourse $model)
    {
        $model = $model
            ->join('colleges', 'colleges.id', '=', 'college_courses.college_id')
            ->select('college_courses.*', 'colleges.name')
            ->newQuery();
        return $model->with(['college',])->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('courses_college-table')
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
            Column::make('seat_no'),
            Column::make('reserved_seat'),
            Column::make('merit_seat'),
            Column::computed('action'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Courses_college_' . date('YmdHis');
    }
}
