<?php

namespace app\models;

use Yii;

/**
 * @property int $id
 * @property int|null $idRole 
 * @property string $nameFirst
 * @property string $nameLast
 * @property string|null $nameMiddle
 * @property string $email
 * @property string $password
 * 
 * @property Apparatus[] $apparatuses
 * @property File[] $files
 * @property Role $idRole0
 * @property Message[] $messages
 * @property Repair[] $repairs
 * @property Unread[] $unreads
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
	public $password_repeat;
	public static function tableName()
	{
		return 'user';
	}
	
	public function rules()
	{
		return [
			[['nameFirst', 'nameLast', 'email', 'password'], 'required'],
			[['nameFirst', 'nameLast', 'nameMiddle'], 'string', 'max' => 80],
			[['password'], 'string', 'max' => 255, 'min' => 8],
			[['password_repeat'], 'compare', 'compareAttribute' => 'password'],
			[['email'], 'string', 'max' => 255],
			[['email'], 'unique'],
			[['email'], 'email'],
			[
				['idRole'], 'exist', 'skipOnError' => true,
				'targetClass' => Role::className(),
				'targetAttribute' => ['idRole' => 'id'],
			],
		];
	}

	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'idRole' => 'Id Роли',
			'nameFirst' => 'Имя',
			'nameLast' => 'Фамилия',
			'nameMiddle' => 'Отчество',
			'email' => 'Email',
			'password' => 'Пароль',
			'password_repeat' => 'Повторение пароля',
		];
	}

	public function getApparatuses()
	{
		return $this->hasMany(Apparatus::className(), ['idOwner' => 'id']);
	}

	public function getFiles()
	{
		return $this->hasMany(File::className(), ['idOwner' => 'id']);
	}

	public function getIdRole0()
	{
		return $this->hasOne(Role::className(), ['id' => 'idRole']);
	}
	
	public function getLastActivities()
	{
		return $this->hasMany(LastActivity::className(), ['idUser' => 'id']);
	}

	public function getMessages()
	{
		return $this->hasMany(Message::className(), ['idSender' => 'id']);
	}

	public function getRepairs()
	{
		return $this->hasMany(Repair::className(), ['idMaster' => 'id']);
	}


	/**
	 * Реализация интерфейса IdentityInterface
	 */
	public static function findIdentity($id)
	{
		return self::findOne($id);
	}

	public static function findIdentityByAccessToken($token, $type = null)
	{
		return null;
	}

	public static function findByUsername($username)
	{
		return self::find()->where(['email' => $username])->one();
	}

	public function getId()
	{
		return $this->id;
	}

	public function getAuthKey()
	{
		return "key";
	}

	public function validateAuthKey($authKey)
	{
		return true;
	}

	public function validatePassword($password)
	{
		return Yii::$app->getSecurity()->validatePassword($password, $this->password);
	}

	public function save($runValidation = true, $attributeNames = null)
	{
		if($runValidation)
		{
			if(!$this->validate($attributeNames))
			{
				return false;
			}
		}
		$this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
		$this->password_repeat = '';
		return parent::save(false);
	}



	public function login()
	{
		$user = self::findByUsername($this->email);
		if(!$user)
		{
			return false;
		}
		
		if($user->validatePassword($this->password))
		{
			Yii::$app->user->login($user);
			return true;
		}
		
		return false;
	}

	public function getUsername()
	{
		$name = Yii::$app->user->identity->email;
		$name = explode('@', $name)[0];
		return $name;
	}

	public function setRoleCode(string $code = '')
	{
		if($code === '')
		{
			$this->idRole = null;
			return;
		}
		$role = Role::findOne(['code' => $code]);
		if(!$role)
		{
			throw new \Exception("Роль $code не найдена.");
		}
		$this->idRole = $role->id;
	}

	public static function seed()
	{
		$data = [
			[
				'Кулманаков',
				'Илья',
				'Владимирович',
				'kul2002il@gmail.com',
				'12341234',
				'admin',
			],
			[
				'Кулманаков',
				'Алексей',
				'Викторович',
				'al42Sel@gmail.com',
				'12341234',
				'master'
			],[
				'Иванов',
				'Дмитрий',
				null,
				'ivAN@gmail.com',
				'12341234',
				'',
			],[
				'Вишняков',
				'Андрей',
				'Петрович',
				'user@gmail.com',
				'12341234',
				'',
			]
		];
		foreach ($data as $user)
		{
			$model = new self();
			$model->nameFirst = $user[0];
			$model->nameLast = $user[1];
			$model->nameMiddle = $user[2];
			$model->email = $user[3];
			$model->password = $user[4];
			$model->setRoleCode($user[5]);
			if(!$model->save())
			{
				print_r($model->errors);
				echo "Пользователь {$model->email} не может быть сохранён по вышеуказанным причинам.";
			}
		}
	}
}