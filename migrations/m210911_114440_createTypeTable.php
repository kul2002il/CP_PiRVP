<?php

use yii\db\Migration;

class m210911_114440_createTypeTable extends Migration
{
	public function safeUp()
	{
		$this->createTable('typeApparatus', [
			'id' => $this->primaryKey(),
			'name' => $this->string()->notNull()->unique(),
		]);
	}

	public function safeDown()
	{
		$this->dropTable('typeApparatus');
	}
}
