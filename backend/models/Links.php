<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "links".
 *
 * @property int $id
 * @property string $uuid
 * @property string|null $object_ids
 * @property string $created_at
 * @property string|null $updated_at
 * @property string $uniq
 */
class Links extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'links';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'uniq'], 'safe'],
            [['object_ids'], 'safe'],
            [['created_at', 'updated_at'], 'safe'],
            [['uuid', 'uniq'], 'safe'],
            [['uniq'], 'safe'],
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
            'object_ids' => 'Object Ids',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'uniq' => 'Uniq',
        ];
    }
}
