<?php

use yii\db\Migration;

/**
 * Class m181120_061555_profile_fields
 */
class m181120_061555_profile_fields extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'name', 'string');
        $this->addColumn('user', 'lastname', 'string');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181120_061555_profile_fields cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181120_061555_profile_fields cannot be reverted.\n";

        return false;
    }
    */
}
