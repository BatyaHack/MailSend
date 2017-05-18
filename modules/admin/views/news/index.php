<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ученики';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'name',
                'label'=>'Имя'
            ],
            [
                'attribute'=>'email',
                'label'=>'Почта'
            ],
            [
                'attribute'=>'skype',
                'label'=>'Скайп'
            ],
            [
                'attribute'=>'data',
                'label'=>'Дата'
            ],
            // 'message:ntext',
        ],
    ]); ?>
</div>
