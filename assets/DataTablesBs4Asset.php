<?php

namespace app\assets;

class DataTablesBs4Asset extends \yii\web\AssetBundle
{
    public $sourcePath = '@npm/datatables.net-bs4';
    public $css = [
        'css/dataTables.bootstrap4.css',
    ];
    public $js = [
        'js/dataTables.bootstrap4.js',
    ];
    public $depends = [
        DataTablesAsset::class,
    ];
}
