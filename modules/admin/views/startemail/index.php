

<div class="atricle-form">

<?php use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); ?>


    <h3>Выбирите файл</h3>
    <div class="form-group">
        <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
    </div>

    <h3>Укажите тему</h3>
    <div class="form-group">
        <input type="text" name="subject">
    </div>

    <h3>Укажите текст песьма</h3>
    <div class="form-group">
        <textarea name="textbody" style="width: 600px; height: 200px"></textarea>
    </div>

    <h3>Укажите верстку песьма</h3>
    <div class="form-group">
        <textarea name="texthtml" style="width: 600px; height: 200px"></textarea>
    </div>


    <div class="form-group">
        <?= Html::submitButton("Начать рассылку", ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>