<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property int $id
 * @property int $idSender
 * @property int $idRepair
 * @property string $content
 * @property string $startRepair
 *
 * @property User $idSender0
 * @property Repair $idRepair0
 */
class Message extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'message';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['idSender', 'idRepair', 'content'], 'required'],
			[['idSender', 'idRepair'], 'integer'],
			[['content'], 'string'],
			[['startRepair'], 'safe'],
			[['idSender'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idSender' => 'id']],
			[['idRepair'], 'exist', 'skipOnError' => true, 'targetClass' => Repair::className(), 'targetAttribute' => ['idRepair' => 'id']],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'idSender' => 'Id Sender',
			'idRepair' => 'Id Repair',
			'content' => 'Content',
			'startRepair' => 'Start Repair',
		];
	}

	/**
	 * Gets query for [[IdSender0]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getIdSender0()
	{
		return $this->hasOne(User::className(), ['id' => 'idSender']);
	}

	/**
	 * Gets query for [[IdRepair0]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getIdRepair0()
	{
		return $this->hasOne(Repair::className(), ['id' => 'idRepair']);
	}
}
