<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m170518_104359_create_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'name'=> $this->string(),
            'email'=> $this->string(),
            'skype'=> $this->string(),
            'data'=> $this->string(),
            'message'=> $this->text()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news');
    }
}
