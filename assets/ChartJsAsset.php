<?php

namespace app\assets;

class ChartJsAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@npm/chart.js';
    public $js = [
        'dist/chart.min.js',
    ];
}
