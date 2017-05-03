<?php

use yii\db\Migration;

/**
 * Handles adding manyid to table `atach`.
 */
class m170503_121013_add_manyid_column_to_atach_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('atach', 'many_id', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
