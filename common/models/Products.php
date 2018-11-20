<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $stock
 * @property double $price
 * @property string $brand
 * @property int $id_categoria
 * @property int $status
 *
 * @property CartItems[] $cartItems
 * @property Offers[] $offers
 * @property OrderItems[] $orderItems
 * @property ProductGallery[] $productGalleries
 * @property Categories $categoria
 * @property Whishlist[] $whishlists
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'stock', 'price', 'brand', 'id_categoria'], 'required'],
            [['description'], 'string'],
            [['stock', 'id_categoria', 'status'], 'integer'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 100],
            [['brand'], 'string', 'max' => 50],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['id_categoria' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'stock' => 'Stock',
            'price' => 'Price',
            'brand' => 'Brand',
            'id_categoria' => 'Id Categoria',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartItems()
    {
        return $this->hasMany(CartItems::className(), ['id_product' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffers()
    {
        return $this->hasMany(Offers::className(), ['id_product' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['id_product' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductGalleries()
    {
        return $this->hasMany(ProductGallery::className(), ['id_product' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categories::className(), ['id' => 'id_categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWhishlists()
    {
        return $this->hasMany(Whishlist::className(), ['id_product' => 'id']);
    }
}
