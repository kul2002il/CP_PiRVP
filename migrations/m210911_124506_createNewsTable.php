<?php

use yii\db\Migration;

class m210911_124506_createNewsTable extends Migration
{
	public function safeUp()
	{
		$this->createTable('news', [
			'id' => $this->primaryKey(),
			'idFile' => $this->integer()->notNull(),
			'title' => $this->string()->notNull(),
			'content' => $this->text()->notNull(),
			'datetime' => $this->dateTime()->defaultExpression('NOW()'),
		]);
		$this->addForeignKey('NewsFile', 'news', 'idFile', 'file', 'id');
	}

	public function safeDown()
	{
		$this->dropForeignKey('NewsFile', 'news');
		$this->dropTable('news');
	}
}
