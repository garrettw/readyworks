<?php

namespace app\controllers;

use app\models\Computer;
use app\models\ComputerSearch;
use jlorente\datatables\actions\AjaxAction;
use jlorente\datatables\models\SearchModel;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\captcha\CaptchaAction;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
            'captcha' => [
                'class' => CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'ajax-table' => [
                'class' => AjaxAction::class,
                'dataTablesModelInterface' => new ComputerSearch(),
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        return $this->render('index');
    }

    public function actionCharts(): string
    {
        return $this->render('charts', [
            'top10models' => Computer::find()
                ->select(['computer_model', 'COUNT(*) AS data'])
                ->groupBy('computer_model')
                ->orderBy(['data' => SORT_DESC])
                ->limit(10)
                ->createCommand(),
            'operating_systems' => Computer::find()
                ->select(['operating_system', 'COUNT(*) AS data'])
                ->groupBy('operating_system')
                ->orderBy(['data' => SORT_DESC])
                ->createCommand(),
            'locations' => Computer::find()
                ->select(['location', 'COUNT(*) AS data'])
                ->groupBy('location')
                ->orderBy(['data' => SORT_DESC])
                ->createCommand(),
        ]);
    }

    public function actionTable()
    {
        $searchModel = new SearchModel([
            'searchModel' => new ComputerSearch(),
        ]);
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('table', [
            'searchModel' => $searchModel->getSearchModel(),
            'dataProvider' => $dataProvider,
        ]);
    }
}
