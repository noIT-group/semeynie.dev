<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%gallery}}`.
 */
class m200318_141356_create_gallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%gallery}}', [
            'id' => $this->primaryKey(),

            'image' => $this->string(255)->notNull(),
            'video' => $this->text()->null(),

            'caption_ru' => $this->string(255)->null(),
            'caption_ua' => $this->string(255)->null(),

            'status' => $this->tinyInteger(2)->unsigned()->notNull()->defaultValue(10),
            'sort_order' => $this->tinyInteger(100)->unsigned()->notNull(),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%gallery}}');

        return true;
    }
}
