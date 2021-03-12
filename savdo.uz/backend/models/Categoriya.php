<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoriya".
 *
 * @property int $id
 * @property string $nomi_uz
 * @property string $nomi_uzc
 * @property string $nomi_en
 * @property string $nomi_ru
 */
class Categoriya extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoriya';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomi_uz', 'nomi_uzc', 'nomi_en', 'nomi_ru'], 'required'],
            [['nomi_uz', 'nomi_uzc', 'nomi_en', 'nomi_ru'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nomi_uz' => Yii::t('app', 'Nomi Uz'),
            'nomi_uzc' => Yii::t('app', 'Nomi Uzc'),
            'nomi_en' => Yii::t('app', 'Nomi En'),
            'nomi_ru' => Yii::t('app', 'Nomi Ru'),
        ];
    }
}
