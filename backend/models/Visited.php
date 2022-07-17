<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visited".
 *
 * @property int $id
 * @property int $uuid
 * @property int $link_id
 * @property string $created_at
 * @property string|null $visit_data
 */
class Visited extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'visited';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'link_id', 'created_at'], 'safe'],
            [['uuid', 'link_id'], 'safe'],
            [['created_at'], 'safe'],
            [['visit_data'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uuid' => 'Uuid',
            'link_id' => 'Link ID',
            'created_at' => 'Created At',
            'visit_data' => 'Visit Data',
        ];
    }
}
