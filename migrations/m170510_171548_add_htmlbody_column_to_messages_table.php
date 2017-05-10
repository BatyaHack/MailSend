<?php

use yii\db\Migration;

/**
 * Handles adding htmlbody to table `messages`.
 */
class m170510_171548_add_htmlbody_column_to_messages_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('message', 'html_body', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
