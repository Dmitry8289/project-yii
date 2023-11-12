<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string|null $body
 * @property string $date
 * @property int|null $user_id
 * @property int|null $coterie_id
 *
 * @property Coterie $coterie
 * @property User $user
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['date'], 'safe'],
            [['user_id', 'coterie_id'], 'integer'],
            ['user_id', 'default', 'value' => Yii::$app->user->getId()],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['coterie_id'], 'exist', 'skipOnError' => true, 'targetClass' => Coterie::class, 'targetAttribute' => ['coterie_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'body' => 'Комментарий',
            'coterie_id' => 'Название кружка'
        ];
    }

    /**
     * Gets query for [[Coterie]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCoterie()
    {
        return $this->hasOne(Coterie::class, ['id' => 'coterie_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
