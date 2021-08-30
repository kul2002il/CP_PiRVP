<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "repair".
 *
 * @property int $id
 * @property int|null $idMaster
 * @property int $idApparatus
 * @property string $title
 * @property string $description
 * @property string|null $feedback
 * @property string $startRepair
 * @property string|null $endRepair
 *
 * @property Apparatus $idApparatus0
 * @property User $idMaster0
 * @property Message[] $messages
 */
class Repair extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'repair';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['idMaster', 'idApparatus'], 'integer'],
			[['idApparatus', 'title', 'description'], 'required'],
			[['description', 'feedback'], 'string'],
			[['startRepair', 'endRepair'], 'safe'],
			[['title'], 'string', 'max' => 200],
			[['idMaster'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idMaster' => 'id']],
			[['idApparatus'], 'exist', 'skipOnError' => true, 'targetClass' => Apparatus::className(), 'targetAttribute' => ['idApparatus' => 'id']],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'idMaster' => 'Id Мастера',
			'idApparatus' => 'Id Аппарата',
			'title' => 'Заголовок ремонта',
			'description' => 'Описание',
			'feedback' => 'Отзыв',
			'startRepair' => 'Начало ремонта',
			'endRepair' => 'Конец ремонта',
		];
	}

	/**
	 * Gets query for [[IdApparatus0]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getIdApparatus0()
	{
		return $this->hasOne(Apparatus::className(), ['id' => 'idApparatus']);
	}

	/**
	 * Gets query for [[IdMaster0]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getIdMaster0()
	{
		return $this->hasOne(User::className(), ['id' => 'idMaster']);
	}

	/**
	 * Gets query for [[Messages]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getMessages()
	{
		return $this->hasMany(Message::className(), ['idRepair' => 'id']);
	}
}
