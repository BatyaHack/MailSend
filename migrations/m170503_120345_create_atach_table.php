<?php

use yii\db\Migration;

/**
 * Handles the creation of table `atach`.
 */
class m170503_120345_create_atach_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('atach', [
            'id' => $this->primaryKey(),
            'file_name' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('atach');
    }
}
