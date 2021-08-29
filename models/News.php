<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property int|null $idFile
 * @property string $title
 * @property string $content
 *
 * @property File $idFile0
 */
class News extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'news';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['idFile'], 'integer'],
			[['title', 'content'], 'required'],
			[['content'], 'string'],
			[['title'], 'string', 'max' => 200],
			[['idFile'], 'exist',
				'skipOnError' => true,
				'targetClass' => File::className(),
				'targetAttribute' => ['idFile' => 'id']
			],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'idFile' => 'Id File',
			'title' => 'Title',
			'content' => 'Content',
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
}