<?php

use yii\db\Migration;

/**
 * Class m180504_173321_admin_user
 */
class m180504_173321_admin_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user', [
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('123'),
            'auth_key' => '',
            'status' => '20',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }
}
