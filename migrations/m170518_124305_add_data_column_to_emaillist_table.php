<?php

use yii\db\Migration;

/**
 * Handles adding data to table `emaillist`.
 */
class m170518_124305_add_data_column_to_emaillist_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('emaillist', 'data', $this->date());
    }
    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
