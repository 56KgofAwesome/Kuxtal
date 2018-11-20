<?php

use yii\db\Migration;

/**
 * Class m181118_040049_initial
 */
class m181118_040049_initial extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categorias', [
            'id' => $this->primaryKey()->notNull() . ' AUTO_INCREMENT',
            'name' => $this->string('50')->notNull(),
            'description' => $this->text(),
            'image' => $this->text()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1)
        ]);

        $this->createTable('products', [
            'id' => $this->primaryKey()->notNull() . ' AUTO_INCREMENT',
            'name' => $this->string('100')->notNull(),
            'description' => $this->text(),
            'stock' => $this->integer()->notNull(),
            'price' => $this->double()->notNull(),
            'brand' => $this->string('50')->notNull(),
            'id_categoria' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1)
        ]);

        $this->addForeignKey(
            'fk_categoria_product',
            'products',
            'id_categoria',
            'categorias',
            'id',
            'CASCADE',
            'CASCADE');

        $this->createTable('product_gallery', [
            'id' => $this->primaryKey()->notNull() . ' AUTO_INCREMENT',
            'id_product' => $this->integer()->notNull(),
            'url' => $this->text()->notNull()
        ]);

        $this->addForeignKey(
            'fk_gallery_product',
            'product_gallery',
            'id_product',
            'products',
            'id',
            'CASCADE',
            'CASCADE');

        $this->createTable('orders', [
            'id' => $this->primaryKey()->notNull() . ' AUTO_INCREMENT',
            'id_user' => $this->integer()->notNull(),
            'date' => $this->dateTime()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1)
        ]);

        $this->addForeignKey(
            'fk_user_order',
            'orders',
            'id_user',
            'user',
            'id',
            'CASCADE',
            'CASCADE');

        $this->createTable('order_items', [
            'id' => $this->primaryKey()->notNull() . ' AUTO_INCREMENT',
            'id_order' => $this->integer()->notNull(),
            'id_product' => $this->integer()->notNull(),
            'quantity' => $this->double()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1)
        ]);

        $this->addForeignKey(
            'fk_items_order',
            'order_items',
            'id_order',
            'orders',
            'id',
            'CASCADE',
            'CASCADE');

        $this->addForeignKey(
            'fk_items_products',
            'order_items',
            'id_product',
            'products',
            'id',
            'CASCADE',
            'CASCADE');

        $this->createTable('cart_items', [
            'id' => $this->primaryKey()->notNull() . ' AUTO_INCREMENT',
            'id_user' => $this->integer()->notNull(),
            'id_product' => $this->integer()->notNull(),
            'quantity' => $this->double()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1)
        ]);

        $this->addForeignKey(
            'fk_cart_user',
            'cart_items',
            'id_user',
            'user',
            'id',
            'CASCADE',
            'CASCADE');

        $this->addForeignKey(
            'fk_cart_products',
            'cart_items',
            'id_product',
            'products',
            'id',
            'CASCADE',
            'CASCADE');

        $this->createTable('whishlist', [
            'id' => $this->primaryKey()->notNull() . ' AUTO_INCREMENT',
            'id_user' => $this->integer()->notNull(),
            'id_product' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1)
        ]);

        $this->addForeignKey(
            'fk_wish_user',
            'whishlist',
            'id_user',
            'user',
            'id',
            'CASCADE',
            'CASCADE');

        $this->addForeignKey(
            'fk_wish_product',
            'whishlist',
            'id_product',
            'products',
            'id',
            'CASCADE',
            'CASCADE');

        $this->createTable('offers', [
            'id' => $this->primaryKey()->notNull() . ' AUTO_INCREMENT',
            'id_product' => $this->integer()->notNull(),
            'new_price' => $this->double()->notNull(),
            'date_end' => $this->date()->notNull(),
            'title' => $this->string('100')->notNull(),
            'description' => $this->text()->notNull(),
            'image_url' => $this->text()->notNull()
        ]);

        $this->addForeignKey(
            'fk_offers_product',
            'offers',
            'id_product',
            'products',
            'id',
            'CASCADE',
            'CASCADE');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181118_040049_initial cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181118_040049_initial cannot be reverted.\n";

        return false;
    }
    */
}
