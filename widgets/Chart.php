<?php

namespace app\widgets;

use yii\helpers\Html;
use yii\helpers\Json;

class Chart extends \practically\chartjs\Chart
{
    /**
     * @var array an array of plugins to be registered with the chart
     */
    public $plugins = [];

    /**
     * @inheritdoc
     */
    public function run()
    {
        $clientOptions = [
            'type' => $this->type,
            'options' => $this->clientOptions,
            'data' => [
                'datasets' => $this->_datasets,
                'labels' => $this->labels,
            ],
            'plugins' => $this->plugins,
        ];

        $json = Json::encode($clientOptions);
        $js  = "window.{$this->jsVar}_el = document.getElementById('{$this->id}');";
        $js .= "window.{$this->jsVar} = new Chart({$this->jsVar}_el, {$json});";

        foreach ($this->jsEvents as $eventName => $handler) {
            $js .= "window.{$this->jsVar}_el.{$eventName} = $handler;";
        }

        $this->getView()->registerJs($js);

        $this->options['id'] = $this->id;

        return Html::tag('canvas', '', $this->options);
    }
}
