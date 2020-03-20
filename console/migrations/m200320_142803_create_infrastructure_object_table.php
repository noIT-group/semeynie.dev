<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%infrastructure_object}}`.
 */
class m200320_142803_create_infrastructure_object_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%infrastructure_object}}', [
            'id' => $this->primaryKey(),

            'name_ru' => $this->string(255)->notNull(),
            'name_ua' => $this->string(255)->notNull(),

            'coordinate' => $this->text()->null(),

            'category_id' => $this->integer()->notNull(),


            'status' => $this->tinyInteger(2)->unsigned()->notNull()->defaultValue(10),
            'sort_order' => $this->tinyInteger(2)->unsigned()->notNull(),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-infrastructure_object-category_id',
            'infrastructure_object',
            'category_id',
            'infrastructure_category',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-infrastructure_object-category_id', 'infrastructure_object');

        $this->dropTable('{{%infrastructure_object}}');

        return true;
    }
}
