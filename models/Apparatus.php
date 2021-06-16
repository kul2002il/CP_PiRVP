<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "apparatus".
 *
 * @property int $id
 * @property int $idModel
 * @property int $idOwner
 *
 * @property Model $idModel0
 * @property User $idOwner0
 * @property Repair[] $repairs
 */
class Apparatus extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'apparatus';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['idModel', 'idOwner'], 'required'],
			[['idModel', 'idOwner'], 'integer'],
			[['idModel'], 'exist', 'skipOnError' => true, 'targetClass' => Model::className(), 'targetAttribute' => ['idModel' => 'id']],
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
			'idModel' => 'Id Model',
			'idOwner' => 'Id Owner',
		];
	}

	/**
	 * Gets query for [[IdModel0]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getIdModel0()
	{
		return $this->hasOne(Model::className(), ['id' => 'idModel']);
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
	 * Gets query for [[Repairs]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getRepairs()
	{
		return $this->hasMany(Repair::className(), ['idApparatus' => 'id']);
	}
	
	/**
	 * Gets query for Actual[[Repairs]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function queryRepairs()
	{
		return Repair::find()->where(['idApparatus' => $this->id]);
	}
}
