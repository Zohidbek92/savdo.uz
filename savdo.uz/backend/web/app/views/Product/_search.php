<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nomi_uz') ?>

    <?= $form->field($model, 'nomi_uzc') ?>

    <?= $form->field($model, 'nomi_en') ?>

    <?= $form->field($model, 'nomi_ru') ?>

    <?php // echo $form->field($model, 'narxi') ?>

    <?php // echo $form->field($model, 'categoriya_id') ?>

    <?php // echo $form->field($model, 'reyting') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
