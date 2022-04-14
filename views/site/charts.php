<?php

use practically\chartjs\Chart;
use yii\bootstrap4\Html;
use yii\db\Command;
use yii\web\JsExpression;

/** @var \yii\web\View $this */
/** @var Command $top10models */
/** @var Command $operating_systems */
/** @var Command $locations */

$this->title = 'Computers: Charts View';
?>
<div class="charts-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-sm-4"><?= Chart::widget([
            'type' => Chart::TYPE_DOUGHNUT,
            'clientOptions' => [
                'title' => [
                    'display' => true,
                    'text' => 'Top 10 Computer Models',
                ],
                'responsive' => true,
                'plugins' => [
                    'legend' => [
                        'position' => 'right',
                    ],
                ],
            ],
            'datasets' => [
                [
                    'query' => $top10models,
                    'labelAttribute' => 'computer_model',
                    'backgroundColors' => [
                        'rgb(60, 141, 188)',
                        'rgb(245, 105, 84)',
                        'rgb(255, 133, 27)',
                        'rgb(0, 166, 90)',
                        'rgb(243, 156, 17)',
                        'rgb(0, 191, 239)',
                        'rgb(61, 153, 112)',
                        'rgb(95, 92, 168)',
                        'rgb(210, 214, 222)',
                        'rgb(216, 27, 96)',
                    ],
                    'borderColors' => [
                        '#fff',
                    ],
                ],
            ],
        ]) ?></div>
        <div class="col-sm-4"><?= Chart::widget([
            'type' => Chart::TYPE_DOUGHNUT,
            'clientOptions' => [
                'title' => [
                    'display' => true,
                    'text' => 'Computers by Operating System',
                ],
                'responsive' => true,
                'plugins' => [
                    'legend' => [
                        'position' => 'right',
                    ],
                ],
            ],
            'datasets' => [
                [
                    'query' => $operating_systems,
                    'labelAttribute' => 'operating_system',
                    'backgroundColors' => [
                        'rgb(60, 141, 188)',
                        'rgb(245, 105, 84)',
                    ],
                    'borderColors' => [
                        '#fff',
                    ],
                ],
            ],
        ]) ?></div>
        <div class="col-sm-4"><?= \app\widgets\Chart::widget([
            'type' => Chart::TYPE_BAR,
            'plugins' => [new JsExpression('ChartDataLabels')],
            'clientOptions' => [
                'title' => [
                    'display' => true,
                    'text' => 'Computers by Location',
                ],
                'responsive' => true,
                'plugins' => [
                    'legend' => [
                        'display' => false,
                    ],
                    'datalabels' => [
                        'anchor' => 'end',
                        'align' => 'top',
                    ],
                ],
            ],
            'datasets' => [
                [
                    'query' => $locations,
                    'labelAttribute' => 'location',
                    'backgroundColors' => [
                        'rgb(60, 141, 188)',
                    ],
                    'borderColors' => [
                        'transparent',
                    ],
                ],
            ],
        ]) ?></div>
</div>
