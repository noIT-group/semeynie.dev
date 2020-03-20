<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%infrastructure_category}}`.
 */
class m200320_142742_create_infrastructure_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%infrastructure_category}}', [
            'id' => $this->primaryKey(),

            'name_ru' => $this->string(255)->notNull(),
            'name_ua' => $this->string(255)->notNull(),

            'svg_icon' => $this->text()->null(),

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
        $this->dropTable('{{%infrastructure_category}}');

        return true;
    }
}
