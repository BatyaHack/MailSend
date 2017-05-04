<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmaillistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Emaillists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emaillist-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Emaillist', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'email:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <div class="atricle-form">

        <?php $form = ActiveForm::begin(); ?>


        <h3>Выбирите файл</h3>
        <div class="form-group">
            <?= $form->field($model, 'image', ['inputOptions'=>['required'=>'required']])->fileInput(['maxlength' => true]) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton("Заполнить БД", ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
