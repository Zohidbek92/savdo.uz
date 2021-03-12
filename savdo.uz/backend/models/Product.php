<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $nomi_uz
 * @property string $nomi_uzc
 * @property string $nomi_en
 * @property string $nomi_ru
 * @property string $narxi
 * @property int $categoriya_id
 * @property int $reyting
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomi_uz', 'nomi_uzc', 'nomi_en', 'nomi_ru', 'narxi', 'categoriya_id'], 'required'],
            ['categoriya_id', 'integer'],
            [['nomi_uz', 'nomi_uzc', 'nomi_en', 'nomi_ru', 'narxi'], 'string', 'min' => '2', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nomi_uz' => Yii::t('app', 'Nomi (lotin)'),
            'nomi_uzc' => Yii::t('app', 'Nomi (kiril)'),
            'nomi_en' => Yii::t('app', 'Nomi (ingliz)'),
            'nomi_ru' => Yii::t('app', 'Nomi (rus)'),
            'narxi' => Yii::t('app', 'Narxi'),
            'categoriya_id' => Yii::t('app', 'Kategoriya'),
            'reyting' => Yii::t('app', 'Reyting'),
            'sana' => Yii::t('app', 'Sana'),
        ];
    }

    // public function getKategoriya()
    // {
    //     return 
    // }
}
