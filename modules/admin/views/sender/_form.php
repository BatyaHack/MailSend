<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sender */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sender-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'messages_id')->textInput(['maxlength' => true])->label("ID письмя для рассылки") ?>

    <?= $form->field($model, 'status')->textInput()->label("Статус") ?>

    <?= $form->field($model, 'counter_sender')->textInput()->label("Кол-во отпр.") ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
