<?php

use yii\db\Migration;

class m170503_080648_ctreate_messages_table extends Migration
{
    public function up()
    {
        $this->createTable('message', [
            'id' => $this->primaryKey(),
            'title'=> $this->string(),
            'body'=> $this->string(),
            'atach'=> $this->string(),
        ]);
    }

    public function down()
    {
        echo "m170503_080648_ctreate_messages_table cannot be reverted.\n";

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
