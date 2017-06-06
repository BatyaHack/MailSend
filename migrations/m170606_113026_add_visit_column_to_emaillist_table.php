<?php

use yii\db\Migration;

/**
 * Handles adding visit to table `emaillist`.
 */
class m170606_113026_add_visit_column_to_emaillist_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('emaillist', 'visit', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
