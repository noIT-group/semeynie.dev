<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%multi_slider}}`.
 */
class m200318_141356_create_multi_slider_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%multi_slider}}', [
            'id' => $this->primaryKey(),

            'image' => $this->string(255)->notNull(),

            'type' => $this->string(50)->notNull(),

            'caption_ru' => $this->string(255)->null(),
            'caption_ua' => $this->string(255)->null(),

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
        $this->dropTable('{{%multi_slider}}');

        return true;
    }
}
