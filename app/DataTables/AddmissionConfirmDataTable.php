<?php

namespace App\DataTables;

use App\Models\AddmissionConfirm;
use App\Models\AddmissionConfirmation;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AddmissionConfirmDataTable extends DataTable
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
            ->addColumn('action', 'addmissionconfirm.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AddmissionConfirm $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AddmissionConfirmation $model)
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
                    ->setTableId('addmissionconfirm-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
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
        return 'AddmissionConfirm_' . date('YmdHis');
    }
}
