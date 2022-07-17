<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "deals".
 *
 * @property int $id
 * @property int|null $compl_id
 * @property string|null $name
 * @property string|null $uuid
 * @property int|null $object_id
 * @property string|null $tags
 * @property string|null $description
 * @property string $created_at
 * @property string|null $updated_at
 */
class Deals extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deals';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['compl_id', 'object_id'], 'safe'],
            [['tags', 'description'], 'safe'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'uuid'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'compl_id' => 'Compl ID',
            'name' => 'Name',
            'uuid' => 'Uuid',
            'object_id' => 'Object ID',
            'tags' => 'Tags',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
