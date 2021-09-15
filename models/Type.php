<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "typeApparatus".
 *
 * @property int $id
 * @property string $name
 *
 * @property Model[] $models
 */
class Type extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'typeApparatus';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['name'], 'required'],
			[['name'], 'unique'],
			[['name'], 'string', 'max' => 80],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Название типа',
		];
	}

	/**
	 * Gets query for [[Models]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getModels()
	{
		return $this->hasMany(Model::className(), ['idType' => 'id']);
	}

	public static function seed()
	{
		$data = [
			['Сварочный аппарат'],
			['Генератор'],
			['Тепловая пушка'],
			['Лазерный резак'],
			['Промышленный холодильник'],
			['ТНВД']
		];
		foreach ($data as $pin)
		{
			$model = new self();
			$model->name = $pin[0];
			if(!$model->save())
			{
				print_r($model->errors);
				echo "Пункт {$pin[0]} не может быть сохранён по вышеуказанным причинам.";
			}
		}
	}
}
