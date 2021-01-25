<?php

use yii\db\Migration;

/**
 * Class m210125_100726_alter_infrastructure_category_table
 */
class m210125_100726_alter_infrastructure_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('infrastructure_category', 'svg_icon', 'VARCHAR(255) NOT NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('infrastructure_category', 'svg_icon', 'TEXT NULL');

        return true;
    }
}
