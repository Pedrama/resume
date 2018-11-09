<?php

use yii\db\Migration;

/**
 * Class m180106_073121_add1
 */
class m180106_073121_add1 extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('{{%profile}}','imageName','varchar(255)');
        $this->addColumn('{{%experience}}','companyName','varchar(255)');
    }

    public function down()
    {
        $this->dropColumn('{{%profile}}','imageName');
        $this->dropColumn('{{%experience}}','companyName');
    }
}
