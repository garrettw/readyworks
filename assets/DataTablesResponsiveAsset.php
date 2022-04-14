<?php

namespace app\assets;

class DataTablesResponsiveAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@bower/datatables.net-responsive';
    public $js = [
        'js/dataTables.responsive.min.js',
    ];
    public $depends = [
        DataTablesAsset::class,
    ];
}
