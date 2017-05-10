<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SenderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Рассылка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sender-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать рассылку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'attribute'=>'messages_id',
                'label'=>'Письмо-содержание'
            ],
            [
                'attribute' => 'status',
                'label' => 'Статус',
                'format' => 'html',
                'content' => function($data){
                    return Html::img("@web/status_icon/".$data->getIcon() ,['width'=>50, 'height'=>50]);
                },
            ],
            [
                'attribute'=>'counter_sender',
                'label' => 'Кол-во отправленных'
            ],
            [
                'attribute'=>'data_publish',
                'label'=>'Дата пабликации'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
