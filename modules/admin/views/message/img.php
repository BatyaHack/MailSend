

<div class="atricle-form">

    <?php use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    $form = ActiveForm::begin(); ?>


    <h3>Выбирите файл</h3>
    <div class="form-group">
        <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton("Начать рассылку", ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>