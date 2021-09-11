<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%role}}`.
 */
class m210911_103435_createRoleTable extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable('role', [
			'id' => $this->primaryKey(),
			'name' => $this->string()->notNull()->unique(),
			'code' => $this->string(40)->notNull()->unique(),
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('role');
	}
}
