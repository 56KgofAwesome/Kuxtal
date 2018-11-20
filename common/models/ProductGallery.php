<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_gallery".
 *
 * @property int $id
 * @property int $id_product
 * @property string $url
 *
 * @property Products $product
 */
class ProductGallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_product', 'url'], 'required'],
            [['id_product'], 'integer'],
            [['url'], 'string'],
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
            'url' => 'Url',
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
