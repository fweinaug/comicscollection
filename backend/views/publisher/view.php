<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Publishers */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Publishers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publishers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Upload Image', ['upload-image', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'short_name',
            [
                'label' => 'Image',
                'format' => 'html',
                'value' => function ($model) {
                    $url = $model->getImageUrl();
                    return $url !== null ? Html::a(
                        Html::img($model->getImageUrl(), [ 'height'=>'200' ]),
                        ['image/view', 'id' => $model->image_id]
                    ) : null;
                }
            ],
            'founded',
            'description:ntext',
            'website:url',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
