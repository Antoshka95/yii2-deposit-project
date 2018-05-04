<?php

use yii\db\Migration;

/**
 * Handles the creation of table `deposit_type`.
 */
class m180504_191002_create_deposit_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('deposit_types', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'percentage' => $this->integer(),
            'min_value' => $this->float(),
            'max_duration' => $this->integer(),
            'min_duration' => $this->integer(),
            'description' => $this->string(),
            'currency_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('deposit_types');
    }
}
