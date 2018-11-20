<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "offers".
 *
 * @property int $id
 * @property int $id_product
 * @property double $new_price
 * @property string $date_end
 * @property string $title
 * @property string $description
 * @property string $image_url
 *
 * @property Products $product
 */
class Offers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'offers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_product', 'new_price', 'date_end', 'title', 'description', 'image_url'], 'required'],
            [['id_product'], 'integer'],
            [['new_price'], 'number'],
            [['date_end'], 'safe'],
            [['description', 'image_url'], 'string'],
            [['title'], 'string', 'max' => 100],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['id_product' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_product' => 'Id Product',
            'new_price' => 'New Price',
            'date_end' => 'Date End',
            'title' => 'Title',
            'description' => 'Description',
            'image_url' => 'Image Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'id_product']);
    }
}
