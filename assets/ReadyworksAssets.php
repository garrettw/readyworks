<?php

namespace app\assets;

class ReadyworksAssets extends \yii\web\AssetBundle
{
    public $depends = [
        ChartJsAsset::class,
        ChartJsDatalabelsAsset::class,
        DataTablesBs4Asset::class,
        DataTablesResponsiveBs4Asset::class,
    ];
}
