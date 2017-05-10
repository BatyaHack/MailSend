<?php

use yii\db\Migration;

/**
 * Handles adding datapublish to table `sender`.
 */
class m170510_163243_add_datapublish_column_to_sender_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('sender', 'data_publish', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
