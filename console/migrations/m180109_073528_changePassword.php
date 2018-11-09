<?php

use yii\db\Migration;

/**
 * Class m180109_073528_changePassword
 */
class m180109_073528_changePassword extends Migration
{
    /**
     * @inheritdoc
     */

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->update('{{%user}}', [
              'password_hash' => Yii::$app->security->generatePasswordHash('@9355252131P'),],
            ['username' => 'admin' ]);
    }

    public function down()
    {

    }

}
