<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "file".
 *
 * @property int $id
 * @property int $idOwner
 * @property string $name
 *
 * @property FileInMessage[] $fileInMessages
 * @property User $idOwner0
 * @property News[] $news
 */
class File extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'file';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['idOwner', 'name'], 'required'],
			[['idOwner'], 'integer'],
			[['name'], 'string', 'max' => 200],
			[['idOwner'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idOwner' => 'id']],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'idOwner' => 'Id Owner',
			'name' => 'Name',
		];
	}

	/**
	 * Gets query for [[FileInMessages]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getFileInMessages()
	{
		return $this->hasMany(FileInMessage::className(), ['idFile' => 'id']);
	}

	/**
	 * Gets query for [[IdOwner0]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getIdOwner0()
	{
		return $this->hasOne(User::className(), ['id' => 'idOwner']);
	}

	/**
	 * Gets query for [[News]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getNews()
	{
		return $this->hasMany(News::className(), ['idFile' => 'id']);
	}
}
