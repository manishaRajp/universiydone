<?php

namespace App\DataTables;

use App\Models\Addmission;
use App\Models\AddmissionConfirmation;
use App\Models\AddmissionConfirmMerit;
use App\Models\CollegeMerit;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AddmissionConfirmMeritDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'addmissionconfirmmerit.action');
    }


    public function query(AddmissionConfirmation $model)
    {
        // $type = AddmissionConfirmation::select('confirmation_type')->where('confirmation_type', 'M')->with(Auth::user())->first();
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
            ->setTableId('addmissionconfirmmerit-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('excel'),
                Button::make('pdf'),
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
            Column::make('addmission_id'),
            Column::make('confirm_college_id'),
            Column::make('confirm_round_id'),
            Column::make('confirm_merit'),
            Column::make('confirmation_type'),

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'AddmissionConfirmMerit_' . date('YmdHis');
    }
}
