<?php use yii\helpers\Html;
use yii\widgets\ActiveForm;?>



<div class="message-form">

    <div class="message-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'host')->textInput(['maxlength' => true])->label("Хост")?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => false])->label("Почта пользователя") ?>

        <?= $form->field($model, 'password')->textInput(['maxlength' => false])->label("Пароль") ?>

        <?= $form->field($model, 'port')->textInput(['maxlength' => false])->label("Порт") ?>

        <?= $form->field($model, 'ssl')->dropDownList(["0"=>"Нет","1"=>"Есть"])->label("Ssl") ?>

        <div class="form-group">
            <input class="btn btn-success" type="submit">
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>

