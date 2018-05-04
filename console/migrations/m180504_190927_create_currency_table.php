<?php

use yii\db\Migration;

/**
 * Handles the creation of table `currency`.
 */
class m180504_190927_create_currency_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('currencies', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'value' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('currencies');
    }
}
