<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Sender */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sender-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'messages_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Message::find()->all(), id, title))->label("ID письмя для рассылки") ?>

    <?= $form->field($model, 'status')->dropDownList([0=>"Не рассылать",1=>"Рассылать"])->label("Статус") ?>

    <?= $form->field($model, 'counter_sender')->textInput()->label("Кол-во отпр.") ?>


    <div class="form-group">
        <label>Дата</label>
        <?= DatePicker::widget([
            'model' => $model,
            'attribute' => 'data_publish',
            'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);?>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
