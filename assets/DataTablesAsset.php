<?php

namespace app\assets;

class DataTablesAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@npm/datatables.net';
    public $js = [
        'js/jquery.dataTables.js',
    ];
}
