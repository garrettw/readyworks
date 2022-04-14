<?php

namespace app\assets;

class ChartJsDatalabelsAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@npm/chartjs-plugin-datalabels';
    public $js = [
        'dist/chartjs-plugin-datalabels.js',
    ];
    public $depends = [
        ChartJsAsset::class,
    ];
}
