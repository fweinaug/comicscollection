<?php

use common\models\Publishers;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Comics */
/* @var $form yii\widgets\ActiveForm */
/* @var $next boolean */
?>

<div class="comics-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php $publishers = ArrayHelper::map(Publishers::find()->orderBy('name')->asArray()->all(), 'id', 'name') ?>
    <?= $form->field($model, 'publisher_id')->dropDownList($publishers)->label('Publisher') ?>

    <?= $form->field($model, 'issues_total')->textInput() ?>

    <?= $form->field($model, 'concluded')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

        <?php if ($next): ?>
        <?= Html::submitButton('Next Comic', ['class' => 'btn btn-default', 'name' => 'next']) ?>
        <?php endif ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
