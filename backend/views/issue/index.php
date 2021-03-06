<?php

use common\models\Comics;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\IssuesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Issues';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issues-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Issue', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'format' => 'html',
                'content' => function($model) {
                    $url = $model->getImageUrl();
                    return $url !== null ? Html::img($url, [ 'height'=>'100' ]) : null;
                },
                'contentOptions' => ['style' => 'width:100px;'],
            ],
            [
                'attribute' => 'comic_id',
                'label' => 'Comic',
                'content' => function ($model) {
                    return Html::a($model->comic->name, ['comic/view', 'id' => $model->comic->id]);
                },
                'filter' => ArrayHelper::map(Comics::find()->orderBy('name')->asArray()->all(), 'id', 'name'),

            ],
            [
                'attribute' => 'number',
                'contentOptions' => ['style' => 'width:100px;'],
            ],
            [
                'attribute' => 'title',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::a($model->title, ['view', 'id' => $model->id]);
                },
            ],
            'release_date',
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:100px;'],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
