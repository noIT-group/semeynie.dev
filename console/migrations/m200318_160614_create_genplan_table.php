<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%genplan}}`.
 */
class m200318_160614_create_genplan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%genplan}}', [
            'id' => $this->primaryKey(),

            'name_ru' => $this->string(255)->notNull(),
            'name_ua' => $this->string(255)->notNull(),

            'latitude' => $this->string()->notNull(),
            'longitude' => $this->string()->notNull(),

            'status' => $this->tinyInteger(2)->unsigned()->notNull()->defaultValue(10),
            'sort_order' => $this->tinyInteger(2)->unsigned()->notNull(),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%genplan}}');

        return true;
    }
}
