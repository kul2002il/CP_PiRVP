<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int|null $id_role
 * @property string $nameFirst
 * @property string $nameLast
 * @property string|null $nameMiddle
 * @property string $email
 * @property string $password
 *
 * @property Role $role
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
	public $password_repeat;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_role'], 'integer'],
            [['nameFirst', 'nameLast', 'email', 'password'], 'required'],
            [['nameFirst', 'nameLast', 'nameMiddle', 'email'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 255],
			[['password_repeat'], 'compare', 'compareAttribute' => 'password'],
            [['email'], 'unique'],
            [['id_role'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['id_role' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_role' => 'Роль',
            'nameFirst' => 'Имя',
            'nameLast' => 'Фамилия',
            'nameMiddle' => 'Отчество',
            'email' => 'Email',
            'password' => 'Пароль',
			'password_repeat' => 'Повторение пароля',
        ];
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'id_role']);
    }


	/**
	 * {@inheritdoc}
	 */
	public static function findIdentity($id)
	{
		return self::findOne($id);
	}

	/**
	 * {@inheritdoc}
	 */
	public static function findIdentityByAccessToken($token, $type = null)
	{
		return null;
	}

	/**
	 * Finds user by username
	 *
	 * @param string $username
	 * @return static|null
	 */
	public static function findByUsername($username)
	{
		return self::find()->where(['email' => $username])->one();
	}

	/**
	 * {@inheritdoc}
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getAuthKey()
	{
		return "key";
	}

	/**
	 * {@inheritdoc}
	 */
	public function validateAuthKey($authKey)
	{
		return true;
	}

	/**
	 * Validates password
	 *
	 * @param string $password password to validate
	 * @return bool if password provided is valid for current user
	 */
	public function validatePassword($password)
	{
		return $this->password === $password;
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
}
