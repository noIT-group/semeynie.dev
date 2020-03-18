<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%developer_object}}`.
 */
class m200318_153925_create_developer_object_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%developer_object}}', [
            'id' => $this->primaryKey(),

            'name_ru' => $this->string(255)->notNull(),
            'name_ua' => $this->string(255)->notNull(),

            'image_logo' => $this->string(255)->null(),
            'image_illustration' => $this->string(255)->null(),

            'body_ru' => $this->text()->null(),
            'body_ua' => $this->text()->null(),

            'link' => $this->string(255)->null(),

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
        $this->dropTable('{{%developer_object}}');

        return true;
    }
}
