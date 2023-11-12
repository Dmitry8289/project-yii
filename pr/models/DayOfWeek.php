<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "day_of_week".
 *
 * @property int $id
 * @property string $day
 *
 * @property Schedule[] $schedules
 */
class DayOfWeek extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'day_of_week';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['day'], 'required'],
            [['day'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'day' => 'День недели',
        ];
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::class, ['day_of_week_id' => 'id']);
    }
}
