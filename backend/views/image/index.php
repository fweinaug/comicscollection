<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ImagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="images-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Image', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'label' => 'Thumbnail',
                'format' => 'html',
                'content' => function($model) {
                    $url = $model->getImageUrl();
                    return Html::a(Html::img($url, [ 'width'=>'75','height'=>'100' ]), ['view', 'id' => $model->id]);
                },
            ],
            [
                'attribute' => 'width',
                'label' => 'Resolution',
                'format' => 'raw',
                'value' => function ($model) {
                    return "$model->width x $model->height";
                }
            ],
            'size:shortSize',

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:100px;'],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
