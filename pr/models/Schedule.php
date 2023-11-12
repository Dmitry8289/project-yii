<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property int $id
 * @property int|null $coterie_id
 * @property string $time
 * @property int|null $day_of_week_id
 *
 * @property Coterie $coterie
 * @property DayOfWeek $dayOfWeek
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['coterie_id', 'day_of_week_id'], 'integer'],
            [['time'], 'required'],
            [['time'], 'safe'],
            [['day_of_week_id'], 'exist', 'skipOnError' => true, 'targetClass' => DayOfWeek::class, 'targetAttribute' => ['day_of_week_id' => 'id']],
            [['coterie_id'], 'exist', 'skipOnError' => true, 'targetClass' => Coterie::class, 'targetAttribute' => ['coterie_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'coterie_id' => 'Название кружка',
            'time' => 'С времени',
            'day_of_week_id' => 'День недели',
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
     * Gets query for [[DayOfWeek]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDayOfWeek()
    {
        return $this->hasOne(DayOfWeek::class, ['id' => 'day_of_week_id']);
    }
}
