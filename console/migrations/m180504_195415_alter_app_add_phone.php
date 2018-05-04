<?php

use yii\db\Migration;

/**
 * Class m180504_195415_alter_app_add_phone
 */
class m180504_195415_alter_app_add_phone extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('applications', 'phone', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('applications', 'phone');
    }
}
