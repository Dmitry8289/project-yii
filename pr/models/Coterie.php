<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coterie".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int|null $from_age
 * @property string|null $image
 */
class Coterie extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coterie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['from_age'], 'integer'],
            [['title', 'image'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'from_age' => Yii::t('app', 'From Age'),
            'image' => Yii::t('app', 'Image'),
        ];
    }
}
