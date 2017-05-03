<?php

use yii\db\Migration;

class m170503_080704_ctreate_sender_table extends Migration
{
    public function up()
    {
        $this->createTable('sender', [
            'id' => $this->primaryKey(),
            'messages_id'=> $this->string(),
            'status'=> $this->boolean(),
            'counter_sender'=> $this->integer(),
        ]);
    }

    public function down()
    {
        echo "m170503_080704_ctreate_sender_table cannot be reverted.\n";

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
