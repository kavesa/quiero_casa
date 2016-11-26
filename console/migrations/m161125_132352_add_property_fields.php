<?php

use yii\db\Migration;

class m161125_132352_add_property_fields extends Migration
{
    public function up()
    {
        $this->addColumn('property', 'bedrooms', 'integer(2) DEFAULT 0');
        $this->addColumn('property', 'bathrooms', 'integer(2) DEFAULT 0');
        $this->addColumn('property', 'laundry', 'tinyint(1) DEFAULT 0');
        $this->addColumn('property', 'barbacoa', 'tinyint(1) DEFAULT 0');
        $this->addColumn('property', 'garage', 'tinyint(1) DEFAULT 0');
        $this->addColumn('property', 'backyard', 'tinyint(1) DEFAULT 0');
        $this->addColumn('property', 'frontyard', 'tinyint(1) DEFAULT 0');
        $this->addColumn('property', 'swimmingpool', 'tinyint(1) DEFAULT 0');
        $this->addColumn('property', 'guesthouse', 'tinyint(1) DEFAULT 0');
    }

    public function down()
    {
        echo "m161125_132352_add_property_fields cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
