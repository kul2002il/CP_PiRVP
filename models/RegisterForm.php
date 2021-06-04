<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user This property is read-only.
 *
 */
class RegisterForm extends Model
{
	public $nameFirst;
	public $nameLast;
	public $nameMiddle;
    public $email;
    public $password;
	public $password_repeat;
	
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
			[['nameFirst', 'nameLast', 'email', 'password'], 'required'],
			[['nameFirst', 'nameLast', 'nameMiddle', 'email'], 'string', 'max' => 100],
			[['password'], 'string', 'max' => 255],
			[['password_repeat'], 'compare', 'compareAttribute' => 'password'],
			[['email'], 'unique'],
        ];
    }

	public function attributeLabels()
	{
		return [
			'nameFirst' => 'Имя',
			'nameLast' => 'Фамилия',
			'nameMiddle' => 'Отчество',
			'email' => 'Email',
			'password' => 'Пароль',
			'password_repeat' => 'Повторение пароля',
		];
	}
}
