<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sender */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Senders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sender-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

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
        ],
    ]) ?>

</div>
