<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->insert('{{%user}}', [
            'username' => 'admin',
            'password_hash' => Yii::$app->security->generatePasswordHash('123456'),
            'email' => 'admin@test.com',
            'status' => '10',
            'created_at' => time(),
        ]);
        $this->createTable('{{%profile}}', [
            'id' =>$this->primaryKey(11)->unsigned(),
            'fName' => $this->string()->notNull(),
            'lName' => $this->string()->notNull(),
            'brithday' => $this->date(),
            'phone' => $this->string(11)->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'city' => $this->string(),
            'province' => $this->string(),
            'bio' => $this->string(),
            'urlFacebook' => $this->string(),
            'urlTelegram' => $this->string(),
            'urlTwitter' => $this->string(),
            'urlLinkedin' => $this->string(),
            'urlInstagram' => $this->string(),
            'urlGithub' => $this->string(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->createTable('{{%interest}}', [
            'id' => $this->primaryKey(),
            'Name' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'profile_id' =>$this->integer()->unsigned(),
            'FOREIGN KEY (`profile_id`) REFERENCES {{%profile}} (`id`) ON DELETE CASCADE ON UPDATE CASCADE',

        ], $tableOptions);
        $this->createTable('{{%experience}}', [
            'id' => $this->primaryKey(),
            'Name' => $this->string()->notNull(),
            'caption' => $this->string(),
            'startDate' => $this->date()->notNull(),
            'endDate' => $this->date(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'profile_id' =>$this->integer()->unsigned(),
            'FOREIGN KEY (`profile_id`) REFERENCES {{%profile}} (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);

        $this->createTable('{{%education}}', [
            'id' => $this->primaryKey(),
            'university' => $this->string()->notNull(),
            'major' => $this->string(),
            'grade' => $this->string(),
            'startDate' => $this->date()->notNull(),
            'endDate' => $this->date(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'profile_id' =>$this->integer()->unsigned(),
            'FOREIGN KEY (`profile_id`) REFERENCES {{%profile}} (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);
        $this->createTable('{{%workFlow}}', [
            'id' => $this->primaryKey(),
            'caption' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'profile_id' =>$this->integer()->unsigned(),
            'FOREIGN KEY (`profile_id`) REFERENCES {{%profile}} (`id`) ON DELETE CASCADE ON UPDATE CASCADE',

        ], $tableOptions);
        $this->createTable('{{%programIcon}}', [
            'id' => $this->primaryKey(),
            'iconName' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'profile_id' =>$this->integer()->unsigned(),
            'FOREIGN KEY (`profile_id`) REFERENCES {{%profile}} (`id`) ON DELETE CASCADE ON UPDATE CASCADE',

        ], $tableOptions);
        $this->createTable('{{%award}}', [
            'id' => $this->primaryKey(),
            'caption' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'profile_id' =>$this->integer()->unsigned(),
            'FOREIGN KEY (`profile_id`) REFERENCES {{%profile}} (`id`) ON DELETE CASCADE ON UPDATE CASCADE',

        ], $tableOptions);
    }

    public function down()
    {


        $this->dropTable('{{%interest}}');
        $this->dropTable('{{%experience}}');
        $this->dropTable('{{%education}}');
        $this->dropTable('{{%workFlow}}');
        $this->dropTable('{{%programIcon}}');
        $this->dropTable('{{%award}}');
        $this->dropTable('{{%profile}}');
        $this->dropTable('{{%user}}');

    }
}
