<?php

use yii\db\Migration;

/**
 * Class m200317_141356_create_document_table
 */
class m200317_141356_create_document_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%document}}', [
            'id' => $this->primaryKey(),

            'name_ru' => $this->string(255)->notNull(),
            'name_ua' => $this->string(255)->notNull(),

            'image' => $this->string(255)->null(),
            'file' => $this->string(255)->null(),

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
        $this->dropTable('{{%document}}');

        return true;
    }
}
