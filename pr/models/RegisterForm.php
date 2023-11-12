<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class RegisterForm extends Model
{
    public $username;
    public $password;
    public $password_repeat;
    public $name;
    public $surname;
    public $patronymic;
    public $email;
    public $phone;
    public $role;

    /**
     * @return array the validation rules.
     */

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['role'], 'integer'],
            ['email', 'email'],
            [['username', 'password', 'password_repeat', 'name', 'surname', 'patronymic', 'email'], 'string', 'max' => 256],
            [['phone'], 'string', 'max' => 20],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'email' => 'Эл.почта',
            'phone' => 'Телефон',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        $user->password = $this->password;
        $user->password_repeat = $this->password_repeat;
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->patronymic = $this->patronymic;
        $user->email = $this->email;
        $user->phone = $this->phone;

        return $user->save() ? $user:null;
    }
}
