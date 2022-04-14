<?php

namespace app\assets;

class DataTablesResponsiveBs4Asset extends \yii\web\AssetBundle
{
    public $sourcePath = '@bower/datatables.net-responsive-bs4';
    public $css = [
        'css/responsive.bootstrap4.min.css',
    ];
    public $js = [
        'js/responsive.bootstrap4.min.js',
    ];
    public $depends = [
        DataTablesBs4Asset::class,
        DataTablesResponsiveAsset::class,
    ];
}
