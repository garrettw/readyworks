<?php

use jlorente\datatables\grid\DataTables;
use yii\bootstrap4\Html;
use yii\web\JsExpression;

/** @var \yii\web\View $this */
/** @var \app\models\ComputerSearch $searchModel */
/** @var \jlorente\datatables\data\ActiveDataProvider $dataProvider */

$this->title = 'Computers: Table View';
?>
<div class="table-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button(
            'Reset Filters and Sorting',
            ['id' => 'dt-reset', 'class' => 'btn btn-secondary']
        ) ?>
    </p>

    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'clientOptions' => [
            'responsive' => true,
            'serverSide' => true,
            'ajax' => '/site/ajax-table',
            'initComplete' => new JsExpression(<<<JS
                function () {
                    const api = this.api();
                    $(api.table().container()).addClass('col-sm-12');
                    
                    const row = $('<tr role="row"></tr>').appendTo(api.table().header());
                    const colsWithTextSearch = [6];
                    const colsWithSelectSearch = [5, 14];
                    
                    $('th', api.table().header()).each(function (i) {
                        const th = $(
                            '<th class="filters px-0 py-0 text-center"'
                                + ' style="display:' + $(this).css('display')
                                + '"></th>'
                            )
                            .appendTo(row);
                        const column = api.column(i);
                        
                        if (colsWithTextSearch.includes(i)) {
                            $('<input type="text" />')
                                .appendTo(th)
                                .on('keyup change clear', function () {
                                    if (column.search() !== this.value) {
                                        column.search(this.value).draw();
                                    }
                                });
                        }
                        
                        if (colsWithSelectSearch.includes(i)) {
                            const select = $('<select><option value=""></option></select>')
                                .appendTo(th)
                                .on('change', function () {
                                    const val = $(this).val();
                                    column.search(val ? val : '', false, true).draw();
                                });

                            column.data().unique().sort().each(function (d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                        }
                    });
                    
                    $('#dt-reset').on('click', function () {
                        $('.filters input', api.table().header()).each(function () {
                            this.value = '';
                        });
                        $('.filters select option[value=""]', api.table().header()).each(function () {
                            this.selected = true;
                        });
                        api.table()
                            .order([0, 'asc'])
                            .search('')
                            .columns().search('')
                            .draw();
                    })
                }
JS
            ),
        ],
        'columns' => $searchModel->getColumns(),
    ]) ?>
</div>
