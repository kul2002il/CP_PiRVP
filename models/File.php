<?php

namespace app\models;

use Yii;
use yii\helpers\Url;
use yii\web\ForbiddenHttpException;
use phpDocumentor\Reflection\PseudoTypes\True_;

/**
 * This is the model class for table "file".
 *
 * @property int $id
 * @property int $idOwner
 * @property string $path
 *
 * @property Apparatus[] $apparatuses
 * @property FileInMessage[] $fileInMessages
 * @property User $idOwner0
 * @property News[] $news
 */
class File extends \yii\db\ActiveRecord
{
	public $fileToUpload;
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
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'idOwner' => 'Id Владельца',
			'path' => 'Путь',
			'file' => 'Файл'
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['idOwner', 'path'], 'required'],
			[['idOwner'], 'integer'],
			[['path'], 'unique'],
			[['path'], 'string', 'max' => 255],
			[['fileToUpload'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
			[
				['idOwner'], 'exist', 'skipOnError' => true,
				'targetClass' => User::className(),
				'targetAttribute' => ['idOwner' => 'id']
			],
		];
	}
	
	public static function createFile($postData)
	{
		if(!Yii::$app->user->can('LoadFile'))
		{
			throw new ForbiddenHttpException("Вам запрещено выгружать файлы.");
		}
		/*
		$file = new self();
		$file->load($postData);
		$file->idOwner = Yii::$app->user->id;
		
		if(!$file->upload() || !$file->save())
		{
			foreach ($file->errors as $key => $error) {
				Yii::$app->session->addFlash('error',
					"Ошика при создании файла: $key " . implode(', ', $error));
			}
		}
		*/
		$file = self::findOne(6);
		return $file;
	}

	public function upload()
	{
		$this->path = 'a';
		if ($this->validate()) {
			$this->path = 'media/' . $this->fileToUpload->baseName . '.' . $this->fileToUpload->extension;
			$this->fileToUpload->saveAs($this->path);
			return true;
		}
		else
		{
			return false;
		}
	}

	public function getUrl()
	{
		return Url::toRoute(['/file', 'id' => $this->id]);
	}

	/**
	 * Gets query for [[Apparatuses]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getApparatuses()
	{
		return $this->hasMany(Apparatus::className(), ['idFile' => 'id']);
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
