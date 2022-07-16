<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "compilations".
 *
 * @property int $id
 * @property string $uuid
 * @property string|null $name
 * @property string $object_ids
 * @property string $created_at
 * @property string|null $updated_at
 */
class Compilations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'compilations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'object_ids'], 'required'],
            [['id'], 'safe'],
            [['object_ids'], 'safe'],
            [['created_at', 'updated_at'], 'safe'],
            [['uuid', 'name'], 'safe'],
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
            'name' => 'Name',
            'object_ids' => 'Object Ids',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
