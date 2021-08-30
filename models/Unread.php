<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unread".
 *
 * @property int $id
 * @property int $idMessage
 * @property int $idUser
 *
 * @property Message $idMessage0
 * @property User $idUser0
 */
class Unread extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'unread';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['idMessage', 'idUser'], 'required'],
			[['idMessage', 'idUser'], 'integer'],
			[['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
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
			'idMessage' => 'Id Сообщения',
			'idUser' => 'Id Получателя',
		];
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

	/**
	 * Gets query for [[IdUser0]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getIdUser0()
	{
		return $this->hasOne(User::className(), ['id' => 'idUser']);
	}
}
