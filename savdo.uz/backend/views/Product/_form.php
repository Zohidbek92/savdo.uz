<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomi_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomi_uzc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomi_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomi_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'narxi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoriya_id')->dropdownList(ArrayHelper::map(\app\models\Categoriya::find()->all(), 'id', 'nomi_uz'), ['prompt' => "Kategoriyani tanlang"]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
