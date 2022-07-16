<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "objects".
 *
 * @property int $id
 * @property int $external_id
 * @property string|null $picture
 * @property string|null $advantages
 * @property string|null $address
 * @property string|null $street
 * @property int|null $rooms_count
 * @property int|null $filter_type
 * @property string|null $flat_decoration
 * @property string|null $parking
 * @property string|null $class
 * @property string|null $territory
 * @property string|null $commerce
 * @property float|null $ceiling
 * @property string|null $material
 * @property string|null $types
 * @property string|null $districts
 * @property int|null $territory_with_house
 * @property int|null $balcony
 * @property string|null $humanized_type
 * @property string|null $communications
 * @property string|null $humanized_name
 * @property string|null $object
 * @property string|null $object_url
 * @property string|null $liter_name
 * @property int|null $liter_number
 * @property int|null $floor_number
 * @property string|null $humanized_ready_date
 * @property int|null $hide_price
 * @property int|null $full_price
 * @property int|null $price
 * @property int|null $sale_price
 * @property int|null $meter_price
 * @property string|null $detail_page_url
 * @property int|null $reserved
 * @property int|null $similar_count
 * @property string|null $parameters_icon
 * @property string|null $property_sale_price
 * @property string|null $property_sale_badge
 * @property string|null $square
 * @property string|null $living
 * @property string|null $floor
 * @property string|null $kitchen
 * @property string $created_at
 * @property string|null $updated_at
 */
class Objects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'objects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['external_id'], 'required'],
            [['external_id', 'rooms_count', 'filter_type', 'territory_with_house', 'balcony', 'liter_number', 'floor_number', 'hide_price', 'full_price', 'price', 'sale_price', 'meter_price', 'reserved', 'similar_count'], 'safe'],
            [['advantages', 'flat_decoration', 'types', 'communications', 'parameters_icon', 'property_sale_price', 'property_sale_badge', 'square', 'living', 'floor', 'kitchen'], 'safe'],
            [['ceiling'], 'safe'],
            [['created_at', 'updated_at'], 'safe'],
            [['picture', 'address', 'street', 'parking', 'class', 'territory', 'commerce', 'material', 'districts', 'humanized_type', 'humanized_name', 'object', 'object_url', 'liter_name', 'humanized_ready_date', 'detail_page_url'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'external_id' => 'External ID',
            'picture' => 'Picture',
            'advantages' => 'Advantages',
            'address' => 'Address',
            'street' => 'Street',
            'rooms_count' => 'Rooms Count',
            'filter_type' => 'Filter Type',
            'flat_decoration' => 'Flat Decoration',
            'parking' => 'Parking',
            'class' => 'Class',
            'territory' => 'Territory',
            'commerce' => 'Commerce',
            'ceiling' => 'Ceiling',
            'material' => 'Material',
            'types' => 'Types',
            'districts' => 'Districts',
            'territory_with_house' => 'Territory With House',
            'balcony' => 'Balcony',
            'humanized_type' => 'Humanized Type',
            'communications' => 'Communications',
            'humanized_name' => 'Humanized Name',
            'object' => 'Object',
            'object_url' => 'Object Url',
            'liter_name' => 'Liter Name',
            'liter_number' => 'Liter Number',
            'floor_number' => 'Floor Number',
            'humanized_ready_date' => 'Humanized Ready Date',
            'hide_price' => 'Hide Price',
            'full_price' => 'Full Price',
            'price' => 'Price',
            'sale_price' => 'Sale Price',
            'meter_price' => 'Meter Price',
            'detail_page_url' => 'Detail Page Url',
            'reserved' => 'Reserved',
            'similar_count' => 'Similar Count',
            'parameters_icon' => 'Parameters Icon',
            'property_sale_price' => 'Property Sale Price',
            'property_sale_badge' => 'Property Sale Badge',
            'square' => 'Square',
            'living' => 'Living',
            'floor' => 'Floor',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
