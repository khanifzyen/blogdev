<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p> 
        <?php if(Yii::$app->user->can('updateOwnPost',['id'=>$model->id]) || Yii::$app->user->can('admin')){ ?>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        <?php }?>
    </p>

    <?php
    // echo DetailView::widget([
    //     'model' => $model,
    //     'attributes' => [
    //         //'id',
    //         'title',
    //         'content:ntext',
    //         [ 
    //             'attribute'=>'published',
    //             'value' => $model->getPublished()[$model->published],
    //         ],
    //         // 'is_deleted',
    //         'createdBy.username',
    //         'created_at',
    //         'updatedBy.username',
    //         'updated_at',
    //     ],
    // ]) 
    
    echo $model->content;

    echo $this->render('index_komentar',['model'=>$model]);
    echo $this->render('_form_komentar',['model'=> new \frontend\models\Comment(),'id_post'=>$model->id]);

    ?>




</div>
