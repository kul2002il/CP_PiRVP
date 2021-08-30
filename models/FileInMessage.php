<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fileInMessage".
 *
 * @property int $id
 * @property int $idFile
 * @property int $idMessage
 *
 * @property File $idFile0
 * @property Message $idMessage0
 */
class FileInMessage extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'fileInMessage';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['idFile', 'idMessage'], 'required'],
			[['idFile', 'idMessage'], 'integer'],
			[['idFile'], 'exist', 'skipOnError' => true, 'targetClass' => File::className(), 'targetAttribute' => ['idFile' => 'id']],
			[['idMessage'], 'exist', 'skipOnError' => true, 'targetClass' => Message::className(), 'targetAttribute' => ['idMessage' => 'id']],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'idFile' => 'Id Файла',
			'idMessage' => 'Id Сообщения',
		];
	}

	/**
	 * Gets query for [[IdFile0]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getIdFile0()
	{
		return $this->hasOne(File::className(), ['id' => 'idFile']);
	}

	/**
	 * Gets query for [[IdMessage0]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getIdMessage0()
	{
		return $this->hasOne(Message::className(), ['id' => 'idMessage']);
	}
}
