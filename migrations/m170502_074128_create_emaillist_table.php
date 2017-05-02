<?php

use yii\db\Migration;

/**
 * Handles the creation of table `emaillist`.
 */
class m170502_074128_create_emaillist_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('emaillist', [
            'id' => $this->primaryKey(),
            'email'=> $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('emaillist');
    }
}
