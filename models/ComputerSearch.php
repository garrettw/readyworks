<?php

namespace app\models;

use jlorente\datatables\data\ActiveDataProvider;
use jlorente\datatables\models\DataTablesModelInterface;
use yii\base\Model;

class ComputerSearch extends Computer implements DataTablesModelInterface
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['computer_type', 'computer_model', 'department'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied.
     *
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Computer::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['computer_type' => $this->computer_type])
            ->andFilterWhere(['like', 'computer_model', $this->computer_model])
            ->andFilterWhere(['department' => $this->department]);

        return $dataProvider;
    }

    /**
     * @inheritDoc
     */
    public function getColumns()
    {
        return [
            'id',
            'name',
            'migration_status',
            'user_name',
            'location',
            'computer_type',
            'computer_model',
            'operating_system',
            'windows_10_version',
            'memory_gb',
            'disk_size_gb',
            'free_space_gb',
            'serial',
            'business_unit',
            'department',
            'replacement_ordered',
            'static_ip',
            'state',
            'central_build_site',
            'last_logon_user',
            'vetted',
        ];
    }

    /**
     * @inheritDoc
     */
    public function getDataProvider()
    {
        $query = Computer::find();

        return new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => $this->getSortAttributes(),
            ],
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getSortAttributes()
    {
        return [
            'id',
            'name',
            'migration_status',
            'user_name',
            'location',
            'computer_type',
            'computer_model',
            'operating_system',
            'windows_10_version' => [
                'asc' => ['CAST(windows_10_version AS UNSIGNED)' => SORT_ASC],
                'desc' => ['CAST(windows_10_version AS UNSIGNED)' => SORT_DESC],
            ],
            'memory_gb' => [
                'asc' => ['CAST(memory_gb AS DECIMAL)' => SORT_ASC],
                'desc' => ['CAST(memory_gb AS DECIMAL)' => SORT_DESC],
            ],
            'disk_size_gb' => [
                'asc' => ['CAST(disk_size_gb AS UNSIGNED)' => SORT_ASC],
                'desc' => ['CAST(disk_size_gb AS UNSIGNED)' => SORT_DESC],
            ],
            'free_space_gb' => [
                'asc' => ['CAST(free_space_gb AS UNSIGNED)' => SORT_ASC],
                'desc' => ['CAST(free_space_gb AS UNSIGNED)' => SORT_DESC],
            ],
            'serial',
            'business_unit',
            'department',
            'replacement_ordered',
            'static_ip',
            'state',
            'central_build_site',
            'last_logon_user',
            'vetted',
        ];
    }

    /**
     * @inheritDoc
     */
    public function searchFree($query, $value)
    {
        $query->where([
            'or',
            ['like', 'id', $value],
            ['like', 'name', $value],
            ['like', 'migration_status', $value],
            ['like', 'user_name', $value],
            ['like', 'location', $value],
            ['like', 'computer_type', $value],
            ['like', 'computer_model', $value],
            ['like', 'operating_system', $value],
            ['like', 'windows_10_version', $value],
            ['like', 'memory_gb', $value],
            ['like', 'disk_size_gb', $value],
            ['like', 'free_space_gb', $value],
            ['like', 'serial', $value],
            ['like', 'business_unit', $value],
            ['like', 'department', $value],
            ['like', 'replacement_ordered', $value],
            ['like', 'static_ip', $value],
            ['like', 'state', $value],
            ['like', 'central_build_site', $value],
            ['like', 'last_logon_user', $value],
            ['like', 'vetted', $value],
        ]);
    }
}
